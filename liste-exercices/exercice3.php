<?php
  include("./common/header.php");
  include("./common/menu.php");
?>

<h1>Exercice 3 - <span>Périmètre et aire d'un cercle</span></h1>

<form action="#" method="post">
  <fieldset>
    <legend>Table</legend>
    <label for="name">Rayon du cercle:</label>
    <input type="number" name="radius" id="radius" required />
    <input type="checkbox" id="perimeter" name="perimeter" />
      <label for="perimeter">Périmètre</label>
    <input type="checkbox" id="area" name="area" />
      <label for="area">Aire</label>
    <input type="submit" value="Calculer"/>
  </fieldset>
</form>
<?php
  function calculateArea($radius, $isChecked){
    if ($isChecked) {
    $perimeter= M_PI * $radius * $radius;
    echo "<div><p>Le périmètre d'un cercle de rayon " .$radius ." est: " .$perimeter ."</p></div>";  
    };
  };
  function calculatePerimeter($radius, $isChecked){
    if ($isChecked) {
      $area = 2 *  M_PI * $radius;
      echo "<div><p>L'aire d'un cercle de rayon " .$radius ." est: ".$area ."</p></div>";  
    };
  };

  if(isset($_POST["radius"]) && isset($_POST["radius"]) >0){
    if(isset($_POST["area"]) || isset($_POST["perimeter"])){
      $radius = $_POST["radius"];
      calculateArea($radius, isset($_POST["area"]));
      calculatePerimeter($radius, isset($_POST["perimeter"]));
    } else {
      echo "<div class=\"message warning\"><p>Sélectionner un paramètre</p></div>";  
    };
  } else {
    echo "<div><p>Sélectionner un rayon</p></div>";
  };
?>

<?php
  include("./common/footer.php");
?>