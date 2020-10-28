<?php
class MyPDO{
  private const HOST_NAME="localhost";
  private const DB_NAME="db_test_php_fruits";
  private const USER_NAME = "root";
  private const PWD ="";

  private static $myInstancePDO=null;

  public static function getPDO(){
    if(is_null(self::$myInstancePDO)){
      try {
        $connection = 'mysql:host='.self::HOST_NAME.';dbname='.self::DB_NAME.';';
        self::$myInstancePDO = new PDO($connection,self::USER_NAME, self::PWD, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      } catch (PDOexception $e) {
        $message = "erreur de connexion à la DB" .$e->getMessage();
        die($message);
      };
      self::$myInstancePDO->exec("SET CHARACTER SET UTF8");
    };
    return self::$myInstancePDO;
  }
}
?>