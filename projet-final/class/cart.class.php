<?php
  require_once("./class/fruit.class.php");
  require_once("./class/cart.manager.php");
  require_once("./class/format.class.php");
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
    $display = FormatTitle::levelTwo('Contenu du panier ' . $this->id ." :");
    $display .= '<table class="table">';
        $display .= '<thead>';
            $display .= '<tr>';
                $display .= '<th scope="col">Image</th>';
                $display .= '<th scope="col">Nom</th>';
                $display .= '<th scope="col">Poids</th>';
                $display .= '<th scope="col">Prix</th>';
                $display .= '<th scope="col">Modifier</th>';
                $display .= '<th scope="col">Supprimer</th>';
            $display .= '</tr>';
        $display .= '</thead>';
        $display .= '<tbody>';
    foreach($this->apples as $apple){
      $display .= $this->displayFruit($apple);
    }
    foreach($this->cherries as $cherry){
      $display .= $this->displayFruit($cherry);
    }  
        $display .= '</tbody>';
    $display .= '</table>';
    return $display;
  }

  private function displayFruit($fruit){
    $display = '<tr>';
      $display .= '<td>'.$fruit->getImageSmall().'</td>';
      $display .= '<td>'.$fruit->getName().'</td>';
      $display .= '<td>';
        if (isset($_GET["fruitId"]) && $_GET["fruitId"] === $fruit->getName()) {
          $display .= '<form action="#" method="POST">';
            $display .= '<input type="hidden" name="type" id="type" value="modifier" />';
            $display .= '<input type="hidden" name="fruitId" id="fruitId" value="'.$fruit->getName().'" />';
            $display .= '<input type="number" id="weightFruit" name="weightFruit" value='.$fruit->getWeight().'>';
        } else {
          $display .= $fruit->getWeight();
        }
      $display .= '</td>';
      $display .= '<td>';
        if (isset($_GET["fruitId"]) && $_GET["fruitId"] === $fruit->getName()) {
            $display .= '<input type="number" id="priceFruit" name="priceFruit" value='.$fruit->getPrice().'>';
        } else {
          $display .= $fruit->getPrice();
        }
      $display .= '</td>';
      $display .= '<td>';
        if (isset($_GET["fruitId"]) && $_GET["fruitId"] === $fruit->getName()) {
          $display .= '<input class="btn btn-success" type="submit" value="Valider" />';
          $display .= '</form>';
        }else {
          $display .= '<form action="#" method="GET">';
          $display .= '<input type="hidden" name="fruitId" id="fruitId" value="'.$fruit->getName().'" />';
          $display .= '<input class="btn btn-primary" type="submit" value="Modifier" />';
          $display .= '</form>';
        }
      $display .= '</td>';
      $display .= '<td>';
        $display .= '<form action="#" method="POST">';
          $display .= '<input type="hidden" name="fruitId" id="fruitId" value="'.$fruit->getName().'" />';
          $display .= '<input type="hidden" name="type" id="type" value="supprimer" />';
          $display .= '<input class="btn btn-danger" type="submit" value="Supprimer" />';
          $display .= '</td>';
        $display .= '</form>';
    $display .= '</tr>';
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