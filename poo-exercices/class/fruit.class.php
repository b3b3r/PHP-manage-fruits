<?php
class Fruit {
  private static $fruits=[];
  public static $list=[];
  private $name;
  private $weight;
  private $price;
  private $picture;

  const APPLE = "./images/apple.png";
  const CHERRY = "./images/cherry.png";

  public function __construct($name, $weight, $price, $picture){
    $this->name=$name;
    $this->weight=$weight;
    $this->price=$price;
    $this->picture=$picture;
    self::$fruits[]=$this;
  }

  private function getName(){return $this->name;}
  private function getWeight(){return $this->weight;}
  private function getPrice(){return $this->price;}
  private function getPicture(){return $this->picture;}

  private function setName($name){$this->name=$name;}
  private function setWeight($weight){$this->weight=$weight;}
  private function setPrice($price){$this->price=$price;}
  private function setPicture($picture){$this->picture=$picture;}

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

  public function listFruits(){
    return self::$fruits;
  }
}
?>