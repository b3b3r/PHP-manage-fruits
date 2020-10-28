<?php
  require_once("./class/fruit.class.php");
  require_once("./class/fruit.manager.php");
  include("./common/header.php");
  include("./common/menu.php");
?>

<h1>Exercice 1 - <span>Afficher les fruits PDO</span></h1>
<?php

FruitManager::setFruitsFromDB();
foreach(Fruit::$list as $fruit){
  $fruit->display();
}
?>

<?php
  include("./common/footer.php");
?>
