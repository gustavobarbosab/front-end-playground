<?php
require "conexaoMysql.php";
class Endereco
{
  public $rua;
  public $bairro;
  public $cidade;

  function __construct($rua, $bairro, $cidade)
  {
    $this->rua = $rua;
    $this->bairro = $bairro; 
    $this->cidade = $cidade;
  }
}

$cep = $_GET['cep'] ?? '';
$pdo = mysqlConnect();

$sql = <<<SQL
    SELECT *
    FROM ex4endereco
    WHERE ex4endereco.cep = :cep
SQL;

$endereco = new Endereco('', '', '');

try {
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$cep]);
  $street = $stmt->fetch(PDO::FETCH_OBJ);

  $endereco = new Endereco(
    $street->rua,
    $street->bairro,
    $street->cidade
  );
} catch (Exception $ex) {
  $pdo->rollBack();
  exit("Falhaa!");
}

header('Content-type: application/json');  
echo json_encode($endereco);
