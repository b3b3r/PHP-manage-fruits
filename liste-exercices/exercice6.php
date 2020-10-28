<?php
  include("./common/header.php");
  include("./common/menu.php");
?>

<?php
  
?>

<h1>Exercice 6 - <span>Sélection image</span></h1>
<form method="post" action="#">
<label for="characters">Sélectionner un personnage:</label>
<select name="characters" id="characters">
  <option value="male">Masculin</option>
  <option value="female">Féminin</option>
</select>
<input type="submit" value="Sélectionner" />
</form>
<?php
  function getPicture(){
    $option = isset($_POST['characters']) ? $_POST['characters'] : false;
   if ($option) {
    $gender = htmlentities($_POST['characters'], ENT_QUOTES, "UTF-8");
    if ($gender === "male") {
      echo "<img src=\"./images/player.png\" alt=\"character\" />";
    } else {
      echo "<img src=\"./images/playerF.png\" alt=\"character\" />";
    }
   } else {
     exit; 
   }
  };
  getPicture();
?>

<?php
  include("./common/footer.php");
?>