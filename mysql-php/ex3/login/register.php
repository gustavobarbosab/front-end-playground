<?php
require "../../conexaoMysql.php";
$pdo = mysqlConnect();

$username = $_POST["username"];
$password = $_POST["password"];
$senhaHash = password_hash($password, PASSWORD_DEFAULT);

$sqlToInsertData = <<<SQL
  INSERT INTO user (username, password_hash)
  VALUES (:username, :password_hash)
SQL;

try {
  $pdo->beginTransaction();
  $statementToInsert = $pdo->prepare($sqlToInsertData);

  if (!$statementToInsert->execute([$username, $senhaHash])) {
    throw new Exception('Insertion error, please check your data or database');
  }
  $pdo->commit();
  header("Location: http://".$_SERVER['HTTP_HOST']."/");
  exit();
} catch (Exception $ex) {
  $pdo->rollBack();
  exit("We cannot register this data, please check the database or your data");
}
?>
