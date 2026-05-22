<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: ../index.php");
    exit();
}

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>Bem-vindo ao sistema!</h1>
    <p>Você está logado como: <?php echo $_SESSION["usuario"]; ?></p>
    <button><a href="logout.php">Sair</a></button>
</body>
</html>