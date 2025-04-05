<?php
$host = "localhost";
$banco = "estoquedb";
$usuario = "root";
$senha = "";

try {
    $conn = new PDO(
        "mysql:host=$host;dbname=$banco;charset=utf8",
        $usuario,
        $senha,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    die(json_encode(['error' => 'Erro de conexão: ' . $e->getMessage()]));
}