<?php
include 'conexao.php';

// Verifique se o nome da tabela foi enviado via POST
if (isset($_POST['nome'])) {
    $nomeTabela = $_POST['nome'];

    // Sanitize o nome da tabela (isso é importante para evitar injeções SQL)
    $nomeTabela = mysqli_real_escape_string($conn, $nomeTabela);

    // Construir o comando SQL para deletar a tabela
    $sqlDropTable = "DROP TABLE IF EXISTS `$nomeTabela`";

    // Executar o comando SQL para deletar a tabela
    if ($conn->query($sqlDropTable) === TRUE) {
        // Após deletar a tabela, também excluir a linha na tabela 'conjuntos' com o mesmo nome
        $sqlDeleteRow = "DELETE FROM conjuntos WHERE nome = '$nomeTabela'";

        if ($conn->query($sqlDeleteRow) === TRUE) {
            // Exibir a lista de produtos atualizada
            $sql = "SELECT id, nome FROM conjuntos";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<button onclick=\"mostrarNome('{$row['nome']}')\">{$row['nome']}</button>";
                }
            } else {
                echo "<p>Nenhum conjunto encontrado.</p>";
            }
        } else {
            echo "Erro ao deletar linha da tabela 'conjuntos': " . $conn->error;
        }
    } else {
        echo "Erro ao deletar tabela: " . $conn->error;
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

$conn->close();
?>
