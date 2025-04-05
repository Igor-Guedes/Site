<?php
// busca_adicionais.php
header('Content-Type: application/json');

// Inclui a conexão centralizada
include 'conexao.php';

try {
    if (!isset($_GET['ids_adicionais'])) {
        echo json_encode([]);
        exit;
    }

    $ids = explode(',', $_GET['ids_adicionais']);
    
    // Validação rigorosa dos IDs
    $ids_validos = [];
    foreach ($ids as $id) {
        if (ctype_digit($id) && $id > 0) {
            $ids_validos[] = (int)$id;
        }
    }

    if (empty($ids_validos)) {
        echo json_encode([]);
        exit;
    }

    // Prevenção contra SQL Injection usando prepared statements
    $placeholders = implode(',', array_fill(0, count($ids_validos), '?'));
    $query = "SELECT id, nome, preco, quantidade FROM produtos WHERE id IN ($placeholders)";
    
    $stmt = $conn->prepare($query);
    $stmt->execute($ids_validos);
    
    $adicionais = [];
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Captura todos os resultados de uma vez

    foreach ($result as $row) {
        $adicionais[] = [
            'id' => $row['id'],
            'nome' => $row['nome'],
            'preco' => number_format($row['preco'], 2, ',', '.'), // Formatação BR
            'quantidade' => $row['quantidade']
        ];
    }

    echo json_encode($adicionais);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro no banco de dados: ' . $e->getMessage()]);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}