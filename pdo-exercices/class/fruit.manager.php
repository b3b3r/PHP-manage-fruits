<?php
require_once("./class/fruit.class.php");
require_once("./class/connection.class.php");
class FruitManager{
  public static function setFruitsFromDB(){
    $pdo = MyPDO::getPDO();
  
    $req  = 'SELECT f.name AS name, f.weight AS weight, f.price AS price, c.customer AS customer FROM fruit AS f
    INNER JOIN cart AS c ON c.id = f.cart_id';
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $fruits = $stmt->fetchAll();
    foreach($fruits as $fruit){
      Fruit::$list[]=new Fruit($fruit["name"],$fruit["weight"],$fruit["price"],Fruit::APPLE);
    };
  }

  public static function getFruitNumber(){
    $pdo = MyPDO::getPDO();
    $req  = 'SELECT COUNT(name) AS nbFruit from fruit';
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $result= $stmt->fetch();
    return $result["nbFruit"];
  }

  public static function insertIntoDB($name, $weight, $price, $cartId, $type){
    $pdo = MyPDO::getPDO();
    $req  = 'INSERT INTO fruit (name, weight, price, cart_id, type) VALUES(:name, :weight, :price, :cartId, :type)';
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":name",$name,PDO::PARAM_STR);
    $stmt->bindValue(":weight",$weight,PDO::PARAM_INT);
    $stmt->bindValue(":price",$price,PDO::PARAM_INT);
    $stmt->bindValue(":cartId",$cartId,PDO::PARAM_INT);
    $stmt->bindValue(":type",$type,PDO::PARAM_STR);
    try {
      return $stmt->execute();
    } catch (PDOException $e) {
      echo "Erreur : " .$e->getMessage();
      return false;
    }
  }
}
?>