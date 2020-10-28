<?php
  require_once("./class/cart.manager.php");
  require_once("./class/cart.class.php");
  include("./common/header.php");
  include("./common/menu.php");
?>

<h1>Exercice 2 - <span>Afficher les paniers PDO</span></h1>
<?php
  $carts= CartManager::setCartsFromDB();
  foreach(Cart::$list as $cart){
    $cart->setFruitsToCart();
    echo $cart;
  };
?>

<?php
  include("./common/footer.php");
?>
