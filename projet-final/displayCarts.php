<?php
  require_once("./class/cart.manager.php");
  require_once("./class/fruit.manager.php");
  require_once("./class/cart.class.php");
  include("./common/header.php");
  include("./common/menu.php");
?>

<div class="container">
<?php
  if (isset($_POST["fruitId"]) && $_POST["type"]==="modifier") {
    $id=$_POST["fruitId"];
    $weight=(int)$_POST["weightFruit"];
    $price=(int)$_POST["priceFruit"];
    $res=FruitManager::updateFruitInDB($id, $weight, $price);
    if ($res) {
      echo '<div class="alert alert-success mt-2" role="alert">La modification a réussi</div>';
    } else {
      echo '<div class="alert alert-danger mt-2" role="alert">La modification a échoué</div>';
    }
  } else if (isset($_POST["fruitId"]) && $_POST["type"]==="supprimer") {
    $id=$_POST["fruitId"];
    $res=FruitManager::deleteFruitInDB($id);
    if ($res) {
      echo '<div class="alert alert-success mt-2" role="alert">La suppression a réussi</div>';
    } else {
      echo '<div class="alert alert-danger mt-2" role="alert">La suppression a échoué</div>';
    }
  };
  CartManager::setCartsFromDB();
  foreach(Cart::$list as $cart){
    $cart->setFruitsToCart();
    echo $cart;
  };
?>
</div>
<?php
  include("./common/footer.php");
?>
