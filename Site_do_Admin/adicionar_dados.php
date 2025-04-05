<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeTabela = $_POST['nomeTabela'];
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $estoque = $_POST['estoque'];
    $opcao = $_POST['opcao'];
    $adicionais = $_POST['adicionais'];
    $preco = $_POST['preco'];
    $foto = $_POST['foto'];

    // Criar a tabela caso não exista
    $createTableSQL = "CREATE TABLE IF NOT EXISTS `$nomeTabela` (
        id INT AUTO_INCREMENT PRIMARY KEY,
        conjunto VARCHAR(255) NOT NULL,
        titulo VARCHAR(255) NOT NULL,
        descricao TEXT NOT NULL,
        estoque VARCHAR(255) NOT NULL,
        opcao VARCHAR(255) NOT NULL,
        adicionais TEXT NOT NULL,
        preco DECIMAL(10,2) NOT NULL,
        foto VARCHAR(255) NOT NULL
    )";

    if ($conn->query($createTableSQL) === TRUE) {
        // Inserir os dados na tabela
        $insertSQL = "INSERT INTO `$nomeTabela` (conjunto, titulo, descricao, estoque, opcao, adicionais, preco, foto) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertSQL);
        $stmt->bind_param("ssssssds", $nomeTabela, $titulo, $descricao, $estoque, $opcao, $adicionais, $preco, $foto);

        if ($stmt->execute()) {
            echo "Dados adicionados com sucesso!";
        } else {
            echo "Erro ao adicionar dados: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Erro ao criar tabela: " . $conn->error;
    }

    $conn->close();
}
?>
