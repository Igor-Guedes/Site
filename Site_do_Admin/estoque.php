<?php
include 'conexao.php'; // Conectar ao banco de dados

// Consulta para obter os dados da tabela produtos
$sql = "SELECT id, nome, quantidade, preco, vencimento FROM produtos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
    <style>
        /* Seu estilo existente */
        .retangulo {
            background-color: #f0f0f0;
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }
        .texto {
            font-size: 20px;
            font-weight: bold;
        }
        .campo {
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

    <div class="retangulo">
        <div class="texto">Página do Estoque</div>
    </div>
    
    <!-- Formulário de Inserção -->
    <form id="formProduto" method="POST">
        <div class="campo">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" maxlength="50" required>
        </div>

        <div class="campo">
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" min="1" max="1000" required>
        </div>

        <div class="campo">
            <label for="preco">Preço:</label>
            <input type="text" id="preco" name="preco" pattern="\d+(\.\d{1,2})?" title="Formato: 1234.56" required>
        </div>

        <div class="campo">
            <label for="vencimento">Vencimento:</label>
            <input type="date" id="vencimento" name="vencimento" required>
        </div>

        <button type="submit">Adicionar</button>
    </form>

    <!-- Exibição dos Produtos -->
    <h2>Produtos no Estoque</h2>
    <div id="produtosList">
        <?php
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
        ?>
    </div>

    <script>
        // Função que envia o formulário via AJAX
        document.getElementById("formProduto").addEventListener("submit", function(event){
            event.preventDefault(); // Evita o envio do formulário da maneira tradicional

            var formData = new FormData(this);

            // Enviar os dados do formulário para o PHP via AJAX
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "adicionar_produto.php", true);

            xhr.onload = function() {
                if (xhr.status == 200) {
                    // Se a inserção for bem-sucedida, atualizar a lista de produtos
                    document.getElementById("produtosList").innerHTML = xhr.responseText;
                } else {
                    alert("Erro ao adicionar produto!");
                }
            };

            xhr.send(formData);
        });


        // Função para atualizar a quantidade via AJAX
            function Salvar(id) {
                var quantidade = document.getElementById("quantidade_" + id).value;
                var valor = document.getElementById("valor_" + id).value;
                var data = document.getElementById("data_" + id).value;

                var xhr = new XMLHttpRequest();
                xhr.open("POST", "salvar.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                xhr.onload = function() {
                    if (xhr.status == 200) {
                        // Exibir mensagem de sucesso ou erro
                        alert(xhr.responseText);
                        // Atualizar a lista de produtos após a atualização
                        location.reload(); // Recarregar a página para refletir as mudanças
                    } else {
                        alert("Erro ao atualizar produto!");
                    }
                };

                // Concatenando os parâmetros corretamente
                var params = "id=" + encodeURIComponent(id) + 
                            "&quantidade=" + encodeURIComponent(quantidade) + 
                            "&valor=" + encodeURIComponent(valor) + 
                            "&data=" + encodeURIComponent(data);

                xhr.send(params);
            }
    </script>
</body>
</html>