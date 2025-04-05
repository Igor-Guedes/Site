<?php
include 'conexao.php'; // Inclui a conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];
    $vencimento = $_POST['vencimento'];

    // Verificar se o produto já existe na tabela
    $checkProduto = "SELECT * FROM produtos WHERE nome = '$nome'";
    $resultCheck = $conn->query($checkProduto);

    if ($resultCheck->num_rows > 0) {
        // Se já existe, exibe a mensagem de erro
        echo "<script>alert('Produto com o nome \"$nome\" já existe na tabela! Não é permitido adicionar produtos com o mesmo nome.');</script>";
    } else {
        // Caso contrário, inserir o novo produto
        $sql = "INSERT INTO produtos (nome, quantidade, preco, vencimento)
                VALUES ('$nome', '$quantidade', '$preco', '$vencimento')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Produto \"$nome\" inserido com sucesso!');</script>";
        } else {
            echo "Erro: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Consulta para pegar os dados atualizados e exibir a tabela
$result = $conn->query("SELECT id, nome, quantidade, preco, vencimento FROM produtos");

if ($result->num_rows > 0) {
    // Exibir dados em uma tabela
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Vencimento</th>
                <th>Salvar</th>
            </tr>";
    // Iterar e exibir cada linha
    while($row = $result->fetch_assoc()) {

        // Verificando se a quantidade é 0 ou a data de vencimento já passou
        $data_vencimento = strtotime($row["vencimento"]); // Convertendo para timestamp
        $data_atual = time(); // Timestamp atual
        $cor_nome = 'white'; // Cor padrão para o nome

        if ($row["quantidade"] == 0 || $data_vencimento < $data_atual) {
            $cor_nome = 'rgba(255, 0, 0, 0.6)'; // Se a quantidade for 0 ou a data passou, muda para vermelho
        }

        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td style='background-color: $cor_nome;'>" . $row["nome"] . "</td>
                <td> <input type='number' id='quantidade_" . $row["id"] . "' value='" . $row["quantidade"] . "' min='0' max='1000'> </td>
                <td> <input type='number' id='valor_" . $row["id"] . "' value='" . $row["preco"] . "' min='0' max='1000'> </td>
                <td> <input type='date' id='data_" . $row["id"] . "' value='" . $row["vencimento"] . "' min='0' max='1000'> </td>
                <td> <button onclick='Salvar(" . $row["id"] . ")'>Salvar</button> </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum produto encontrado!";
}

$conn->close(); 
?>
