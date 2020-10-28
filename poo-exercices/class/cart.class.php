<?php
 class Cart {
  private static $nextId = 1;
  
  private $list=[];
  private $id;

  public function __construct(){
    $this->id= self::$nextId;
    self::$nextId ++;
  }

  public function getId(){return $this->id;}
  public function getList(){return $this->list;}

  public function addToCart($item){
    array_push($this->list, $item);
  }

 }
?>