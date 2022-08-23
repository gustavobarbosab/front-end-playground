<?php
require "../../conexaoMysql.php";
$pdo = mysqlConnect();

$sqlToReadData = <<<SQL
  SELECT username, password_hash
  FROM user
SQL;

try {
    $statementToRead = $pdo->query($sqlToReadData);
} catch (Exception $ex) {
    exit("We cannot register this data, please check the database or your data");
}
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Usuários</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-CuOF+2SnTUfTwSZjCXf01h7uYhfOBuxIhGKPbfEJ3+FqH/s6cIFN9bGr1HmAg4fQ" crossorigin="anonymous">

    <style>
        body {
            padding-top: 2rem;
        }
    </style>
</head>

<body>

    <div class="container">
        <h3>Usuários</h3>
        <table class="table table-striped table-hover">
            <tr>
                <th>Username</th>
                <th>Password Hash</th>
            </tr>

            <?php
            while ($row = $statementToRead->fetch()) {
                $username = htmlspecialchars($row['username']);
                $passwordHash = htmlspecialchars($row['password_hash']);

                echo <<<HTML
                <tr>
                    <td>$username</td>
                    <td>$passwordHash</td>
                </tr>      
                HTML;
            }
            ?>

        </table>

        <h2><a href="../index.html">Voltar</a></h2>
    </div>

</body>

</html>