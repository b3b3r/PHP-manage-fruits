<?php
require_once("./class/fruit.class.php");
require_once("./class/connection.class.php");
class FruitManager{
  public static function setFruitsFromDB(){
    $pdo = MyPDO::getPDO();
  
    $req  = 'SELECT f.name AS name, f.weight AS weight, f.price AS price FROM fruit AS f';
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
  public static function updateFruitInDB($id, $weight, $price){
    $pdo = MyPDO::getPDO();
    $req  = 'UPDATE fruit SET weight=:weight, price=:price WHERE name= :id';
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":id",$id,PDO::PARAM_STR);
    $stmt->bindValue(":weight",$weight,PDO::PARAM_INT);
    $stmt->bindValue(":price",$price,PDO::PARAM_INT);
    try {
      return $stmt->execute();
    } catch (PDOException $e) {
      echo "Erreur : " .$e->getMessage();
      return false;
    }
  }

  public static function deleteFruitInDB($id){
    $pdo = MyPDO::getPDO();
    $req  = 'UPDATE fruit SET cart_id= null WHERE name= :id';
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":id",$id,PDO::PARAM_STR);
    try {
      return $stmt->execute();
    } catch (PDOException $e) {
      echo "Erreur : " .$e->getMessage();
      return false;
    }
  }

  public static function getCartFromFruit($name){
    $pdo = MyPDO::getPDO();
    $req  = 'SELECT c.customer AS customer FROM fruit AS f
    INNER JOIN cart AS c ON c.id = f.cart_id
    WHERE f.name = :id';
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":id",$name,PDO::PARAM_STR);
    try {
      $stmt->execute();
      $client = $stmt->fetch();
      return $client["customer"] ?? 'default value';
    } catch (PDOException $e) {
      echo "Erreur : " .$e->getMessage();
      return false;
    }
  }

  public static function getCarts () {
    $pdo = MyPDO::getPDO();
    $req  = 'SELECT c.id, c.customer AS customer FROM cart AS c';
    $stmt = $pdo->prepare($req);
    try {
      $stmt->execute();
      return $stmt->fetchAll();
    } catch (PDOException $e) {
      echo "Erreur : " .$e->getMessage();
      return false;
    }
  }

  public static function updateCartForFruitInDB($fruitId, $cartId){
    $pdo = MyPDO::getPDO();
    $req  = 'UPDATE fruit SET cart_id= :cartId WHERE name= :fruitId';
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":cartId",$cartId,PDO::PARAM_INT);
    $stmt->bindValue(":fruitId",$fruitId,PDO::PARAM_STR);
    try {
      return $stmt->execute();
    } catch (PDOException $e) {
      echo "Erreur : " .$e->getMessage();
      return false;
    }
  }
}
?>