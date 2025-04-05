<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $direcao = intval($_POST["direcao"]); // -1 ou 1

    // Buscar o conjunto pelo nome
    $sql = "SELECT id FROM conjuntos WHERE nome = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nome);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $conjunto = $result->fetch_assoc();
        $id_atual = $conjunto["id"];

        // Buscar o conjunto vizinho (id_atual + direcao)
        $sql = "SELECT id, nome FROM conjuntos WHERE id = ? LIMIT 1";
        $novo_id = $id_atual + $direcao;
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $novo_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $conjunto_vizinho = $result->fetch_assoc();
            $id_vizinho = $conjunto_vizinho["id"];
            $nome_vizinho = $conjunto_vizinho["nome"];

            // Troca os IDs dos conjuntos
            $conn->begin_transaction();

            // Passa o ID do conjunto atual para um valor temporário (-999)
            $sql = "UPDATE conjuntos SET id = -999 WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id_atual);
            $stmt->execute();

            // Passa o ID do vizinho para o ID atual
            $sql = "UPDATE conjuntos SET id = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $id_atual, $id_vizinho);
            $stmt->execute();

            // Passa o ID temporário para o vizinho
            $sql = "UPDATE conjuntos SET id = ? WHERE id = -999";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id_vizinho);
            $stmt->execute();

            $conn->commit();
            echo json_encode(["sucesso" => true]);
        } else {
            echo json_encode(["sucesso" => false, "mensagem" => "Nenhum conjunto encontrado para mover."]);
        }
    } else {
        echo json_encode(["sucesso" => false, "mensagem" => "Conjunto não encontrado."]);
    }
}
?>
