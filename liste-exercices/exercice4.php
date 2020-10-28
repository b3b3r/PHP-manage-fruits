<?php
  include("./common/header.php");
  include("./common/menu.php");
?>

<?php
  function setRandNumber(){
    $_SESSION["rand"] = rand(0,20);
  };

  function resetRandNumber(){
    if(isset($_POST["reset"]) && $_POST["reset"]==="yes"){
      setRandNumber();
    };
  };

  function stockInSession(){
    session_start();
    if (!isset($_SESSION["rand"])) {
      setRandNumber();
    };
  };
  stockInSession();
?>

<h1>Exercice 4 - <span>Deviner un nombre</span></h1>
<form action="#" method="post">
  <input type="hidden" name="reset" value="yes"/>
  <input type="submit" value="Réinitialiser"/>
</form>
<form action="#" method="post">
  <fieldset>
    <legend>Nombre à deviner (0-20)</legend>
    <label for="name">Quel est le nombre ?</label>
    <input type="number" name="guess" id="guess" required/>
    <input type="submit" value="Deviner"/>
  </fieldset>
</form>
<?php
  function guessNumber(){
    if (isset($_POST["guess"])) {
      $rand = $_SESSION["rand"];
      $guess = (int)$_POST["guess"];
      if ($guess < $rand) {
        echo "<div class=\"message alert\"><p> C'est plus</p></div>";
      } else if($guess > $rand){
        echo "<div class=\"message alert\"><p>C'est moins</p></div>";
      } else {
        echo "<div class=\"message good\"><p> Vous avez trouvé !</p></div>";
      }  
    };
  };
  guessNumber();
  resetRandNumber();
?>

<?php
  include("./common/footer.php");
?>