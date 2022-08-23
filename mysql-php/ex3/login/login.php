<?php
require "../../conexaoMysql.php";
$pdo = mysqlConnect();

$username = $_POST["username"];
$password = $_POST["password"];

$sqlToReadData = <<<SQL
  SELECT password_hash 
  FROM user 
  WHERE username = ?
SQL;

try {
    $stmt = $pdo->prepare($sqlToReadData);
    $stmt->execute([$username]);
    $row = $stmt->fetch();

    $isThePasswordValid = password_verify($password, $row['password_hash']);

    if ($isThePasswordValid) {
        header("Location: success.html");
    } else {
        header("Location: index.html");
    }
} catch (Exception $e) {
    exit('Falha inesperada: ' . $e->getMessage());
}
