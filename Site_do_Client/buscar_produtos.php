<?php
header("Content-Type: application/json");
include 'conexao.php'; // Arquivo com a conexão PDO

try {
    // Verificação segura do parâmetro admin
    $is_admin = filter_input(INPUT_GET, 'admin', FILTER_VALIDATE_BOOL) ?? false;

    if (!isset($_GET['conjunto_nome'])) {
        echo json_encode([]);
        exit;
    }

    // Sanitização do nome da tabela
    $conjunto_nome = preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['conjunto_nome']);

    // Montagem da query com verificação de segurança
    $query = "SELECT * FROM `$conjunto_nome`";
    $whereClause = [];

    if (!$is_admin) {
        $whereClause[] = "visivel = 1";
    }

    if (!empty($whereClause)) {
        $query .= " WHERE " . implode(" AND ", $whereClause);
    }

    $stmt = $conn->prepare($query);
    $stmt->execute();

    $produtosValidos = [];
    
    $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($produtos as $produto) {
        $estoqueValido = true;
        
        if (!$is_admin && !empty($produto['estoque'])) {
            $ingredientes = explode(',', $produto['estoque']);
            
            foreach ($ingredientes as $ingrediente) {
                $partes = explode('x', trim($ingrediente));
                
                if (count($partes) !== 2) {
                    $estoqueValido = false;
                    break;
                }
                
                list($idIngrediente, $quantidadeNecessaria) = $partes;
                
                $stmtIngrediente = $conn->prepare("SELECT quantidade FROM produtos WHERE id = ?");
                $stmtIngrediente->execute([$idIngrediente]);
                $quantidade = $stmtIngrediente->fetchColumn();
                
                if ($quantidade === false || $quantidade < $quantidadeNecessaria) {
                    $estoqueValido = false;
                    break;
                }
            }
        }
        
        if ($is_admin || $estoqueValido) {
            $produtosValidos[] = $produto;
        }
    }
    
    echo json_encode($produtosValidos);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro no banco de dados: ' . $e->getMessage()]);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}