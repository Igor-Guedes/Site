<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Inclui o arquivo de conexão centralizado
include 'conexao.php';

try {
    // Verificação segura do modo admin
    $is_admin = filter_input(INPUT_GET, 'admin', FILTER_VALIDATE_BOOL) ?? false;

    // Montagem segura da query
    $sql = "SELECT id, nome, visivel FROM conjuntos";
    $params = [];

    if (!$is_admin) {
        $sql .= " WHERE visivel = :visivel";
        $params[':visivel'] = 1;
    }

    // Prepara e executa a query
    $stmt = $conn->prepare($sql);
    
    foreach ($params as $key => &$val) {
        $stmt->bindParam($key, $val, is_int($val) ? PDO::PARAM_INT : PDO::PARAM_STR);
    }
    
    $stmt->execute();

    // Busca resultados
    $conjuntos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($conjuntos);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro no banco de dados: ' . $e->getMessage()]);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}