<?php
  include("./common/header.php");
  include("./common/menu.php");
?>

<h1>Exercice 1 - <span>Table de multiplication</span></h1>

<form action="#" method="get">
  <fieldset>
    <legend>Table</legend>
    <label for="name">Quelle table souhaitez-vous ?</label>
    <input type="number" name="table" id="table" required/>
    <input type="submit" value="Calculer"/>
  </fieldset>
</form>
<?php
  function displayResults($number){
    for($i=0;$i<=10;$i++){
      echo "<p>".$i ."x" .$number ."=" .$number*$i ."</p>";
    };
  };

  if (isset($_GET["table"]) && is_numeric($_GET["table"])) {
    $number = $_GET["table"];
    echo "<h2>Table de " .$number ."</h2>";
    displayResults($number);
  } else {
    echo "<div class=\"message\"><p>Sélectionner un nombre valide</p></div>";
  };
?>

<?php
  include("./common/footer.php");
?>