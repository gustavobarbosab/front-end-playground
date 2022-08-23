<?php
require "../../conexaoMysql.php";
$pdo = mysqlConnect();

$name = $_POST["name"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$cep = $_POST["cep"];
$street = $_POST["street"];
$city = $_POST["city"];
$state = $_POST["state"];
$weight = $_POST["weight"];
$height = $_POST["height"];
$blood = $_POST["blood"];

$senhaHash = password_hash($password, PASSWORD_DEFAULT);

$sqlToPerson = <<<SQL
  INSERT INTO person (name, gender, email, phone, cep, street, city, state)
  VALUES (:name, :gender, :email, :phone, :cep, :street, :city, :state)
SQL;

$sqlToPatient = <<<SQL
  INSERT INTO patient (weight, height, blood, id_person)
  VALUES (:weight, :height, :blood, :id_person)
SQL;

try {
  $pdo->beginTransaction();

  $stmtPerson = $pdo->prepare($sqlToPerson);
  if (!$stmtPerson->execute([$name, $gender, $email, $phone, $cep, $street, $city, $state])) {
    throw new Exception('Insertion error, please check your data or database');
  }

  $personId = $pdo->lastInsertId();
  $stmtPatient = $pdo->prepare($sqlToPatient);
  if (!$stmtPatient->execute([$weight, $height, $blood, $personId])) {
    throw new Exception('Insertion error, please check your data or database');
  }

  $pdo->commit();
  header("Location: http://" . $_SERVER['HTTP_HOST'] . "/trabalho7/ex4");
  exit();
} catch (Exception $ex) {
  $pdo->rollBack();
  exit($ex);
}
