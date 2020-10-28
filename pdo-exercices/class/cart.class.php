<?php
  require_once("./class/fruit.class.php");
  require_once("./class/cart.manager.php");
 class Cart {
  public static $list=[];
  private $apples=[];
  private $cherries=[];

  private $id;
  private $customerName;

  public function __construct($id, $customerName){
    $this->id= $id;
    $this->customerName= $customerName;
  }

  public function getId(){return $this->id;}
  public function getList(){return $this->list;}

  public function setFruitsToCart(){
    $fruits= CartManager::getFruitsCart($this->id);
    foreach($fruits as $fruit){
      if ($fruit["kind"]==="POMME") {
        $this->apples[]=new Fruit($fruit["name"],$fruit["weight"],$fruit["price"],Fruit::APPLE);
      } else {
        $this->cherries[]=new Fruit($fruit["name"],$fruit["weight"],$fruit["price"],Fruit::CHERRY);
      }
    };
  }

  public function __toString(){
    $display = "Voici le contenu du panier ".$this->id ." : </br>";
    foreach($this->apples as $apple){
      $display .= $apple;
    };
    foreach($this->cherries as $cherry){
      $display .= $cherry;
    };
    return $display;
  }

  public function addFruit($fruit){
    if (preg_match("/pomme/", $fruit->getName())) {
      $this->apples[]=$fruit;
    } else {
      $this->cherries[]=$fruit;
    }
  }

  public function saveInDB(){
    return CartManager::insertIntoDB($this->id, $this->customerName);
  }

  public static function generateUniqueId(){
    return CartManager::getCartNumber()+1;
  }
 }
?>