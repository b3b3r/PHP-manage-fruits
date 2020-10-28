<?php
  include("./common/header.php");
  include("./common/menu.php");
?>

<h1>Exercice 2 - <span>Pyramide</span></h1>
<form action="#" method="post">
  <fieldset>
    <legend>Pyramide</legend>
    <label for="name">Quelle taille souhaitez-vous ?</label>
    <input type="number" name="pyramid" id="pyramid" required/>
    <input type="submit" value="Afficher"/>
  </fieldset>
</form>
<?php
  define("SYMBOL", "x");
  function displaySymbol($symbol, $size){
    for ($i=0; $i <$size ; $i++) { 
      echo $symbol;
    };
  };
  function displayDescSide($symbol, $size){
    for ($i=$size; $i > 0 ; $i--) { 
      displaySymbol($symbol, $i);
      echo "<br />";
    };
  };
  function displayAscSide($symbol, $size){
    for ($i=0; $i < $size ; $i++) { 
      displaySymbol($symbol, $i);
      echo "<br />";
    };
  };
  function displayPyramid($symbol, $size){
    displayAscSide($symbol, $size);
    displayDescSide($symbol, $size);
  };
  if (isset($_POST["pyramid"]) && $_POST["pyramid"] >0){
    echo "<h2> Pyramide de taille " .$_POST["pyramid"] ."</h2>";
    displayPyramid(SYMBOL,$_POST["pyramid"]);
  } else if(isset($_POST["pyramid"]) && $_POST["pyramid"] <0){
    echo "<div class=\"message warning\"><p>Sélectionner un nombre positif</p></div>";
  } else {
    echo "<div><p>Sélectionner une taille de pyramide</p></div>";
  };
?>

<?php
  include("./common/footer.php");
?>