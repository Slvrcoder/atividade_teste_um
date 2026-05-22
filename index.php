
<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "root";
$db = "sistema_simples";
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexão falhou: ");
}
else {
    echo ("<p> BD: ok </p>");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuario
    WHERE usuario = '$usuario'
    AND senha = '$senha'";

    $resultado = $conn->query($sql);

    if ($resultado-> num_rows > 0) {
        $_SESSION["usuario"] = $usuario;

        header("Location: public/home.php");
        exit();
    }
    else {
        $erro= "Usuário ou senha inválidos.";
    }

}


?>











<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login com PHP</title>
</head>
<body>
    <H2>Login com PHP</H2>

    <form method="POST">

        <?php if (isset($erro)) { echo "<p>$erro</p>"; } ?>
        
        <label for="usuario">Usuário:</label>
        <input type="text" id="usuario" name="usuario">
        <br>
        <br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha">
        <br>
        <br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>