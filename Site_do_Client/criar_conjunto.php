<?php
header('Content-Type: application/json');

include 'conexao.php'; // Inclui a conexão com o banco de dados

$palavrasProibidas = ['admin', 'sistema', 'root', 'gerenciamento', 'teste'];

try {
    $data = json_decode(file_get_contents('php://input'), true);
    $nomeConjunto = $data['nome_conjunto'];

    // Validação básica
    if (empty($nomeConjunto)) {
        throw new Exception("Nome do conjunto não pode ser vazio");
    }

    if (in_array(strtolower($nomeConjunto), $palavrasProibidas)) {
        throw new Exception("Este nome de conjunto não é permitido");
    }

    // Verificar se o conjunto já existe
    $stmt = $conn->prepare("SELECT id FROM conjuntos WHERE nome = :nome");
    $stmt->bindParam(':nome', $nomeConjunto);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        throw new Exception("Já existe um conjunto com este nome");
    }

    // Inserir na tabela de conjuntos
    $stmt = $conn->prepare("INSERT INTO conjuntos (nome) VALUES (:nome)");
    $stmt->bindParam(':nome', $nomeConjunto);
    $stmt->execute();

    // Criar a nova tabela
    $tabelaNome = preg_replace('/[^A-Za-z0-9_]/', '', strtolower(str_replace(' ', '_', $nomeConjunto)));

    $sql = "CREATE TABLE IF NOT EXISTS `$tabelaNome` (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        conjunto VARCHAR(255),
        titulo VARCHAR(255),
        descricao VARCHAR(255),
        estoque VARCHAR(255),
        opcao VARCHAR(255),
        adicionais VARCHAR(255),
        preco DECIMAL(10,2),
        foto VARCHAR(255),
        visivel TINYINT(1) DEFAULT 1
    )";

    $conn->exec($sql);

    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'error' => 'Erro de banco de dados: ' . $e->getMessage()
    ]);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>
