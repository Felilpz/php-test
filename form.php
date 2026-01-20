<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Olá, <?php echo $_POST["nome"]; ?></p>
    <p>Seu endereço de email é: <?php echo $_POST["email"]; ?></p>
</body>
</html> -->

<?php
    $appName = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $connStr = "host=localhost port 5432 dbname=phpteste options='--application_name=$appName'";

    $conn= pg_connect ($connStr);
    $result = pg_query ($conn, "select * from dados;");
    var_dump(pg_fetch_all($result))
?>