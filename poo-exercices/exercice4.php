<?php
  require_once("./class/fruit.class.php");
  require_once("./class/cart.class.php");
  include("./common/header.php");
  include("./common/menu.php");
?>

<h1>Exercice 4 - <span>Création panier de fruits</span></h1>
<?php
  echo '<form action="#" method="POST">
    <fieldset><legend>Panier à créer:</legend>
    <label for="nb_apples">Nombre de pommes:</label>
    <input type="number" name="nb_apples" id="nb_apples" required/>
    <label for="nb_cherries">Nombre de cerises:</label>
    <input type="number" name="nb_cherries" id="nb_cherries" required/>
    <input type="submit" value="Créer un panier"/></fieldset></form>
    </fieldset> </form>';

  $allCarts=[];

  if(isset($_POST["nb_apples"])){
    $cart = new Cart();
    $nbApples = (int)$_POST["nb_apples"];
    $nbCherries = (int)$_POST["nb_cherries"];
    for ($i=0; $i < $nbApples; $i++) { 
      $cart->addToCart(new Fruit("Gala",rand(120,150),2.99,Fruit::APPLE));
    }
    for ($i=0; $i < $nbCherries; $i++) { 
      $cart->addToCart(new Fruit("Rouge",rand(10,12),5.99,Fruit::CHERRY));
    }
    array_push($allCarts, $cart);
  }
  echo '<form method="GET" action="#">';
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

  if(isset($_GET["cart"])){
    $cartToDisplay = getCartById((int)$_GET["cart"]);
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