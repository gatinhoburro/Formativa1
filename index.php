<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <p>Adivinhe o numero que estou pensando entre 1...100</p>
    <form action="index.php" method="post">
        <label for="numero">Numero:</label>
        <input type="number" name="numero" id="numero">
        <input type="submit" value="enviarTentativa">
    </form>
</body>

</html>
<?php
    $numeroAleatorio = rand(1, 100);
    $numeroUsuario = $_POST["numero"];
    echo "{$numeroAleatorio}<br>";
    if ($numeroUsuario == $numeroAleatorio) {
        echo "Acertou";
    } 
    else {
        echo "Errou";
    }
?>