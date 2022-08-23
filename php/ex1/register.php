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
    <?php
    $cep = isset($_POST["cep"]) ? $_POST["cep"] : "N/A";
    $street = isset($_POST["street"]) ? $_POST["street"] : "N/A";
    $district = isset($_POST["district"]) ? $_POST["district"] : "N/A";
    $city = isset($_POST["city"]) ? $_POST["city"] : "N/A";
    $state = isset($_POST["state"]) ? $_POST["state"] : "N/A";

    echo <<<HTML
    
      <div class="row">
        <div class="col-sm display-6">$cep</div>
        <div class="col-sm display-6">$street</div>
        <div class="col-sm display-6">$district</div>
        <div class="col-sm display-6">$city</div>
        <div class="col-sm display-6">$state</div>
      </div>
    HTML;
    ?>
  </div>
</body>

</html>