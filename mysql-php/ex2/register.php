<?php

require "../conexaoMysql.php";
$pdo = mysqlConnect();

$cep =  $_POST["cep"] ?? "";
$street = $_POST["street"] ?? "";
$district = $_POST["district"] ?? "";
$city = $_POST["city"] ?? "";
$state = $_POST["state"] ?? "";

$sqlToInsertData = <<<SQL
  INSERT INTO location (cep, street, district, city, state)
  VALUES (:cep, :street, :district, :city, :state)
SQL;

try {
  $pdo->beginTransaction();
  $statementToInsert = $pdo->prepare($sqlToInsertData);

  if (!$statementToInsert->execute([$cep, $street, $district, $city, $state])) {
    throw new Exception('Insertion error, please check your data or database');
  }

  $pdo->commit();
  header("location: list-locations.php");
  exit();
} catch (Exception $ex) {
  $pdo->rollBack();
  exit("We cannot register this data, please check the database or your data");
}
?>