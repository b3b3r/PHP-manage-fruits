<?php
  include("./common/header.php");
  include("./common/menu.php");
?>

<?php
  
?>

<h1>Exercice 5 - <span>Calculer la moyenne</span></h1>
<form action="#" method="get">
  <fieldset>
    <legend>Notes</legend>
    <label for="name">Quel est le nombre de notes ?</label>
    <input type="number" name="notes" id="notes" required/>
    <input type="submit" value="Poursuivre"/>
  </fieldset>
</form>
<?php
  function calculateAverage(){
    if(isset($_GET["notes"])){
      $result=0;
      for ($i=1; $i <= $_GET["notes"]; $i++) { 
        if(isset($_POST["score".$i])){
          $result+= (int)$_POST["score".$i];
        };
      };
      return $result/$_GET["notes"];
    };
  };
  function generateInput(){
    if (isset($_GET["notes"]) && $_GET["notes"] > 0) {
      echo '<form action="#" method="post">
      <fieldset class=\"average\">
      <legend>Notes</legend>';
      for ($i=1; $i <= $_GET["notes"]; $i++) {
        echo '<label for="score'.$i .'">Note ' .$i .':</label>';
        echo '<input type="number" name="score'.$i .'" id="score'.$i .'" required/><br/>';
      };
      echo '<input type="submit" value="Calculer"/></fieldset></form>';
    };
    if(isset($_POST["score1"])){
      $average = calculateAverage();
      echo "<h2> la moyenne est de: ".$average ."</h2>";
    };
  };
  generateInput();
?>

<?php
  include("./common/footer.php");
?>