<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katatall Lanches</title>

    <style>
        /* ===============================================
           VARIÁVEIS CSS
           =============================================== */
        :root {
            --cor-fundo: #f5f5f5;
            --cor-branco: #ffffff;
            --cor-destaque: rgb(190, 190, 190);
            --cor-texto: rgb(0, 0, 0);
            --sombra: 0 2px 15px rgba(0, 0, 0, 0.6);
        }

        /* ===============================================
           ESTILOS BASE
           =============================================== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--cor-fundo);
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: var(--cor-texto);
        }

        /* ===============================================
           CABEÇALHO
           =============================================== */
        header {
            position: fixed;
            width: 100%;
            background-color: var(--cor-branco);
            display: flex;
            align-items: center;
            padding: 0;
            height: 50px;
            top: 0;
            z-index: 1000;
            box-shadow: var(--sombra);
        }

        .logo {
            width: 50px;
            height: 50px;
            background: url('../imagens/logo.png') center/contain no-repeat;
            flex-shrink: 0;
        }

        /* ===============================================
           BARRA DE PESQUISA
           =============================================== */
        .barra-busca {
            flex: 1;
            max-width: 500px;
            margin-left: auto;
            background: var(--cor-fundo);
            border-radius: 10px;
            padding: 0.1rem 1rem;
            display: flex;
            align-items: center;
        }

        .barra-busca:focus-within {
            box-shadow: var(--sombra);
        }

        .lupa {
            width: 20px;
            height: 20px;
            background: url('../imagens/Lupa.png') center/contain no-repeat;
        }

        .barra-busca input {
            width: 100%;
            border: none;
            background: transparent;
            font-size: 1rem;
            padding: 0.5rem;
            outline: none;
        }

        /* ===============================================
           BANNER PRINCIPAL
           =============================================== */
        .pagina-logo {
            position: relative;
            min-height: 400px;
            background: url(../imagens/Pagina_Logo.png) center/cover no-repeat;
            z-index: 1;
            width: 100%;
        }

        .logo-titulo {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 4rem;
            color: var(--cor-branco);
            text-shadow: var(--sombra);
            text-align: center;
            width: 100%;
            padding: 0 1rem;
        }

        /* ===============================================
           STATUS DA LOJA
           =============================================== */
        .status-loja {
            position: absolute;
            top: 60%;
            left: 50%;
            transform: translateX(-50%);
            font-size: 1.5rem;
            text-shadow: var(---sombra);
            white-space: nowrap;
        }

        .logo-bottom {
            position: absolute;
            left: 5%;
            bottom: 10%;
            filter: drop-shadow(var(--sombra));
            width: 150px;
            height: 150px;
        }

        /* ===============================================
           BARRA DE NAVEGAÇÃO
           =============================================== */
        .lista-botoes {
            position: fixed;
            top: 51px;
            width: 100%;
            z-index: 1000;
            background-color: var(--cor-branco);
            box-shadow: var(--sombra);
            overflow-x: scroll;
            display: flex;
            gap: 0px;
            white-space: nowrap;
            scrollbar-width: thin;
        }

        .lista-botoes::-webkit-scrollbar {
            display: none;
        }

        /* ===============================================
           BOTÕES DE CATEGORIA
           =============================================== */
        .botao-conjunto {
            flex-shrink: 0;
            width: 160px;
            height: 30px;
            border: none;
            border-radius: 10px;
            background: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.2s;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .botao-conjunto:hover {
            transform: translateY(-5px);
        }

        .botao-conjunto span {
            font-size: 14px;
            font-weight: bold;
            color: var(--cor-texto);
            text-align: center;
        }

        /* ===============================================
           CONTEÚDO PRINCIPAL
           =============================================== */
        main {
            position: relative;
            padding: 2%;
            width: 96%;
            margin-left: 2%;
            z-index: 9;
            padding-bottom: 200px;
        }

        .aba-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    background-color: #f5f5f5;
    border-bottom: 1px solid #ddd;
}

        .aba-produtos {
            margin-top: 0;
            background: var(--cor-branco);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            height: auto;
            overflow: visible;
        }

        .produtos-lista {
            margin-top: 0px;
        }

        .produto-item {
            padding: 10px;
            margin: 0;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .produto-item:hover {
            transform: translateY(-3px);
        }

        #abasProdutosContainer {
            margin-top: -50px;
            padding: 0;
        }

        /* ===============================================
           ESTILOS DOS PRODUTOS
           =============================================== */
        .produto {
            display: flex;
            align-items: center;
            width: 100%;
        }

        .produto-imagem {
            width: 100px;
            height: auto;
            object-fit: cover;
        }

        .produto-texto {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 100%;
            padding: 10px;
        }

        .produto-titulo {
            font-size: 1.3rem;
            font-weight: bold;
            color: black;
        }

        .produto-descricao {
            font-size: 1rem;
            color: black;
            max-height: 70%;
            overflow-y: auto;
        }

        .produto-preco {
            align-self: flex-end;
            font-size: 1.2rem;
            font-weight: bold;
            color: green;
        }

        /* ===============================================
           MODAL
           =============================================== */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 1% auto;
            border: 1px solid #888;
            width: 100%;
            max-width: 700px;
            border-radius: 10px;
            position: relative;
            animation: slideIn 0.3s ease-out;
            overflow-y: auto;
            height: 100vh;
        }

        .modal-imagem {
            width: 100%;
            border-radius: 5px;
            height: auto;
            object-fit: contain;
            height: 50vh;
        }

        @keyframes slideIn {
            from { transform: translateY(-100px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        .close {
            color: rgb(0, 0, 0);
            float: left;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
            position: fixed;
            right: 10px;
        }

        .close:hover,
        .close:focus {
            color: black;
        }

        /* ===============================================
           ADICIONAIS
           =============================================== */
        .adicional-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fff;
        }

        .adicional-info {
            flex-grow: 1;
            margin-right: 15px;
        }

        .adicional-nome {
            font-weight: 600;
            color: #333;
            display: block;
            margin-bottom: 4px;
        }

        .adicional-preco {
            color: #27ae60;
            font-size: 0.9em;
        }

        .quantidade-controle {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .quantidade-btn {
            width: 30px;
            height: 30px;
            border: none;
            border-radius: 50%;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quantidade-btn:disabled {
            background-color: #bdc3c7 !important;
            cursor: not-allowed;
        }

        .btn-menos {
            background-color: #e74c3c;
            color: white;
        }

        .btn-mais {
            background-color: #3498db;
            color: white;
        }

        .quantidade-numero {
            min-width: 30px;
            text-align: center;
            font-weight: bold;
        }

        /* ===============================================
           OPÇÕES
           =============================================== */
        .opcao-grupo {
            margin: 15px 0;
            padding: 15px;
            border: 1px solid #eee;
            border-radius: 10px;
            background: #f9f9f9;
        }

        .opcao-grupo h5 {
            margin-bottom: 10px;
            color: #333;
            font-size: 1.1em;
        }

        .opcao-grupo label {
            display: block;
            margin: 8px 0;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .opcao-grupo label:hover {
            background: #f0f0f0;
        }

        .opcao-grupo input[type="radio"] {
            margin-right: 10px;
        }

        /* ===============================================
           SACOLA (FOOTER)
           =============================================== */
        .sacola-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background: var(--cor-branco);
            box-shadow: var(--sombra);
            z-index: 67;
            padding: 10px 0;
            max-height: 200px;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .sacola-footer.visible {
            transform: translateY(0);
        }

        .sacola-container {
            flex: 1;
            padding: 0 15px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 15px;
            max-height: 220px;
            overflow-y: auto;
        }

        .item-sacola {
            flex: 0 0 250px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            position: relative;
            height: 100%;
        }

        .item-sacola img {
            width: 100%;
            object-fit: cover;
            border-radius: 4px;
        }

        .item-sacola-info {
            padding: 10px 0;
        }

        .item-sacola:hover {
            transform: translateY(-5px);
        }

        .btn-remover {
            position: absolute;
            top: 5px;
            right: 5px;
            background: #e74c3c;
            color: white;
            border: none;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .resumo-compra {
            padding: 15px;
            border-top: 2px solid #eee;
            background: var(--cor-branco);
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 28px;
            z-index: 90;
        }

        .total-preco {
            font-size: 1.2em;
            font-weight: bold;
            color: #27ae60;
        }

        .botao-finalizar {
            background: #27ae60;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 1.1em;
            transition: transform 0.2s;
        }

        .botao-finalizar:hover {
            transform: scale(1.05);
        }

        .item-sacola-titulo {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .item-sacola-preco {
            color: green;
            font-weight: bold;
        }

        .botao-adicionar {
            background: #27ae60;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px;
            width: 100%;
        }

        .mensagem-erro {
            color: #e74c3c;
            font-weight: bold;
            padding: 10px;
            margin: 15px 0;
            background: #fee;
            border-radius: 5px;
            border: 1px solid #e74c3c;
            display: none;
        }

        .detalhes-pedido {
            font-size: 0.9em;
            color: #666;
            margin-top: 10px;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 6px;
            border: 1px solid #eee;
        }

        .detalhes-pedido p {
            margin: 8px 0;
            color: #333;
        }

        .detalhes-pedido strong {
            display: block;
            margin-bottom: 5px;
            color: #2c3e50;
        }

        /* ===============================================
           MODAL DE FINALIZAÇÃO
           =============================================== */
        .modal-finalizacao {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 2000;
            animation: none !important; 
        }

        .modal-finalizacao-content {
            background-color: var(--cor-branco);
            margin: 2% auto;
            padding: 20px;
            border-radius: 10px;
            width: 95%;
            max-width: 600px;
            position: relative;
        }

        .modal-finalizacao-content .close {
            position: absolute;
            right: 20px;
            top: 10px;
            cursor: pointer;
            font-size: 30px;
            color: #000;
            z-index: 1;
        }

        .modal-finalizacao-content .close:hover {
            color: #e74c3c;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        #resumoFinal {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
        }

        #resumoFinal p {
            margin: 5px 0;
            display: flex;
            justify-content: space-between;
        }

        /* ===============================================
        COMPROVANTE ESTILIZADO
        =============================================== */
        #comprovantePedido {
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            padding: 30px;
            max-width: 600px;
            margin: 20px auto;
            font-family: 'Arial', sans-serif;
            display: none;
            border: 1px solid #eee;
        }

        .comprovante-header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #27ae60;
            margin-bottom: 25px;
            position: relative;
        }

        .comprovante-header h2 {
            color: #2c3e50;
            font-size: 1.8em;
            margin: 15px 0;
            display: flex;
            align-items: center;
            gap: 10px;
            justify-content: center;
        }

        .comprovante-header h2::before,
        .comprovante-header h2::after {
            content: '';
            flex: 1;
            height: 2px;
            background: linear-gradient(90deg, transparent, #27ae60);
        }

        .comprovante-header h2::after {
            background: linear-gradient(270deg, transparent, #27ae60);
        }

        .comprovante-info {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 25px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            box-shadow: inset 0 2px 5px rgba(0,0,0,0.05);
        }

        .comprovante-info p {
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }

        .comprovante-info strong {
            color: #27ae60;
            min-width: 80px;
        }

        .comprovante-item {
            padding: 20px;
            margin: 15px 0;
            background: white;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            border-left: 4px solid #27ae60;
            transition: transform 0.2s;
        }

        .comprovante-item:hover {
            transform: translateY(-3px);
        }

        .item-titulo {
            font-size: 1.1em;
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .item-detalhes {
            margin-left: 20px;
            border-left: 2px solid #eee;
            padding-left: 15px;
        }

        .adicional-comprovante,
        .opcao-comprovante {
            color: #7f8c8d;
            font-size: 0.92em;
            margin: 8px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .item-observacoes {
            color: #e67e22;
            background: #fff4e6;
            padding: 10px;
            border-radius: 6px;
            margin: 10px 0;
            font-size: 0.9em;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .comprovante-total {
            font-size: 1.4em;
            font-weight: 700;
            text-align: right;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid #27ae60;
            color: #2c3e50;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .adicional-comprovante::before {
            content: '+';
            color: #27ae60;
            font-weight: bold;
        }

        .opcao-comprovante::before {
            content: '•';
            color: #3498db;
            font-weight: bold;
        }

        .item-observacoes::before {
            content: '✎';
            font-size: 1.1em;
        }

        .comprovante-total::before {
            content: 'Total:';
            font-weight: 600;
            color: #7f8c8d;
        }

        .whatsapp-loading {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0,0,0,0.8);
            color: white;
            padding: 20px 30px;
            border-radius: 10px;
            display: none;
            align-items: center;
            gap: 15px;
            z-index: 9999;
        }

        .whatsapp-loading i {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }


        .aviso-whatsapp {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #25D366;
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            display: none;
            align-items: center;
            gap: 10px;
            z-index: 10000;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

        /* ===============================================
        ESTILOS ADMIN
        =============================================== */
        .admin-hidden {
            opacity: 0.5;
            background-color: #ffe6e6;
        }

        .botao-adicionar-conjunto {
            background-color: #4CAF50;
            flex-shrink: 0;
            width: 160px;
            height: 30px;
            border: none;
            border-radius: 10px;
            background: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: transform 0.2s;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /* ===============================================
        MODAL SENHA ADMIN
        =============================================== */
        .modal-senha {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            z-index: 9999;
        }

        .admin-ativo .sacola-footer,
        .admin-ativo .botao-finalizar {
            display: none !important;
        }


/* ===============================================
          controle de visibilidade e exclusão
           =============================================== */


           .controle-visibilidade {
    display: flex;
    align-items: center;
    gap: 5px;
}

.controle-botoes {
    display: flex;
    gap: 15px;
    align-items: center;
}

.botao-excluir {
    background: #ff4444;
    color: white;
    border: none;
    padding: 5px 10px;
    border-radius: 4px;
    cursor: pointer;
    transition: background 0.3s;
}

.botao-excluir:hover {
    background: #cc0000;
}

.checkbox-visibilidade {
    margin: 0;
    width: 16px;
    height: 16px;
}

.erro-taxa {
    padding: 10px;
    background: #ffebee;
    border-radius: 5px;
    color: #c62828;
    margin: 10px 0;
    border: 1px solid #ef9a9a;
}

.ingredientes-lista {
    margin: 15px 0;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
    border-left: 3px solid #3498db;
}

.ingredientes-lista h4 {
    margin-bottom: 10px;
    color: #2c3e50;
    font-size: 1.1em;
    display: flex;
    align-items: center;
}

.ingredientes-lista h4::before {
    content: "🍔";
    margin-right: 8px;
}

.ingredientes-lista ul {
    padding-left: 25px;
    margin-top: 8px;
}

.ingredientes-lista li {
    margin-bottom: 6px;
    list-style-type: none;
    position: relative;
    padding-left: 20px;
    color: #34495e;
}

.ingredientes-lista li::before {
    content: "•";
    color: #3498db;
    font-weight: bold;
    position: absolute;
    left: 0;
}

        /* ===============================================
          whatsapp
           =============================================== */


.aviso-whatsapp {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background: #25D366;
    color: white;
    padding: 15px 25px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    display: none;
    align-items: center;
    gap: 10px;
    z-index: 10000;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

        /* ===============================================
           RESPONSIVIDADE
           =============================================== */
        @media (max-width: 1024px) {
            .logo-bottom {
                display: none;
            }
            .logo-titulo {
                top: 45%;
                font-size: 3rem;
            }
            .status-loja {
                top: 55%;
                font-size: 1.3rem;
            }
        }

        @media (max-width: 768px) {
            header {
                padding: 0 1rem;
                height: 60px;
            }
            main {
                padding-left: 0%;
                padding-right: 0%;
                padding-top: 0%;
                padding-bottom: 200px;
                width: 100%;
                margin-left: 0%;
            }
            .logo {
                width: 60px;
                height: 60px;
            }
            .barra-busca {
                margin-left: 1px;
                padding: 0.5rem 1rem;
            }
            .logo-titulo {
                font-size: 2.5rem;
                top: 50%;
            }
            .status-loja {
                top: 60%;
                font-size: 1.2rem;
            }
            .botao-conjunto {
                width: 120px;
                height: 30px;
            }
        }

        @media (max-width: 480px) {
            .logo {
                display: none;
            }
            main {
                padding-left: 0%;
                padding-right: 0%;
                padding-top: 0%;
                padding-bottom: 200px;
                width: 100%;
                margin-left: 0%;
            }
            .barra-busca {
                width: 100%;
                max-width: none;
            }
            .logo-titulo {
                font-size: 2rem;
                padding: 0 0.5rem;
            }
            .status-loja {
                font-size: 1rem;
                top: 58%;
            }
            #comprovantePedido {
                padding: 20px;
                margin: 10px;
            }
            
            .comprovante-info {
                grid-template-columns: 1fr;
            }
            
            .comprovante-total {
                font-size: 1.2em;
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>

<body>
    <!-- Cabeçalho -->
    <header>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <div class="logo"></div>
        <div class="barra-busca">
            <div class="lupa"></div>
            <input type="text" id="searchInput" placeholder="Buscar produto..." onkeyup="filtrarProdutos()">
        </div>
    </header>

    <!-- Banner Principal -->
    <div class="pagina-logo">
        <img class="logo-bottom" src="../imagens/logo.png" alt="Logo Catatau">
        <h1 class="logo-titulo">Katatall Lanches</h1>
        <div class="status-loja" id="statusLoja"></div>
    </div>

    <!-- Barra de Categorias -->
    <div class="lista-botoes" id="listaBotoes"></div>

    <!-- Conteúdo Principal -->
    <main>
        <div id="abasProdutosContainer"></div>
    </main>

    <!-- Modal de Produto -->
    <div id="produtoModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img id="modalImage" class="modal-imagem" src="" alt="Imagem do Produto">
            <div class="modal-texto">
                <h2 id="modalTitulo"></h2>
                <p id="modalDescricao"></p>
                
                <div id="modalIngredientes" class="ingredientes-lista"></div>

                <div id="adicionaisContainer">
                    <h4>Adicionais:</h4>
                    <div id="listaAdicionais"></div>
                </div>

                <div id="opcoesContainer">
                    <h4>Opções:</h4>
                    <div id="listaOpcoes"></div>
                </div>
                
                <label for="observacoes">Observações:</label>
                <textarea id="observacoes" rows="3" placeholder="Exemplo: Sem cebola, pouco sal..." 
                    style="width: 100%; resize: none;"></textarea>
                
                <div id="erroOpcoes" class="mensagem-erro"></div>

                <div class="preco-total">
                    <h3>Preço Total: <span id="modalPreco" class="preco"></span></h3>
                    <button class="botao-adicionar" onclick="adicionarAoCarrinho()">Adicionar à Sacola</button>
                    <div> ...</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sacola Footer -->
    <div class="sacola-footer" id="sacolaFooter">
        <div class="sacola-container" id="sacolaContainer"></div>
        <div class="resumo-compra">
            <span class="total-preco">Total: R$ <span id="totalSacola">0,00</span></span>
            <button class="botao-finalizar" onclick="finalizarCompra()">Finalizar Compra</button>
            
        </div>
    </div>

    <!-- Modal de Finalização -->
    <div id="modalFinalizacao" class="modal-finalizacao">
        <div class="modal-finalizacao-content">
            <span class="close" onclick="fecharModalFinalizacao()" 
                style="position: absolute; right: 20px; top: 10px; cursor: pointer; font-size: 30px; color: #000;">
                
            </span>
            <h2>Finalizar Pedido</h2>
            
            <form id="formEntrega" onsubmit="return false">
                <div class="form-group">
                    <label for="nomeCliente">Nome:</label>
                    <input type="text" id="nomeCliente" required>
                </div>

                <div class="form-group">
                    <label for="enderecoCliente">Bairro:</label>
                    <input type="text" id="enderecoCliente" required>
                </div>


                <button type="button" class="botao-adicionar" onclick="calcularTaxaEntrega()">
                    Calcular Taxa de Entrega
                </button>
            </form>

            <div id="resumoFinal">
                <p>Subtotal: <span id="subtotal">R$ 0,00</span></p>
                <p>Taxa de Entrega: <span id="taxaEntrega">R$ 0,00</span></p>
                <p>Total: <span id="totalFinal">R$ 0,00</span></p>
            </div>

            <button class="botao-finalizar" onclick="confirmarPedido()">Confirmar Pedido</button>
            <div>Ao finalizar clicar em finalizar pedido voce sera redirecionado para o link do WhatsApp</div>
        </div>
    </div>

    <!-- Comprovante para captura -->
    <div id="comprovantePedido">
    <div class="comprovante-header">
        <h2>
            <i class="fas fa-receipt"></i>
            Pedido Confirmado
            <i class="fas fa-check-circle"></i>
        </h2>
    </div>
    
    <div class="comprovante-info">
        <p>
            <strong><i class="fas fa-user"></i> Nome:</strong>
            <span id="compNome"></span>
        </p>
        <p>
            <strong><i class="fas fa-map-marker-alt"></i> Bairro:</strong>
            <span id="compBairro"></span>
        </p>
        <p>
            <strong><i class="fab fa-whatsapp"></i> WhatsApp:</strong>
            <span id="compWhatsapp"></span>
        </p>
    </div>

    <div id="comprovanteItens"></div>
    
    <div class="comprovante-total">
        <span>R$ <span id="compTotal"></span></span>
    </div>

    <div class="comprovante-footer">
        <p>Agradecemos sua preferência! 🍔</p>
        <small>Katatall Lanches - Delivery até as 20h</small>
    </div>
</div>

<div class="whatsapp-loading">
    <i class="fas fa-spinner"></i>
    <span>Preparando envio para WhatsApp...</span>
</div>

<!-- Modal Senha Admin -->
<div id="modalSenha" class="modal-senha">
    <h3>Acesso Administrativo</h3>
    <input type="password" id="inputSenha" placeholder="Digite a senha">
    <button onclick="verificarSenha()">Acessar</button>
    <button onclick="fecharModalSenha()">Cancelar</button>
</div>

<!-- Modal Novo Conjunto -->
<div id="modalNovoConjunto" class="modal">
    <div class="modal-content" style="max-width: 500px;">
        <span class="close" onclick="fecharModalNovoConjunto()">&times;</span>
        <h3>Adicionar Novo Conjunto</h3>
        <form id="formNovoConjunto" onsubmit="cadastrarNovoConjunto(event)">
            <div class="form-group">
                <label for="nomeConjunto">Nome do Conjunto:</label>
                <input type="text" id="nomeConjunto" required class="form-control">
            </div>
            <button type="submit" class="botao-adicionar">Criar Conjunto</button>
        </form>
    </div>
</div>

<div class="aviso-whatsapp" id="avisoWhatsapp">
    <i class="fab fa-whatsapp"></i>
    <span>1. Salve a imagem<br>2. Anexe no WhatsApp</span>
</div>
    <script>
        // ===============================================
        // VARIÁVEIS GLOBAIS
        // ===============================================
        let precoBase = 0;
        let totalAdicionais = 0;
        let carrinho = [];
        let taxaEntrega = 0;
        let subtotal = 0;
        let teclasPressionadas = new Set();
        let adminAtivo = false;

        const WHATSAPP_NUMBER = "+447377909383";
        const PALAVRAS_CHAVE = ['Frango','Super','Fatia de Presunto','Pão'];
      
        // ===============================================
        //  ENTRAR NO MODO ADMIN
        // ===============================================
        document.addEventListener('keydown', (e) => {
            teclasPressionadas.add(e.key.toLowerCase());
            
            if (teclasPressionadas.has('control') && 
                teclasPressionadas.has('alt') && 
                teclasPressionadas.has('a')) {
                abrirModalSenha();
            }
        });

        document.addEventListener('keyup', (e) => {
            teclasPressionadas.delete(e.key.toLowerCase());
        });

        function abrirModalSenha() {
            document.getElementById('modalSenha').style.display = 'block';
        }

        function fecharModalSenha() {
            document.getElementById('modalSenha').style.display = 'none';
        }

        async function verificarSenha() {
            const senha = document.getElementById('inputSenha').value;
            
            try {
                const response = await fetch('login_admin.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ senha })
                });

                const data = await response.json();
                
                if (data.success) {
                    adminAtivo = true;
                    document.body.classList.add('admin-ativo');
                    carregarConjuntos();
                    fecharModalSenha();
                } else {
                    alert('Senha incorreta!');
                }
            } catch (error) {
                console.error('Erro:', error);
                alert('Erro na autenticação');
            }
        }
        
        // ===============================================
        //  CRIAR CONJUNTOS
        // ===============================================
        function carregarConjuntosAdmin() {
            const listaBotoes = document.getElementById('listaBotoes');
            const novoBotao = document.createElement('button');
            novoBotao.className = 'botao-conjunto botao-adicionar-conjunto';
            novoBotao.innerHTML = '+ Novo Conjunto';
            novoBotao.onclick = () => abrirModalNovoConjunto();
            listaBotoes.insertBefore(novoBotao, listaBotoes.firstChild);
        }
        
        function abrirModalNovoConjunto() {
            document.getElementById('modalNovoConjunto').style.display = 'block';
            document.getElementById('nomeConjunto').value = '';
        }

        function fecharModalNovoConjunto() {
            document.getElementById('modalNovoConjunto').style.display = 'none';
        }

        async function cadastrarNovoConjunto(event) {
            event.preventDefault();
            const nomeConjunto = document.getElementById('nomeConjunto').value.trim();
            
            if (!nomeConjunto) {
                alert('Por favor, insira um nome para o conjunto');
                return;
            }

            try {
                const response = await fetch('criar_conjunto.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ 
                        nome_conjunto: nomeConjunto 
                    })
                });

                const data = await response.json();

                if (data.success) {
                    // Adiciona o novo conjunto dinamicamente sem recarregar tudo
                    const novoConjunto = {
                        id: data.id,
                        nome: nomeConjunto
                    };

                    // Cria os elementos do novo conjunto
                    const container = document.getElementById('listaBotoes');
                    const abasContainer = document.getElementById('abasProdutosContainer');
                    criarBotaoCategoria(novoConjunto, container, abasContainer);

                    // Mantém o botão de novo conjunto no início
                    const novoBotao = document.querySelector('.botao-adicionar-conjunto');
                    if (novoBotao) {
                        container.insertBefore(novoBotao, container.firstChild);
                    }

                    alert('Conjunto criado com sucesso!');
                    fecharModalNovoConjunto();
                } else {
                    alert('Erro ao criar conjunto: ' + (data.error || 'Erro desconhecido'));
                }
            } catch (error) {
                console.error('Erro:', error);
                alert('Erro ao comunicar com o servidor');
            }

        }

        // ===============================================
        //  CARREGAR CONJUNTOS E PRODUTOS
        // ===============================================

        function carregarConjuntos() {
      
      const url = adminAtivo ? 
          "http://localhost/Site_do_Client/buscar_conjuntos.php?admin=1" :
          "http://localhost/Site_do_Client/buscar_conjuntos.php";

      fetch(url)
          .then(response => response.text())
          .then(data => {
              try {
                  const jsonData = JSON.parse(data);
                  const container = document.getElementById('listaBotoes');
                  const abasContainer = document.getElementById('abasProdutosContainer');

                  if(adminAtivo){
                      carregarConjuntosAdmin();
                  }

                  jsonData.forEach(conjunto => {
                      criarBotaoCategoria(conjunto, container, abasContainer);
                  });
              } catch (error) {
                  console.error("Erro ao processar os dados:", error);
              }
          })
          .catch(error => console.error("Erro na requisição:", error));
  }
                
        function criarBotaoCategoria(conjunto, container, abasContainer) {

            const existingAba = document.getElementById(`aba-${conjunto.id}`);
            if (existingAba) {
                existingAba.remove(); // Remove a aba existente
            }

            const existingButton = container.querySelector(`button[data-conjunto-id="${conjunto.id}"]`);
            if (existingButton) {
                existingButton.remove(); // Remove o botão existente
            }

            const botao = document.createElement('button');
            botao.className = 'botao-conjunto';
            botao.setAttribute('data-conjunto-id', conjunto.id); 
            botao.innerHTML = `<span>${conjunto.nome}</span>`;

            const aba = document.createElement('div');
            aba.className = 'aba-produtos';
            aba.id = `aba-${conjunto.id}`;  

            if(adminAtivo){
                
                aba.innerHTML = `
                    <div class="aba-header">
                        <h3>${conjunto.nome}</h3>
                        <div class="controle-botoes">
                            <button class="botao-excluir" title="Excluir categoria">🗑️</button>
                            <div class="controle-visibilidade">
                                <input type="checkbox" id="visivel-${conjunto.id}" class="checkbox-visibilidade" 
                                    ${conjunto.visivel ? 'checked' : ''}>
                                <label for="visivel-${conjunto.id}">Visível</label>
                            </div>
                        </div>
                    </div>
                    <div class="produtos-lista" id="produtos-${conjunto.id}"></div>
                    `;

                const checkbox = aba.querySelector(`#visivel-${conjunto.id}`);
                checkbox.addEventListener('change', () => {
                    alert("aqui altera a visibilidade");
                });

                const botaoExcluir = aba.querySelector('.botao-excluir');
                botaoExcluir.addEventListener('click', () => {
                    alert("aqui exclui uma faixa de conjunto");
                });

            }else{
                aba.innerHTML = `
                <div class="aba-header">
                    <h3>${conjunto.nome}</h3>
                </div>
                <div class="produtos-lista" id="produtos-${conjunto.id}"></div>
            `;
            }

            carregarProdutosCategoria(conjunto, aba);
            configurarEventosCategoria(botao, aba);

            container.appendChild(botao);
            abasContainer.appendChild(aba);
        }

        // ===============================================
        // FUNÇÃO QUE INFOMA SE A LOJA ESTA ABERTA OU FECHADAS
        // ===============================================
        function verificarStatusLoja() {
            const agora = new Date();
            const hora = agora.getHours();
            const status = document.getElementById('statusLoja');
            
            if (hora >= 8 && hora < 20) {
                status.textContent = '🟢 ABERTO - Atendendo até 20h';
                status.style.color = '#2ecc71';
            } else {
                status.textContent = '🔴 FECHADO - Abre às 08h';
                status.style.color = '#e74c3c';
            }
        }

        // ===============================================
        // FUNÇÕES DE CARREGAMENTO DE DADOS
        // ===============================================
       
        function carregarProdutosCategoria(conjunto, aba) {
            const url = `http://localhost/Site_do_Client/buscar_produtos.php?conjunto_nome=${
                encodeURIComponent(conjunto.nome)
            }${adminAtivo ? '&admin=1' : ''}`;

            fetch(url)
                .then(response => response.text())
                .then(data => {
                    const produtos = JSON.parse(data);
                    const produtosContainer = document.getElementById(`produtos-${conjunto.id}`);
                    
                    produtosContainer.innerHTML = ''; // Limpa conteúdo anterior
                    
                    produtos.forEach(produto => {
                        const item = criarItemProduto(produto);
                        
                        produtosContainer.appendChild(item);
                    });
                })
                .catch(error => console.error("Erro ao carregar produtos:", error));
        }

        // ===============================================
        // FUNÇÕES DE CRIAÇÃO DE ELEMENTOS
        // ===============================================
        function criarItemProduto(produto) {
            const item = document.createElement('div');
            item.dataset.id = produto.id;
            item.innerHTML = `
                <div class="produto" 
                    data-id="${produto.id}" 
                    data-adicionais="${produto.adicionais || ''}"
                    data-opcao="${produto.opcao || ''}"
                    data-estoque="${produto.estoque || ''}"> <!-- Adicione esta linha -->
                    <img src="../Imagens/Entradas.png" alt="Imagem do Produto" class="produto-imagem">
                    <div class="produto-texto">
                        <strong class="produto-titulo">${produto.titulo}</strong>
                        <p class="produto-descricao">${produto.descricao}</p>
                        <span class="produto-preco">R$ ${produto.preco} </span>
                    </div>
                </div>
            `;
            return item;
        }

        // ===============================================
        // FUNÇÕES DE EVENTOS
        // ===============================================
        function configurarEventosCategoria(botao, aba) {
            botao.addEventListener('click', () => {
                document.querySelectorAll('.aba-produtos').forEach(outraAba => {
                    outraAba.classList.remove('active');
                });

                aba.classList.toggle('active');
                if (aba.classList.contains('active')) {
                    aba.scrollIntoView({ block: "start", behavior: "auto" });
                    setTimeout(() => {
                        window.scrollBy({ top: -100, left: 0, behavior: "smooth" });
                    }, 600);
                }
            });
        }

        document.addEventListener('click', function(e) {
            const produtoClicado = e.target.closest('.produto');
            if (produtoClicado) abrirModalProduto(produtoClicado);
        });

        document.querySelector('span.close').addEventListener('click', fecharModal);
        window.addEventListener('click', function(e) {
            if (e.target === document.getElementById('produtoModal')) fecharModal();
        });

        // ===============================================
        // FUNÇÕES DO MODAL
        // ===============================================
        function abrirModalProduto(produtoClicado) {
            // Resetar campo de observações
            document.getElementById('observacoes').value = '';
            
            // Restante do código existente...
            precoBase = parseFloat(produtoClicado.querySelector('.produto-preco').textContent.replace('R$ ', ''));
            preencherDadosModal(produtoClicado);
            carregarAdicionais(produtoClicado.dataset.adicionais);
            carregarOpcoes(produtoClicado.dataset.opcao);
            document.getElementById('produtoModal').style.display = 'block';
        }

        async function preencherDadosModal(produtoClicado) {
    const titulo = produtoClicado.querySelector('.produto-titulo')?.textContent;
    const descricao = produtoClicado.querySelector('.produto-descricao')?.textContent;
    
    document.getElementById('modalTitulo').textContent = titulo;
    document.getElementById('modalDescricao').textContent = descricao;
    document.getElementById('modalPreco').textContent = `R$ ${precoBase.toFixed(2)}`;
    document.getElementById('modalImage').src = produtoClicado.querySelector('.produto-imagem')?.src;
    
    // Seção de ingredientes
    const ingredientesContainer = document.getElementById('modalIngredientes');
    ingredientesContainer.innerHTML = '';
    
    const estoqueStr = produtoClicado.dataset.estoque;
    
    if (estoqueStr) {
        ingredientesContainer.innerHTML = '<h4>Ingredientes:</h4><p>Carregando...</p>';
        
        try {
        const response = await fetch(`buscar_ingredientes.php?estoque=${encodeURIComponent(estoqueStr)}`);
        let data = await response.json();
        
        // Verifica se veio como array direto (caso não possa modificar o PHP)
        if (Array.isArray(data)) {
            data = { success: true, data: data };
        }
        
        let html = '<h4>Ingredientes:</h4><ul>';
        
        if (data.success && data.data && data.data.length > 0) {
            data.data.forEach(item => {
                html += `<li>${item.nome} (${item.quantidade}x)</li>`;
            });
        } else {
            html += '<li>Nenhum ingrediente encontrado</li>';
        }
        
        ingredientesContainer.innerHTML = html + '</ul>';
        
    } catch (error) {
        ingredientesContainer.innerHTML = `
            <h4>Ingredientes:</h4>
            <div class="error">Erro ao carregar</div>
        `;
    }

    }
}

        function carregarAdicionais(idsAdicionais) {
            const listaAdicionais = document.getElementById('listaAdicionais');
            listaAdicionais.innerHTML = '';
            document.getElementById('adicionaisContainer').style.display = 'none';

            if (idsAdicionais && idsAdicionais.trim()) {
                fetch(`http://localhost/Site_do_Client/busca_adicionais.php?ids_adicionais=${encodeURIComponent(idsAdicionais)}`)
                    .then(response => response.json())
                    .then(adicionais => {
                        if (adicionais.length > 0) {
                            adicionais.forEach(adicional => {criarItemAdicional(adicional, listaAdicionais);});
                            document.getElementById('adicionaisContainer').style.display = 'block';
                        }
                    })
                    .catch(error => console.error('Erro ao carregar adicionais:', error));
            }
        }

        function carregarOpcoes(opcoesStr) {
            const opcoesContainer = document.getElementById('opcoesContainer');
            const listaOpcoes = document.getElementById('listaOpcoes');
            opcoesContainer.style.display = 'none';
            listaOpcoes.innerHTML = '';

            if (opcoesStr && opcoesStr.trim()) {
                const gruposOpcoes = processarOpcoesComPreco(opcoesStr);
                gruposOpcoes.forEach((grupo, index) => {criarGrupoOpcoes(grupo, index, listaOpcoes);});
                opcoesContainer.style.display = 'block';
            }
        }

        function fecharModal() {
            document.getElementById('produtoModal').style.display = 'none';
        }

        // ===============================================
        // FUNÇÕES DE CONTROLE DE QUANTIDADE
        // ===============================================
        function alterarQuantidade(btn, delta) {
            const controle = btn.parentElement;
            const numero = controle.querySelector('.quantidade-numero');
            const btnMenos = controle.querySelector('.btn-menos');
            const btnMais = controle.querySelector('.btn-mais');
            let quantidade = parseInt(numero.textContent);
            const max = parseInt(btn.dataset.max);
            
            quantidade = Math.max(0, Math.min((max === 0 ? Infinity : max), quantidade + delta));
            
            numero.textContent = quantidade;
            btnMenos.disabled = quantidade === 0;
            btnMais.disabled = max !== 0 && quantidade >= max;
            
            atualizarPrecoTotal();
        }

        // ===============================================
        // FUNÇÕES DE PROCESSAMENTO DE DADOS
        // ===============================================
        function processarOpcoesComPreco(opcoesStr) {
            const grupos = opcoesStr.split(';').map(g => g.trim());
            const opcoesComPreco = [];

            grupos.forEach(grupo => {
                const opcoes = grupo.split(',').map(o => {
                    const [nome, preco] = o.trim().split('+');
                    return {
                        nome: nome.trim(),
                        preco: preco ? parseFloat(preco) : 0
                    };
                });
                opcoesComPreco.push(opcoes);
            });

            return opcoesComPreco;
        }

        function atualizarPrecoTotal() {
            totalAdicionais = Array.from(document.querySelectorAll('.adicional-item'))
                .reduce((total, item) => {
                    const qtd = parseInt(item.querySelector('.quantidade-numero').textContent);
                    const preco = parseFloat(item.querySelector('.btn-mais').dataset.preco);
                    return total + (qtd * preco);
                }, 0);

            const totalOpcoes = Array.from(document.querySelectorAll('[name^="opcao-group"]:checked'))
                .reduce((total, radio) => total + parseFloat(radio.dataset.preco), 0);

            const precoTotal = precoBase + totalAdicionais + totalOpcoes;
            document.getElementById('modalPreco').textContent = `R$ ${precoTotal.toFixed(2)}`;
        }

        // ===============================================
        // FUNÇÕES DE CRIAÇÃO DE ELEMENTOS (ADICIONAIS)
        // ===============================================
        function criarItemAdicional(adicional, listaAdicionais) {
            const div = document.createElement('div');
            div.className = 'adicional-item';
            
            const preco = parseFloat(adicional.preco).toFixed(2);
            const maxQuantidade = parseInt(adicional.quantidade) || 0;

            div.innerHTML = `
                <div class="adicional-info">
                    <span class="adicional-nome">${adicional.nome}</span>
                    <span class="adicional-preco">+ R$ ${preco}</span>
                </div>
                <div class="quantidade-controle">
                    <button class="quantidade-btn btn-menos" 
                            data-preco="${preco}" 
                            data-max="${maxQuantidade}"
                            onclick="alterarQuantidade(this, -1)">
                        -
                    </button>
                    <span class="quantidade-numero">0</span>
                    <button class="quantidade-btn btn-mais" 
                            data-preco="${preco}" 
                            data-max="${maxQuantidade}"
                            onclick="alterarQuantidade(this, 1)">
                        +
                    </button>
                </div>
            `;
            listaAdicionais.appendChild(div);
        }

        // ===============================================
        // FUNÇÕES DE CRIAÇÃO DE ELEMENTOS (OPÇÕES)
        // ===============================================
        function criarGrupoOpcoes(grupo, index, listaOpcoes) {
            const grupoDiv = document.createElement('div');
            grupoDiv.className = 'opcao-grupo';
            grupoDiv.innerHTML = `<h5>Escolha ${index + 1}:</h5>`;

            grupo.forEach((opcao) => {
                const label = document.createElement('label');
                label.innerHTML = `
                    <input type="radio" 
                          name="opcao-group-${index}" 
                          value="${opcao.nome}" 
                          data-preco="${opcao.preco}"
                          onchange="atualizarPrecoTotal()">
                    ${opcao.nome}${opcao.preco > 0 ? ` (+ R$ ${opcao.preco.toFixed(2)})` : ''}
                `;
                grupoDiv.appendChild(label);
            });

            listaOpcoes.appendChild(grupoDiv);
        }

        // ===============================================
        // FUNÇÕES DO CARRINHO
        // ===============================================
        function adicionarAoCarrinho() {
            const gruposInvalidos = validarOpcoes();
            const erroElemento = document.getElementById('erroOpcoes');
            
            // Resetar mensagem de erro
            erroElemento.textContent = '';
            erroElemento.style.display = 'none';

            if (gruposInvalidos.length > 0) {
                erroElemento.innerHTML = `
                    ❌ Selecione: ${gruposInvalidos.join(', ').replace('Escolha ', 'Escolha ')}
                `;
                erroElemento.style.display = 'block';
                return;
            }
            const item = {
                titulo: document.getElementById('modalTitulo').textContent,
                descricao: document.getElementById('modalDescricao').textContent,
                precoBase: precoBase,
                imagem: document.getElementById('modalImage').src,
                observacoes: document.getElementById('observacoes').value,
                adicionais: coletarAdicionais(),
                opcoes: coletarOpcoes(),
                precoTotal: parseFloat(document.getElementById('modalPreco').textContent.replace('R$ ', ''))
            };

            carrinho.push(item);
            atualizarSacola();
            fecharModal();
        }

        function coletarAdicionais() {
            return Array.from(document.querySelectorAll('.adicional-item'))
                .filter(item => parseInt(item.querySelector('.quantidade-numero').textContent) > 0)
                .map(item => ({
                    nome: item.querySelector('.adicional-nome').textContent,
                    quantidade: parseInt(item.querySelector('.quantidade-numero').textContent),
                    preco: parseFloat(item.querySelector('.adicional-preco').textContent.replace('+ R$ ', ''))
                }));
        }

        function coletarOpcoes() {
            return Array.from(document.querySelectorAll('[name^="opcao-group-"]:checked'))
                .map(opcao => {
                    const grupoNumero = parseInt(opcao.name.match(/\d+/)[0]);
                    return {
                        grupo: `Escolha ${grupoNumero}`,
                        opcao: opcao.value,
                        preco: parseFloat(opcao.dataset.preco)
                    };
                });
        }

        // ===============================================
        // SHOPPING CART FUNCTIONS
        // ===============================================
        function atualizarSacola() {
            const container = document.getElementById('sacolaContainer');
            const footer = document.getElementById('sacolaFooter');
            container.innerHTML = '';

            if (carrinho.length > 0) {
                footer.classList.add('visible');
                carrinho.forEach((item, index) => {
                    container.appendChild(criarItemSacola(item, index));
                });
            } else {
                footer.classList.remove('visible');
            }
            atualizarTotalSacola();
        }

        function criarItemSacola(item, index) {
            const div = document.createElement('div');
            div.className = 'item-sacola';
            div.innerHTML = `
                <img src="${item.imagem}" alt="${item.titulo}">
                <div class="item-sacola-info">
                    <div class="item-sacola-titulo">${item.titulo}</div>
                    <div class="item-sacola-preco">R$ ${item.precoTotal.toFixed(2)}</div>
                </div>
                ${gerarDetalhesSacola(item)}
            `;
            return div;
        }

        function gerarDetalhesSacola(item) {
            let detalhes = '<div class="detalhes-pedido">';

            // Adicionais
            if (item.adicionais?.length > 0) {
                detalhes += `<p><strong>Adicionais:</strong></p>`;
                detalhes += item.adicionais.map(adicional => 
                    `✓ ${adicional.nome} (${adicional.quantidade}x) + R$ ${adicional.preco.toFixed(2)}`
                ).join('<br>');
            }

            // Opções
            if (item.opcoes?.length > 0) {
                detalhes += `<p class="detalhes-titulo"><strong>Opções escolhidas:</strong></p>`;
                detalhes += item.opcoes.map(opcao => {
                    const numeroEscolha = parseInt(opcao.grupo.match(/\d+/)) + 1;
                    return `↳ Escolha ${numeroEscolha}: ${opcao.opcao}${opcao.preco > 0 ? ` (+ R$ ${opcao.preco.toFixed(2)})` : ''}`;
                }).join('<br>');
            }

            // Observações
            if (item.observacoes?.trim()) {
                detalhes += `<p class="detalhes-titulo"><strong>Observações:</strong></p>`;
                detalhes += `📝 ${item.observacoes}`;
            }

            detalhes += '</div>';
            return detalhes;
        }

        function validarOpcoes() {
            const grupos = document.querySelectorAll('[name^="opcao-group-"]');
            const gruposNaoSelecionados = [];
            
            // Criar array com números dos grupos convertidos para 1-based
            const gruposUnicos = [...new Set([...grupos].map(input => {
                const numeroGrupo = parseInt(input.name.match(/\d+/)[0]) + 1;
                return `Escolha ${numeroGrupo}`;
            }))];
            
            // Verificar seleção em cada grupo
            const gruposIds = [...new Set([...grupos].map(input => input.name))];
            for (const grupoId of gruposIds) {
                const selecionado = document.querySelector(`[name="${grupoId}"]:checked`);
                if (!selecionado) {
                    const numeroGrupo = parseInt(grupoId.match(/\d+/)[0]) + 1;
                    gruposNaoSelecionados.push(`Escolha ${numeroGrupo}`);
                }
            }

            return gruposNaoSelecionados;
        }

        // ===============================================
        // INICIALIZAÇÃO
        // ===============================================
        document.addEventListener('DOMContentLoaded', () => {
            verificarStatusLoja();
            carregarConjuntos();
        });

        // ===============================================
        // FUNÇÕES DE FILTRO
        // ===============================================
        function filtrarProdutos() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let produtos = document.querySelectorAll(".produto-item");

            produtos.forEach(produto => {
                let titulo = produto.querySelector(".produto-titulo").innerText.toLowerCase();
                let descricao = produto.querySelector(".produto-descricao").innerText.toLowerCase();
                produto.style.display = (titulo.includes(input) || descricao.includes(input)) ? "flex" : "none";
            });
        }

        // ===============================================
        // FUNÇÕES DO CARRINHO
        // ===============================================
        function criarItemSacola(item, index) {
            const div = document.createElement('div');
            div.className = 'item-sacola';
            div.innerHTML = `
                <button class="btn-remover" onclick="removerDaSacola(${index})">×</button>
                <img src="${item.imagem}" alt="${item.titulo}">
                <div class="item-sacola-info">
                    <div class="item-sacola-titulo">${item.titulo}</div>
                    <div class="item-sacola-preco">R$ ${item.precoTotal.toFixed(2)}</div>
                </div>
                <div class="item-sacola-detalhes">
                    ${gerarDetalhesSacola(item)}
                </div>
            `;
            return div;
        }

        function removerDaSacola(index) {
            carrinho.splice(index, 1);
            atualizarSacola();
        }

        function atualizarTotalSacola() {
            const total = carrinho.reduce((acc, item) => acc + item.precoTotal, 0);
            document.getElementById('totalSacola').textContent = total.toFixed(2);
        }

        function atualizarSacola() {
            const container = document.getElementById('sacolaContainer');
            container.innerHTML = '';
            carrinho.forEach((item, index) => container.appendChild(criarItemSacola(item, index)));
            atualizarTotalSacola();
        }

        // ===============================================
        // FUNÇÕES DE FINALIZAÇÃO
        // ===============================================
        function finalizarCompra() {
            if (carrinho.length === 0) {
                alert('Sua sacola está vazia!');
                return;
            }
            
            // Sempre recalcular o subtotal ao abrir o modal
            subtotal = carrinho.reduce((acc, item) => acc + item.precoTotal, 0);
            document.getElementById('subtotal').textContent = subtotal.toFixed(2);
            
            // Resetar taxa de entrega
            taxaEntrega = 0;
            document.getElementById('taxaEntrega').textContent = '0,00';
            document.getElementById('totalFinal').textContent = subtotal.toFixed(2);
            
            // Abrir modal
            document.getElementById('modalFinalizacao').style.display = 'block';
        }

        async function calcularTaxaEntrega() {
            // Desabilita o botão durante o processamento
            const btn = document.querySelector('[onclick="calcularTaxaEntrega()"]');
            btn.disabled = true;
            btn.textContent = 'Calculando...'

            const endereco = document.getElementById('enderecoCliente').value;
            
            if (!endereco) {
                alert('Por favor insira seu endereço primeiro');
                btn.disabled = false;
                btn.textContent = 'Calcular Taxa de Entrega';
                return;
            }

            try {
                const response = await fetch('http://localhost/Site_do_Client/calcular_taxa.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ endereco })
                });

                const data = await response.json();
                
                if (data.erro) {
                    // Substitui o botão por uma mensagem
                    btn.outerHTML = `
                        <div class="erro-taxa" style="padding: 10px; background: #ffebee; border-radius: 5px; color: #c62828;">
                            Infelizmente estamos tendo problemas em calcular sua taxa de entrega.
                            Por favor, verifique isso com nosso atendente no WhatsApp após finalizar o pedido.
                        </div>
                    `;
                    return;
                }

                // Corrigido: Sempre sobrescreve o valor da taxa
                taxaEntrega = parseFloat(data.taxa);
                const total = subtotal + taxaEntrega;

                document.getElementById('taxaEntrega').textContent = taxaEntrega.toFixed(2);
                document.getElementById('totalFinal').textContent = total.toFixed(2);

                btn.disabled = false;
                btn.textContent = 'Calcular Taxa de Entrega';

            } catch (error) {
                console.error('Erro:', error);
                // Substitui o botão por uma mensagem
                btn.outerHTML = `
                    <div class="erro-taxa" style="padding: 10px; background: #ffebee; border-radius: 5px; color: #c62828;">
                        Infelizmente estamos tendo problemas em calcular sua taxa de entrega.
                        Por favor, verifique isso com nosso atendente no WhatsApp após finalizar o pedido.
                    </div>
                `;
            }
        }

        function fecharModalFinalizacao() {
            // Resetar todas as variáveis relacionadas
            taxaEntrega = 0;
            subtotal = 0;
            
            // Limpar campos do formulário
            document.getElementById('formEntrega').reset();
            
            // Atualizar exibição
            document.getElementById('subtotal').textContent = '0,00';
            document.getElementById('taxaEntrega').textContent = '0,00';
            document.getElementById('totalFinal').textContent = '0,00';
            
            // Fechar modal
            document.getElementById('modalFinalizacao').style.display = 'none';
        }

        // Função confirmarPedido() modificada
        async function confirmarPedido() {
            const nome = document.getElementById('nomeCliente').value;
            const endereco = document.getElementById('enderecoCliente').value;
            
            if (!nome || !endereco || taxaEntrega === null) {
                alert('Preencha todos os campos obrigatórios');
                return;
            }

            const pedido = {
                cliente: nome,
                endereco,
            
                itens: carrinho,
                subtotal,
                taxa_entrega: taxaEntrega,
                total: subtotal + taxaEntrega
            };

            const loading = document.querySelector('.whatsapp-loading');
            loading.style.display = 'flex';

            try {
                await gerarComprovante(pedido);
                loading.style.display = 'none';
                carrinho = [];
                atualizarSacola();
                fecharModalFinalizacao();
            } catch (error) {
                loading.style.display = 'none';
                console.error('Erro:', error);
                alert('Erro ao gerar comprovante');
            }
        }

        async function gerarComprovante(pedido) {
            const comprovante = document.getElementById('comprovantePedido');
            
            // Preencher dados
            document.getElementById('compNome').textContent = pedido.cliente;
            document.getElementById('compBairro').textContent = pedido.endereco;
            document.getElementById('compTotal').textContent = pedido.total.toFixed(2);

            // Itens do pedido
            const container = document.getElementById('comprovanteItens');
            container.innerHTML = '';
            
            pedido.itens.forEach(item => {
                const div = document.createElement('div');
                div.className = 'comprovante-item';
                div.innerHTML = `
                    <div class="item-titulo"><strong>${item.titulo}</strong> - R$ ${item.precoTotal.toFixed(2)}</div>
                    ${item.observacoes ? `<div class="item-observacoes">📝 ${item.observacoes}</div>` : ''}
                    ${gerarDetalhesComprovante(item)}
                `;
                container.appendChild(div);
            });

            // Mostrar o comprovante
            comprovante.style.display = 'block';
            try {
        // 1. Construir mensagem completa em texto
        const mensagem = criarMensagemTexto(pedido);

        // 2. Gerar link do WhatsApp otimizado
        const numeroFormatado = WHATSAPP_NUMBER.replace(/\D/g, '');
        const whatsappUrl = `https://wa.me/${numeroFormatado}?text=${encodeURIComponent(mensagem)}`;

        // 3. Abrir WhatsApp diretamente na conversa
        const janelaWhatsApp = window.open(whatsappUrl, '_blank');
        
        // 4. Forçar foco na janela (funciona na maioria dos navegadores)
        setTimeout(() => {
            if(janelaWhatsApp) {
                janelaWhatsApp.focus();
                janelaWhatsApp.postMessage('focus', '*');
            }
        }, 500);

        // 5. Gerar e exibir imagem com instruções
        const canvas = await html2canvas(comprovante);
        const imgData = canvas.toDataURL('image/png');
        
     
        // 7. Fechar modais e limpar carrinho
        comprovante.style.display = 'none';
        carrinho = [];
        atualizarSacola();
        fecharModalFinalizacao();

    } catch (error) {
        console.error('Erro:', error);
        alert('Pedido enviado! Verifique o WhatsApp.');
    }
}


// Função auxiliar para criar mensagem de texto
// Função auxiliar para criar mensagem de texto
function criarMensagemTexto(pedido) {
    let msg = `*PEDIDO KATATALL LANCHES* 🍔\n`;
    msg += `Nome: ${pedido.cliente}\n`;
    msg += `Bairro: ${pedido.endereco}\n`;
    msg += `*DETALHES DO PEDIDO:*\n`;

    pedido.itens.forEach((item, index) => {
        msg += `\n${index + 1}. *${item.titulo}* - R$ ${item.precoTotal.toFixed(2)}\n`;
        
        // Adicionais
        if (item.adicionais.length > 0) {
            msg += `     Adicionais:\n`;
            item.adicionais.forEach(adicional => {
                msg += `      ▸ ${adicional.quantidade}x ${adicional.nome} (+ R$ ${adicional.preco.toFixed(2)})\n`;
            });
        }
        
        // Opções
        if (item.opcoes.length > 0) {
            msg += `     Opções:\n`;
            item.opcoes.forEach((opcao, index) => {
                const grupoNumerado = opcao.grupo.replace(/\d+$/, index + 1);
                msg += `      ▸ ${grupoNumerado}: ${opcao.opcao}${opcao.preco > 0 ? ` (+ R$ ${opcao.preco.toFixed(2)})` : ''}\n`;
            });
        }
        
        // Observações
        if (item.observacoes) {
            msg += `     Observações: ${item.observacoes}\n`;
        }
    });

    // Verifica se há erro na taxa de entrega
    const erroTaxa = document.querySelector('.erro-taxa');
    if (erroTaxa) {
        msg += `\n*OBSERVAÇÃO:* Taxa de entrega pendente de confirmação - verifique com o atendente\n`;
    }

    msg += `\n *VALOR TOTAL: R$ ${pedido.total.toFixed(2)}*`;
    return msg;
}


// Função para copiar texto
function copiarTextoPedido() {
    const mensagem = document.querySelector('.preview-container textarea').value;
    navigator.clipboard.writeText(mensagem)
        .then(() => alert('Texto copiado! Cole no WhatsApp.'))
        .catch(() => alert('Não foi possível copiar automaticamente. Selecione e copie manualmente.'));
}

        function gerarDetalhesComprovante(item) {
            let detalhes = '';
            
            if (item.adicionais.length > 0) {
                detalhes += '<div class="item-adicionais">';
                detalhes += item.adicionais.map(adicional => 
                    `<div class="adicional-comprovante">+ ${adicional.nome} (${adicional.quantidade}x) + R$ ${adicional.preco.toFixed(2)}</div>`
                ).join('');
                detalhes += '</div>';
            }

            if (item.opcoes.length > 0) {
                detalhes += '<div class="item-opcoes">';
                detalhes += item.opcoes.map(opcao => 
                    `<div class="opcao-comprovante">⮞ ${opcao.grupo}: ${opcao.opcao} ${opcao.preco > 0 ? `(+ R$ ${opcao.preco.toFixed(2)})` : ''}</div>`
                ).join('');
                detalhes += '</div>';
            }

            return detalhes;
        }
        
        
        </script>

    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
</body>
</html>
