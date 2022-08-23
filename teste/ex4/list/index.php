<?php
require "../../conexaoMysql.php";
$pdo = mysqlConnect();

$sql = <<<SQL
    SELECT *
    FROM person INNER JOIN patient ON person.id = id_person
SQL;

try {
    $statementToRead = $pdo->query($sql);
} catch (Exception $ex) {
    exit("We cannot register this data, please check the database or your data");
}
?>

<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pacientes</title>

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
                <th>Nome</th>
                <th>Sexo</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>CEP</th>
                <th>Logradouro</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>Peso</th>
                <th>Altura</th>
                <th>Sangue</th>
            </tr>

            <?php
            while ($row = $statementToRead->fetch()) {
                $name = htmlspecialchars($row['name']);
                $gender = htmlspecialchars($row['gender']);
                $email = htmlspecialchars($row['email']);
                $phone = htmlspecialchars($row['phone']);
                $cep = htmlspecialchars($row['cep']);
                $street = htmlspecialchars($row['street']);
                $city = htmlspecialchars($row['city']);
                $state = htmlspecialchars($row['state']);
                $weight = htmlspecialchars($row['weight']);
                $height = htmlspecialchars($row['height']);
                $blood = htmlspecialchars($row['blood']);

                echo <<<HTML
                <tr>
                    <td>$name</td>
                    <td>$gender</td>
                    <td>$email</td>
                    <td>$phone</td>
                    <td>$cep</td>
                    <td>$street</td>
                    <td>$city</td>
                    <td>$state</td>
                    <td>$weight</td>
                    <td>$height</td>
                    <td>$blood</td>
                </tr>      
                HTML;
            }
            ?>

        </table>

        <h2><a href="../index.html">Voltar</a></h2>
    </div>

</body>

</html>