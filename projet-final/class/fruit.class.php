<?php
require_once("./class/fruit.manager.php");
class Fruit {
  private static $fruits=[];
  public static $list=[];
  public $name;
  public $weight;
  public $price;
  public $picture;

  const APPLE = "./images/apple.png";
  const CHERRY = "./images/cherry.png";

  public function __construct($name, $weight, $price, $picture){
    $this->name=$name;
    $this->weight=$weight;
    $this->price=$price;
    $this->picture=$picture;
    self::$fruits[]=$this;
  }

  public function getName(){return $this->name;}
  public function getWeight(){return $this->weight;}
  public function getPrice(){return $this->price;}
  public function getPicture(){return $this->picture;}
  private function getType(){
    return preg_match("/Cerise/", $this->getName()) ? "CERISE" : "POMME";
  }

  public function setName($name){$this->name=$name;}
  public function setWeight($weight){$this->weight=$weight;}
  public function setPrice($price){$this->price=$price;}
  public function setPicture($picture){$this->picture=$picture;}

  public function display(){
    echo "<img src='".$this->getPicture()."' alt='fruit'/></br>";
    echo "name: ".$this->getName()."</br>";
    echo "weight: ".$this->getWeight()."g</br>";
    echo "price: ".$this->getPrice()."€/100g</br>";
    echo "--------------------------------</br>";
  }

  public function __toString(){
    $display = "<img src='".$this->getPicture()."' alt='fruit'/></br>";
    $display .= "name: ".$this->getName()."</br>";
    $display .= "weight: ".$this->getWeight()."g</br>";
    $display .= "price: ".$this->getPrice()."€/100g</br>";
    return $display;
  }

  public function displayList(){
    $display = '<div class="card text-center">';
      $display .= "<img class=\"card-img-top mx-auto\" style='width:200px' src='".$this->getPicture()."' alt='fruit'/></br>";
      $display .= '<div class="card-body">';
          $display .= '<h5 class="card-title">Nom : ' . $this->getName() . '</h5>';
          $display .= '<p class="card-text">Poids : ' . $this->getWeight() . '<br />';
          $display .= "Prix : " . $this->getPrice() . "</br>";
          $display .= "Panier : ";
          $carts = FruitManager::getCarts();
          $fruitCart = FruitManager::getCartFromFruit($this->getName());
            $display .= '<form action="#" method="POST">';
              $display .= '<input type="hidden" name="fruitId" id="fruitId" value="'.$this->getName().'" />';
              $display .= '<select class="form-control form-control-sm" name="cartId" id="cartId" onChange="submit()">';
                $display .= '<option value=""></option>';
                foreach($carts as $cart){
                  if ($fruitCart === $cart["customer"]) {
                    $display .= '<option value='.$cart["id"].' selected>'.$cart["customer"].'</option>';
                  } else {
                    $display .= '<option value='.$cart["id"].'>'.$cart["customer"].'</option>';
                  }
                }
              $display .= '</select>';
            $display .= '</form>';
          $display .= "</p>";
      $display .= "</div>";
    $display .= "</div>";
    return $display;
}

  public function listFruits(){
    return self::$fruits;
  }

  public function getImageSmall(){
    if(preg_match("/Cerise/",$this->name)){
      return "<img class=\"card-img-top mx-auto\" style='width:50px' src='./images/cherry.png' alt='fruit'/>";
    }
    if(preg_match("/Pomme/",$this->name)){
      return "<img class=\"card-img-top mx-auto\" style='width:50px' src='./images/apple.png' alt='fruit'/>";
    }
}

  public static function generateUniqueId(){
    return FruitManager::getFruitNumber()+1;
  }

  public function saveInDB($cartId){
    return FruitManager::insertIntoDB($this->name, $this->weight, $this->price, $cartId, $this->getType());
  }
}
?>