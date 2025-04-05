<?php
// login_admin.php
session_start();
header('Content-Type: application/json');

include 'conexao.php'; // Arquivo com a conexão PDO

try {
    // Verifica se os dados foram enviados via POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception("Método não permitido", 405);
    }

    $dados = json_decode(file_get_contents('php://input'), true);
    
    // Validação do input
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("JSON inválido", 400);
    }
    
    if (empty($dados['senha'])) {
        throw new Exception("Senha não fornecida", 400);
    }

    // Buscar hash seguro do banco usando prepared statement
    $stmt = $conn->prepare("SELECT senha_hash FROM admin WHERE id = 1");
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && password_verify($dados['senha'], $admin['senha_hash'])) {
        $_SESSION['autenticado'] = true;
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR']; // Adiciona proteção por IP
        $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT']; // Proteção por User-Agent
        session_regenerate_id(true); // Previne fixation attacks
        
        echo json_encode(['success' => true]);
    } else {
        throw new Exception("Credenciais inválidas", 401);
    }

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro no banco de dados']);
} catch (Exception $e) {
    http_response_code($e->getCode());
    echo json_encode(['error' => $e->getMessage()]);
}