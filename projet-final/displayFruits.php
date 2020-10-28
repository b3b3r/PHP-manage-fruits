<?php
  require_once("./class/fruit.class.php");
  require_once("./class/fruit.manager.php");
  require_once("./class/format.class.php");
  include("./common/header.php");
  include("./common/menu.php");
?>
<div class="container">
<?php
  echo FormatTitle::levelTwo("Les fruits :");

  if(isset($_POST["cartId"])){
    $fruitId= $_POST["fruitId"];
    $cartId= (int)$_POST["cartId"];
    $res=FruitManager::updateCartForFruitInDB($fruitId, $cartId);
    if ($res) {
      echo '<div class="alert alert-success mt-2" role="alert">La modification a réussi</div>';
    } else {
      echo '<div class="alert alert-danger mt-2" role="alert">La modification a échoué</div>';
    }
  }
  
  FruitManager::setFruitsFromDB();

  echo '<div class="row mx-auto">';
  foreach(Fruit::$list as $fruit){
    echo '<div class="col-sm p-2">';
      echo $fruit->displayList();
    echo '</div>'; 
  }
  echo '</div>';
?>
</div>
<?php
  include("./common/footer.php");
?>
