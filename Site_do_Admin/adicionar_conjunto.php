<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];

    // Validação do nome do produto
    if (strtolower($nome) == "conjuntos" || strtolower($nome) == "produtos") {
        echo "<script>alert('Nome inválido! Não é permitido adicionar produtos com o nome \"conjuntos\" ou \"produtos\".'); window.history.back();</script>";
    } else {
        // Verificar se o produto já existe
        $checkProduto = "SELECT * FROM conjuntos WHERE nome = '$nome'";
        $resultCheck = $conn->query($checkProduto);

        if ($resultCheck->num_rows > 0) {
            echo "<script>
            alert('Produto já existe!');
            window.location.reload(); // Recarrega a página
            </script>";
        } else {
            // Inserir o novo produto
            $sql = "INSERT INTO conjuntos (nome) VALUES ('$nome')";

            if ($conn->query($sql) === TRUE) {
                // Criar uma nova tabela com o nome do produto inserido
                $createTableSQL = "CREATE TABLE IF NOT EXISTS `$nome` (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    conjunto VARCHAR(255) NOT NULL,
                    titulo VARCHAR(255) NOT NULL,
                    descricao VARCHAR(255) NOT NULL,
                    estoque VARCHAR(255) NOT NULL,
                    opcao VARCHAR(255) NOT NULL,
                    adicionais VARCHAR(255) NOT NULL,
                    preco DECIMAL(10,2) NOT NULL,
                    foto VARCHAR(255) NOT NULL
                )";
                

                if ($conn->query($createTableSQL) === TRUE) {
                    echo "<script>alert('Produto \"$nome\" inserido com sucesso e a tabela \"$nome\" foi criada!'); window.history.back();</script>";
                } else {
                    echo "<script>alert('Erro ao criar a tabela \"$nome\".'); window.history.back();</script>";
                }
            } else {
                echo "<script>alert('Erro: " . $conn->error . "'); window.history.back();</script>";
            }
        }
    }

    // Consulta para pegar todas as linhas da tabela
    $sql = "SELECT * FROM conjuntos";
    $result = $conn->query($sql);

    // Verificar se há resultados
    if ($result->num_rows > 0) {
        // Contador para alternar os IDs
        $contador = 1;

        // Iterar sobre os resultados e pegar uma linha de cada vez
        while ($row = $result->fetch_assoc()) {
            // Aqui você pode manipular os dados de cada linha

            // Novo ID baseado no contador ou outra lógica
            $novoId = $contador;

            // Atualizar o ID na tabela
            $updateSQL = "UPDATE conjuntos SET id = '$novoId' WHERE id = '{$row['id']}'";
            if ($conn->query($updateSQL) === TRUE) {
               
            } else {
                echo "Erro ao alterar ID: " . $conn->error . "<br>";
            }

            // Incrementar o contador para o próximo ID
            $contador++;
        }
    } else {
        echo "Nenhum produto encontrado.";
    }

}

// Exibir produtos existentes
$sql = "SELECT id, nome FROM conjuntos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<button onclick=\"mostrarNome('{$row['nome']}')\">{$row['nome']}</button>";
    }
} else {
    echo "<p>Nenhum conjunto encontrado.</p>";
}

$conn->close();
?>
