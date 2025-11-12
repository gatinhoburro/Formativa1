<?php
session_start();
if (isset($_POST["numero"])) {
    if (!isset($_SESSION["tentativas"])) {
        $_SESSION["tentativas"] = 0;
    }
    $tentativas = $_SESSION["tentativas"]++;
    echo "<strong>{$_SESSION["tentativas"]} tentativas</strong>";
}
?>
<?php
// para reiniciar o jogo
if (isset($_POST["reiniciar"])) {
    unset($_SESSION["numeroAleatorio"]);
    unset($_SESSION["tentativas"]);
    $_SESSION["numeroAleatorio"] = rand(1, 100);
}
if (!isset($_SESSION["numeroAleatorio"])) {
    $_SESSION["numeroAleatorio"] = rand(1, 100);
}
//armazenando os numeros em variaveis
$numeroAleatorio = $_SESSION["numeroAleatorio"];
// armazenar o numero mas se não tiver deixar 0 padrão
$numeroUsuario = $_POST["numero"] ?? 0;
if ($numeroUsuario == $numeroAleatorio) {
    echo "<p>Acertou!</p>";
}
// if e else simples para mostrar a mensagem
if ($numeroUsuario < $numeroAleatorio) {
    echo "<p>o numero é Maior que $numeroUsuario</p>";
} elseif ($numeroUsuario > $numeroAleatorio) {
    echo "<p>o numero é Menor que $numeroUsuario</p>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href=./icon/favicon.ico" type="image/x-icon">
    <title>Jogo de adivinhação</title>
</head>

<body>
    <main>
        <p>Adivinhe o numero que estou pensando entre 1...100</p>
        <p id="tentativas"></p>
        <form action="index.php" method="post">
            <label for="numero">Numero:</label>
            <input type="number" name="numero">
            <input type="submit" value="Enviar">
        </form>
        <form method="post">
            <button type="submit" name="reiniciar">Reiniciar</button>
        </form>
    </main>
</body>

</html>