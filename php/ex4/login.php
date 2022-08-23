<?php
define("USERNAME_FILE", "email.txt");
define("PASSWORD_FILE", "senhaHash.txt");

function salvaString($string, $arquivo)
{
    $arq = fopen($arquivo, "w");
    fwrite($arq, $string);
    fclose($arq);
}
function carregaString($arquivo)
{
    $arq = fopen($arquivo, "r");
    $string = fgets($arq);
    fclose($arq);
    return $string;
}

$username = $_POST["username"];
$password = $_POST["password"];
$senhaHash = password_hash($password, PASSWORD_DEFAULT);

salvaString($username, USERNAME_FILE);
salvaString($senhaHash, PASSWORD_FILE);

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
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $username = htmlspecialchars(carregaString(USERNAME_FILE));
                $password = htmlspecialchars(carregaString(PASSWORD_FILE));

                echo <<<HTML
                    <tr>
                    <td>$username</td>
                    <td>$password</td>
                    </tr>
                HTML;
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>