<?php
include 'conexao.php'; // Conectar ao banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados enviados pelo AJAX
    $id = isset($_POST['id']) ? intval($_POST['id']) : null;
    $quantidade = isset($_POST['quantidade']) ? intval($_POST['quantidade']) : null;
    $valor = isset($_POST['valor']) ? floatval($_POST['valor']) : null;
    $data = isset($_POST['data']) ? $_POST['data'] : null;

    if ($id && $quantidade !== null && $valor !== null && $data) {
        // Usar prepared statements para evitar injeção de SQL
        $sql = "UPDATE produtos SET 
                quantidade = ?, 
                preco = ?, 
                vencimento = ? 
                WHERE id = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("idsi", $quantidade, $valor, $data, $id);

        if ($stmt->execute()) {
            echo "Atualização realizada com sucesso!";
        } else {
            echo "Erro ao atualizar o produto: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Dados inválidos!";
    }

    $conn->close();
}
?>