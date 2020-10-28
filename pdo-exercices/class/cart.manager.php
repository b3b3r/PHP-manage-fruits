
<?php
require_once("./class/cart.class.php");
require_once("./class/connection.class.php");
class CartManager{
  public static function setCartsFromDB(){
    $pdo = MyPDO::getPDO();
    $req  = 'SELECT id, customer FROM cart';
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $carts = $stmt->fetchAll();
    foreach($carts as $cart){
      Cart::$list[]=new Cart($cart["id"], $cart["customer"]);
    };
  }

  public static function getFruitsCart($id){
    $pdo = MyPDO::getPDO();
    $req  = 'SELECT f.name AS name, f.weight AS weight, f.price AS price, f.type AS kind FROM fruit AS f
    INNER JOIN cart AS c ON c.id = f.cart_id
    WHERE c.id = :id';
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public static function getCartNumber(){
    $pdo = MyPDO::getPDO();
    $req  = 'SELECT COUNT(id) AS nbCart from cart';
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $result= $stmt->fetch();
    return $result["nbCart"];
  }

  public static function insertIntoDB($id, $name){
    $pdo = MyPDO::getPDO();
    $req  = 'INSERT INTO cart (id, customer) VALUES(:id, :name)';
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":id",$id,PDO::PARAM_INT);
    $stmt->bindValue(":name",$name,PDO::PARAM_STR);
    try {
      return $stmt->execute();
    } catch (PDOException $e) {
      echo "Erreur : " .$e->getMessage();
      return false;
    }
  }
}
?>