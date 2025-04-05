<?php
include 'conexao.php';

$sql = "SELECT nome, preco FROM produtos";
$result = $conn->query($sql);

$produtos = [];

while ($row = $result->fetch_assoc()) {
    $produtos[] = $row;
}

echo json_encode($produtos);
?>
