<?php
  require_once("./class/fruit.class.php");
  include("./common/header.php");
  include("./common/menu.php");
?>

<h1>Exercice 1 - <span>Fruits</span></h1>
<h2>Fruits:</h2>
<?php
  $pomme = new Fruit("Gala",120,2.99,Fruit::APPLE);
  $cherry = new Fruit("Rouge",120,5.99,Fruit::CHERRY);
  $allFruits = Fruit::listFruits();
  // echo "<pre>";
  // print_r($allFruits);
  // echo "</pre>";
  foreach($allFruits as $fruit){
    $fruit->display();
    //echo $fruit; //deuxième méthode pour afficher via toString()
    echo "</br>";
  };
?>

<?php
  include("./common/footer.php");
?>