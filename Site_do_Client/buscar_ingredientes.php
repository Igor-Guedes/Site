<?php
header('Content-Type: application/json');

// Conexão com o banco
$host = "localhost";
$banco = "estoquedb";
$usuario = "root";
$senha = "";

try {
    $conn = new PDO(
        "mysql:host=$host;dbname=$banco;charset=utf8",
        $usuario,
        $senha,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );

    // Recebe o parâmetro estoque
    $estoqueStr = $_GET['estoque'] ?? '';
    
    if (empty($estoqueStr)) {
        echo json_encode(['success' => false, 'message' => 'Parâmetro estoque faltando']);
        exit;
    }

    // Processa a string (formato: "1x2,3x1")
    $pares = explode(',', $estoqueStr);
    $ingredientes = [];
    
    foreach ($pares as $par) {
        $partes = explode('x', trim($par));
        if (count($partes) === 2) {
            $id = (int)$partes[0];
            $quantidade = (int)$partes[1];
            
            // Busca na tabela PRODUTOS (ajustado)
            $stmt = $conn->prepare("SELECT nome FROM produtos WHERE id = ?");
            $stmt->execute([$id]);
            
            if ($row = $stmt->fetch()) {
                $ingredientes[] = [
                    'id' => $id,
                    'nome' => $row['nome'],
                    'quantidade' => $quantidade
                ];
            }
        }
    }

    $ingredientes = array_map(function($item) {
        return [
            'id' => $item['id'],
            'nome' => mb_convert_encoding($item['nome'], 'UTF-8', 'auto'),
            'quantidade' => $item['quantidade']
        ];
    }, $ingredientes);

    echo json_encode($ingredientes, JSON_UNESCAPED_UNICODE); // Adicione esta flag
    

} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Erro no servidor',
        'error' => $e->getMessage()
    ]);
}

exit;