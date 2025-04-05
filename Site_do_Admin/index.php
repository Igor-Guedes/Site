<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retângulo com Texto</title>
    <style>
  
        body {
            margin: 0;
            padding: 0;
            height: 100vh; 
            display: flex;
            flex-direction: column; 
            justify-content: flex-start; 
            align-items: center; 
            background-color:rgb(255, 255, 255); 
        }

        
        .retangulo {
            width: 100%; 
            height: 8%; 
            background-color: rgb(0, 0, 0); 
            display: flex;
            justify-content: center; 
            align-items: center;
            position: absolute;
            top: 0; 
        }
        .texto {
            color: white;
            font-size: 24px;
            font-weight: bold; 
        }

         
        .retangulo-botoes {
            width: calc(100% - 20px);
            height: 92%; 
            background-color: rgb(240, 240, 240);
            display: flex;
            justify-content: center; 
            align-items: center; 
            position: absolute;
            top: 8%;
        }
        .botoes-container {
            width: 95%;
            
            display: flex;
            gap: 10px; /* Espaçamento entre os botões */
            flex-wrap: wrap; /* Permite que os botões se movam para a linha seguinte em telas pequenas */
            justify-content: left; /* Centraliza os botões */
            flex-direction: column; 
            box-sizing: border-box;
        }
        button {
            padding: 50px 30px; /* Aumenta o padding (distância interna do botão) */
            font-size: 20px; /* Aumenta o tamanho da fonte */
            background-color: white;
            color: rgb(28, 110, 204);
            border: none;
            border-radius: 5px;
            cursor: pointer;
            min-width: 150px; /* Aumenta a largura mínima */
            width: 100%; /* Continua fazendo os botões ocuparem toda a largura disponível */
            margin-bottom: 10px; /* Aumenta o espaço entre os botões */
        }

        button:hover {
            background-color: rgb(44, 127, 221); 
            color: white; 
        }


    </style>
</head>
<body>
    <div class="retangulo">
        <div class="texto">Pagina da Administração</div>
    </div>

    <div class="retangulo-botoes" id="botoesContainer">
        <div class="botoes-container">
            <button onclick="window.location.href='estoque.php'">Estoque</button>
            <button onclick="window.location.href='estatisticas.html'">Estatísticas</button>
            <button onclick="window.location.href='vendas.html'">Venda/Cancelamento</button>
            <button onclick="window.location.href='configuracoes.php'">Configuração do Cardápio</button>
        </div>
    </div>

    <script>
        // Função para verificar a senha antes de liberar o acesso
        function verificarSenha() {
            const senha = prompt("Digite a senha para acessar a página de administração:");
            
            // Senha fixa para acesso (pode ser alterada conforme necessário)
            const senhaCorreta = "";

            if (senha === senhaCorreta) {
                document.getElementById("botoesContainer").style.display = "flex"; // Exibe os botões
            } else {
                alert("Senha incorreta! Você não tem permissão para acessar.");
                window.location.href = "index.html"; // Redireciona para a página inicial ou outra
            }
        }
        
        window.onload = verificarSenha;
    </script>
</body>
</html>
