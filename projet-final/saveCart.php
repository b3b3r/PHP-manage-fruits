<?php
  require_once("./class/fruit.class.php");
  require_once("./class/cart.class.php");
  include("./common/header.php");
  include("./common/menu.php");
?>

<h1><span>Création panier de fruits</span></h1>
<div class="container">
<?php
  echo '<form action="#" method="POST">
    <div class="row">
      <div class="col">
        <label for="customer">Nom du client:</label>
        <input class="form-control" type="text" name="customer" id="customer" required/>
      </div>
      <div class="col">
        <label for="nb_apples">Nombre de pommes:</label>
        <input class="form-control" type="number" name="nb_apples" id="nb_apples" required/>
      </div>
      <div class="col">
        <label for="nb_cherries">Nombre de cerises:</label>
        <input class="form-control" type="number" name="nb_cherries" id="nb_cherries" required/>
      </div>
      <input class="btn btn-primary" type="submit" value="Créer un panier"/></fieldset></form>
    </div>';

  $allCarts=[];

  if(isset($_POST["customer"])&& !empty($_POST["customer"])){
    $cart = new Cart(Cart::generateUniqueId(),$_POST["customer"]);
    $res = $cart->saveInDB();
    if ($res) {
      $nbApples = (int)$_POST["nb_apples"];
      $nbCherries = (int)$_POST["nb_cherries"];
      $cpt=1;
      $nbFruitInDB=Fruit::generateUniqueId();
      for ($i=0; $i < $nbApples; $i++) {
        $fruit = new Fruit("Pomme".($nbFruitInDB+$cpt),rand(120,150),2.99,Fruit::APPLE);
        $fruit-> saveInDB($cart->getId());
        $cart->addFruit($fruit);
        $cpt++;
      }
      for ($i=0; $i < $nbCherries; $i++) {
        $fruit= new Fruit("Cerise".($nbFruitInDB+$cpt),rand(10,12),5.99,Fruit::CHERRY);
        $fruit-> saveInDB($cart->getId());
        $cart->addFruit($fruit);
        $cpt++;
      }
      echo $cart;
    }else{
      echo "KO";
    }
  }
  
?>
</div>
<?php
  include("./common/footer.php");
?>