<?php
  require_once("./class/fruit.class.php");
  require_once("./class/cart.class.php");
  include("./common/header.php");
  include("./common/menu.php");
?>

<h1>Exercice 3 - <span>Panier de fruits</span></h1>
<?php
  $cart= new Cart();
  $cart2= new Cart();
  $apple = new Fruit("Gala",120,2.99,Fruit::APPLE);
  $apple2 = new Fruit("Golden",150,3.99,Fruit::APPLE);
  $cherry = new Fruit("Rouge",10,5.99,Fruit::CHERRY);
  $cherry2 = new Fruit("Brune",10,6.99,Fruit::CHERRY);
  $cart->addToCart($apple);
  $cart->addToCart($cherry);
  $cart2->addToCart($apple2);
  $cart2->addToCart($cherry2);
  $allCarts = [$cart,$cart2];

  echo '<form method="post" action="#">';
  echo '<label for="cart">Sélectionner un panier:</label>';
  echo '<select name="cart" id="cart" onChange="submit()">';
  echo '<option value=""></option>';
  foreach($allCarts as $cart){
    echo '<option value="'.$cart->getId().'"<?php if(isset($_POST["cart"])&&$_POST["cart"]==='.$cart->getId().') echo "selected" ?> Panier' .$cart->getId() .'</option>';
  };
  echo "</select>";
  echo "</form>";

  function getCartById($id){
    global $allCarts;
    foreach($allCarts as $cart){
      if($cart->getId()===$id){
        return $cart;
      };
    };
  };

  if(isset($_POST["cart"])){
    $cartToDisplay = getCartById((int)$_POST["cart"]);
    echo "<h2>Panier ".$cartToDisplay->getId() .":</h2>";
    foreach($cartToDisplay->getList() as $fruit){
      $fruit->display();
      echo "</br>";
    };
  };
?>

<?php
  include("./common/footer.php");
?>