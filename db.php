<?php
require_once __DIR__ . '/config.php';

$dsn = "pgsql:host=".DB_HOST.";port=".DB_PORT.";dbname=".DB_NAME;
// echo $dsn;
try {
    
    $pdo = new PDO ($dsn, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ]);
    
    echo "Conexão sucessada!";
} catch (PDOException $e) {
        http_response_code(500);
        echo "Conexão no banco de dados falhou!";
        exit;
    };
?>