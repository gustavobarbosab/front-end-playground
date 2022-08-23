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
          <th scope="col">ID</th>
          <th scope="col">Alimento</th>
          <th scope="col">Descrição</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $products = ["Arroz", "Feijão", "Queijo Minas", "Batata Doce", "Tomate", "Brocolis", "Frango", "Carne Moída", "Alface", "Pão Integral"];
        $description = [
          "O arroz é uma planta da família das gramíneas que alimenta mais da metade da população humana do mundo.",
          "Feijão é um nome comum para uma grande variedade de sementes de plantas de alguns gêneros da família Fabaceae.",
          "Queijo minas frescal, ou simplesmente queijo minas, é um queijo brasileiro e segundo o regulamento técnico do Mercosul de identidade e qualidade.",
          "A batata-doce, também chamada batata-da-terra, batata-da-ilha, jatica e jetica, é uma planta da família das convolvuláceas, da ordem das Solanales.",
          "O tomate é o fruto do tomateiro. Da sua família, fazem também parte as berinjelas, as pimentas e os pimentões, além de algumas espécies não comestíveis.",
          "Os brócolis ou brócolos são vegetais da família Brassicaceae, uma das formas cultivadas de couve, tal como a couve-flor, o repolho, couve-de-bruxelas, couve-nabo entre outras.",
          "No contexto culinário, o termo frango remete a qualquer prato preparado com a carne de aves como as galinhas.",
          "Carne moída, chamada carne picada ou picada fora da América do Norte, é carne picada finamente por um moedor de carne ou uma faca de corte.",
          "Alface é uma hortense anual ou bienal, utilizada na alimentação humana desde cerca de 500 a.C..",
          "Pão integral ou pão integral é um tipo de pão feito com farinha que é parcial ou totalmente moída a partir de grãos de trigo integrais ou quase integrais."
        ];

        $qde = isset($_GET["qde"]) ? $_GET["qde"] : 0;

        for ($i = 0; $i < $qde; $i++) {
          $randomValue = rand(0,9);
          $productName = $products[$randomValue];
          $productDescription = $description[$randomValue];

          echo <<<HTML
            <tr>
              <th scope="row">$i</th>
              <td>$productName</td>
              <td>$productDescription</td>
            </tr>
          HTML;
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>