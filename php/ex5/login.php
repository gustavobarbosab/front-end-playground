<?php
define("USERNAME_FILE", "../ex4/email.txt");
define("PASSWORD_FILE", "../ex4/senhaHash.txt");

function carregaString($arquivo)
{
    $arq = fopen($arquivo, "r");
    $string = fgets($arq);
    fclose($arq);
    return $string;
}

$username = $_POST["username"];
$password = $_POST["password"];

$usernameSaved = carregaString(USERNAME_FILE);
$passwordSavedHash = carregaString(PASSWORD_FILE);

$isThePasswordValid = password_verify($password, $passwordSavedHash);

if ($isThePasswordValid && $usernameSaved == $username) {
    header("Location: success.html");
} else {
    header("Location: index.html");
}

exit();
