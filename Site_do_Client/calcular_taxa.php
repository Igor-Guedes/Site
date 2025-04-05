<?php
header('Content-Type: application/json');

// Endereço fixo da loja (mantido em sigilo)
$enderecoLoja = "Penge, Londres, Reino Unido";

try {
    // Verifica se o método de requisição é POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception("Método não permitido", 405);
    }

    // Recebe e valida o endereço do cliente
    $data = json_decode(file_get_contents('php://input'), true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("JSON inválido", 400);
    }

    if (empty($data['endereco'])) {
        throw new Exception("Endereço não fornecido", 400);
    }

    // Sanitização do endereço
    $bairro = trim(str_ireplace(
        ['london', ',', '.', ';', "'", '"'], 
        '', 
        strip_tags($data['endereco'])
    ));
    
    // Monta o endereço completo do cliente (CORREÇÃO ADICIONADA)
    $enderecoCliente = "$bairro, London, UK"; 

    // Geocodificação dos endereços
    $coordenadasLoja = geocodificar($enderecoLoja);
    $coordenadasCliente = geocodificar($enderecoCliente);

    if (!$coordenadasLoja || !$coordenadasCliente) {
        throw new Exception("Não foi possível calcular a distância para este endereço", 404);
    }

    // Cálculo da rota usando OSRM
    $urlOSRM = "http://router.project-osrm.org/route/v1/driving/" 
        . $coordenadasLoja['lon'] . "," . $coordenadasLoja['lat'] . ";" 
        . $coordenadasCliente['lon'] . "," . $coordenadasCliente['lat'] 
        . "?overview=false";

    $responseOSRM = file_get_contents($urlOSRM);
    if ($responseOSRM === false) {
        throw new Exception("Falha ao acessar o serviço de roteamento", 502);
    }

    $dataOSRM = json_decode($responseOSRM, true);
    if ($dataOSRM['code'] !== 'Ok') {
        throw new Exception("Erro no cálculo da rota: " . ($dataOSRM['message'] ?? 'Desconhecido'), 502);
    }

    // Distância em milhas para KM (CORREÇÃO ADICIONADA)
    $distanciaKm = ($dataOSRM['routes'][0]['distance'] /1610); 
    $taxa = $distanciaKm * 1; // Exemplo: £1.50 por km

    echo json_encode([
        'taxa' => number_format($taxa, 2),
        'distancia' => number_format($distanciaKm, 2)
    ]);

} catch (Exception $e) {
    http_response_code($e->getCode() ?: 500);
    echo json_encode([
        'erro' => $e->getMessage(),
        'codigo' => $e->getCode()
    ]);
}

function geocodificar($endereco) {
    $url = "https://nominatim.openstreetmap.org/search?format=json&q=" . urlencode($endereco);
    
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "MyDeliveryApp/1.0 (contact@example.com)"); // User-Agent identificável
    $response = curl_exec($ch);
    curl_close($ch);

    if (!$response) return null;

    $data = json_decode($response, true);    
    return (!empty($data)) ? [
        'lat' => (float)$data[0]['lat'],
        'lon' => (float)$data[0]['lon']
    ] : null;
}
?>