<?php
  require_once("./class/fruit.class.php");
  require_once("./class/cart.class.php");
  include("./common/header.php");
  include("./common/menu.php");
?>

<h1>Exercice 2 - <span>Panier de fruits</span></h1>
<?php
  $cart= new Cart();
  $pomme = new Fruit("Gala",120,2.99,Fruit::APPLE);
  $cherry = new Fruit("Rouge",10,5.99,Fruit::CHERRY);
  $cherry2 = new Fruit("Brune",10,6.99,Fruit::CHERRY);
  $cart->addToCart($pomme);
  $cart->addToCart($cherry);
  $cart->addToCart($cherry2);
  echo "<h2>Panier ".$cart->getId() .":</h2>";
  foreach($cart->getList() as $fruit){
    $fruit->display();
    echo "</br>";
  };
?>

<?php
  include("./common/footer.php");
?>