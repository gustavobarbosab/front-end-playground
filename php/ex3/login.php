<?php
function salvaString($string, $arquivo)
{
    $arq = fopen($arquivo, "w");
    fwrite($arq, $string);
    fclose($arq);
}

$username = $_POST["username"];
$password = $_POST["password"];
$senhaHash = password_hash($password, PASSWORD_DEFAULT);

salvaString($username, "email.txt");
salvaString($senhaHash, "senhaHash.txt");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro efetuado com sucesso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <h1>Cadastro efetuado com sucesso!</h1>
</body>
</html>