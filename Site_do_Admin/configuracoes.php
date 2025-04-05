<?php
include 'conexao.php';

$sql = "SELECT id, nome FROM conjuntos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estoque</title>
    <style>
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: top;
            justify-content: left;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .faixa {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            white-space: nowrap;
            width: 100%;
            padding: 10px;
            background: #ddd;
            border-radius: 10px;
        }
        
        .faixa button {
            flex: 1;
            min-width: 100px;
            padding: 10px;
            border: none;
            background: rgb(255, 255, 255);
            color: black;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 1vw; 
            max-width: 100%;
            height: 100%;
            overflow: hidden;
            white-space: normal;
            word-wrap: break-word;
        }

        .botao-menor {
            background-color: #447086 !important;
            color: white !important;
            border: none !important;
            padding: 3px 8px !important;
            font-size: 0.7em !important;
            cursor: default !important;
            border-radius: 5px !important;
            opacity: 0.8 !important;
            width: 50px !important;
            height: 30px !important;
            flex: none !important; 
            display: flex !important; 
            align-items: center !important; 
            justify-content: center !important; 
            margin: auto 5px !important; 
        }

        .faixa button:hover {
            background: rgb(68, 100, 134);
        }

        #output {
            margin-top: 20px;
            font-size: 20px;
            font-weight: bold;
        }

        .container-principal {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .classepage {
            flex: 1;
            overflow-y: auto;
            margin: 10px;
            padding: 10px;
            background: #ddd;
            border-radius: 10px;
            width: 100%;
        }   

        .form-container {
            flex: 1;
            min-width: 250px;
            max-width: 400px;
            height: 100%;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        /* Faz o form ocupar todo o espaço dentro do container */
        #formAdicionarDados {
            display: flex;
            flex-direction: column;
            flex-grow: 1; /* Isso força o form a ocupar todo o espaço da aba */
            gap: 10px;
        }

        /* Para garantir que os campos cresçam proporcionalmente */
        .form-field {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        /* Faz o botão ir para a parte inferior da aba */
        .submit-btn {
            margin-top: auto; /* Isso faz com que o botão fique no final */
            padding: 10px;
            font-size: 1rem;
            background: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #0056b3;
        }


                
    </style>
</head>
<body>

    <div class="retangulo">
        <div class="texto">Configurações de Cardápio</div>
    </div>
    
    <form id="formProduto" method="POST">
        <div class="campo">
            <label for="nome">Nome do Conjunto:</label>
            <input type="text" id="nome" name="nome" maxlength="50" required>
            <button type="submit">Adicionar</button>  
        </div>
    </form>

    <!-- Lista de Produtos -->
    <div id="produtosList" class="faixa">
        <?php
            if ($result->num_rows > 0) {
                $conjuntos = [];
                
                while ($row = $result->fetch_assoc()) {
                    $conjuntos[] = $row['nome']; // Armazena os nomes dos conjuntos
                }

                $total = count($conjuntos);

                for ($i = 0; $i < $total; $i++) {
                    echo "<button onclick=\"mostrarNome('{$conjuntos[$i]}')\">{$conjuntos[$i]}</button>";
                }
            } else {
                echo "<p>Nenhum conjunto encontrado.</p>";
            }
        ?>  
    </div>

    <div id="output" class="classepage"></div>

<script>
    // Enviar formulário via AJAX
    document.getElementById("formProduto").addEventListener("submit", function(event) {
        event.preventDefault();

        var formData = new FormData(this);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "adicionar_conjunto.php", true);

        xhr.onload = function() {
            if (xhr.status == 200) {
                document.getElementById("produtosList").innerHTML = xhr.responseText;
                document.getElementById("nome").value = ''; // Limpa o campo de texto após a adição
            } else {
                alert("Erro ao adicionar produto!");
            }

        };

        xhr.send(formData);
    });

    function mostrarNome(nome) {
        let outputDiv = document.getElementById("output");

        outputDiv.innerHTML = `     
            <h2>Você selecionou: ${nome}</h2>
        
            <div class="botoes-container">
                <button onclick="deletarTabela('${nome}')">Deletar Conjunto</button>
                <button onclick="mover(-1)">Mover Para Esquerda</button>
                <button onclick="mover(1)">Mover Para Direita</button>
            </div>
     
            <form id="formAdicionarDados" method="POST">
                <input type="hidden" id="nomeTabela" name="nomeTabela">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required>
                
                <label for="descricao">Descrição:</label>
                <textarea id="descricao" name="descricao" required></textarea>
                
                <label for="estoque">Estoque:</label>
                <input type="text" id="estoque" name="estoque" required>
                
                <label for="opcao">Opção:</label>
                <input type="text" id="opcao" name="opcao" required>
                
                <label for="adicionais">Adicionais:</label>
                <input type="text" id="adicionais" name="adicionais" required>
                
                <label for="preco">Preço:</label>
                <input type="number" step="0.01" id="preco" name="preco" required>
                
                <label for="foto">Foto (URL):</label>
                <input type="text" id="foto" name="foto" required>
                
                <button type="submit">Adicionar Item</button>
            </form>
        <div id="mensagem"></div>`;   
    }

    function mover(x) {
        let nome = document.querySelector("#output h2").innerText.replace("Você selecionou: ", "");

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "mover_conjunto.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            if (xhr.status == 200) {
                let resposta = JSON.parse(xhr.responseText);

                if (resposta.sucesso) {
                    location.reload();
                } else {
                    alert("Não foi possível mover o conjunto.");
                }
            } else {
                alert("Erro na requisição.");
            }
        };

        xhr.send("nome=" + encodeURIComponent(nome) + "&direcao=" + x);
    }

    function deletarTabela(nome) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "deletar_tabela.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function() {
            if (xhr.status == 200) {
                alert("Tabela deletada com sucesso!");
                document.getElementById("produtosList").innerHTML = xhr.responseText; // Atualiza a lista de produtos
            } else {
                alert("Erro ao deletar a tabela!");
            }
        };

        xhr.send("nome=" + nome);

        let outputDiv = document.getElementById("output");
        outputDiv.innerHTML = ``;
    }

    document.getElementById("formAdicionarDados").addEventListener("submit", function(event) {
    event.preventDefault();

    var formData = new FormData(this);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "adicionar_dados.php", true);

    xhr.onload = function() {
        if (xhr.status == 200) {
            document.getElementById("mensagem").innerText = xhr.responseText;
            document.getElementById("formAdicionarDados").reset();
        } else {
            alert("Erro ao adicionar os dados!");
        }
    };

    xhr.send(formData);
});

function mostrarNome(nome) {
    document.getElementById("output").innerHTML = `

        <h2>Você selecionou: ${nome}</h2>
        
        <div class="botoes-container">
            <button onclick="deletarTabela('${nome}')">Deletar Conjunto</button>
            <button onclick="mover(-1)">Mover Para Esquerda</button>
            <button onclick="mover(1)">Mover Para Direita</button>
        </div>

        <div class="form-container">
            <form id="formAdicionarDados" method="POST">
                <input type="hidden" id="nomeTabela" name="nomeTabela" value="${nome}">

                <div class="form-field">
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" required>
                </div>

                <div class="form-field">
                    <label for="descricao">Descrição:</label>
                    <textarea id="descricao" name="descricao" required></textarea>
                </div>

                <div class="form-field">
                    <label for="estoque">Estoque:</label>
                    <input type="text" id="estoque" name="estoque" required>
                </div>

                <div class="form-field">
                    <label for="opcao">Opção:</label>
                    <input type="text" id="opcao" name="opcao" required>
                </div>

                <div class="form-field">
                    <label for="adicionais">Adicionais:</label>
                    <input type="text" id="adicionais" name="adicionais" required>
                </div>

                <div class="form-field">
                    <label for="preco">Preço:</label>
                    <input type="number" step="0.01" id="preco" name="preco" required>
                </div>

                <div class="form-field">
                    <label for="foto">Foto (URL):</label>
                    <input type="text" id="foto" name="foto" required>
                </div>

                <button type="submit" class="submit-btn">Adicionar Item</button>
            </form>
        </div>



        <div id="mensagem"></div>
    `;

    document.getElementById("formAdicionarDados").addEventListener("submit", function(event) {
        event.preventDefault();

        var formData = new FormData(this);
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "adicionar_dados.php", true);

        xhr.onload = function() {
            if (xhr.status == 200) {
                document.getElementById("mensagem").innerText = xhr.responseText;
                document.getElementById("formAdicionarDados").reset();
            } else {
                alert("Erro ao adicionar os dados!");
            }
        };

        xhr.send(formData);
    });
}

</script>

</body>
</html>
