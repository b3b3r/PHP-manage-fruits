<?php
  include("./common/header.php");
  include("./common/menu.php");
?>

<h1>Exercice 8 - <span>Sélection de personnages</span></h1>
<form method="post" action="#">
  <label for="characters">Sélectionner un personnage:</label>
  <select name="characters" id="characters" onChange="submit()">
    <option value="B3b3r" <?php if(isset($_POST["characters"])&&$_POST["characters"]=="B3b3r") echo "selected" ?> >B3b3r</option>
    <option value="Lili" <?php if(isset($_POST["characters"])&&$_POST["characters"]=="Lili") echo "selected" ?>>Lili</option>
  </select>
</form>
<h2>Personnage:</h2>
<?php
  $characters = [
    [
      "name"=>"B3b3r",
      "age"=>35,
      "gender"=>"m",
      "strenght"=> 3,
      "agility"=>9
    ],
    [
      "name"=>"Lili",
      "age"=>36,
      "gender"=>"f",
      "strenght"=> 4,
      "agility"=>8
    ]
    ];
  function displayCharacter($characters, $name){
    foreach($characters as $character){
      if ($character["name"] === $name) {
        echo "<div class='profil'>";
        if ($character["gender"]==="m") {
          echo "<img src=\"./images/player.png\" alt=\"character\" />";
        } else {
          echo "<img src=\"./images/playerF.png\" alt=\"character\" />";
        }; 
        echo "</div>";
        echo "<div class='profil'>";
        foreach($character as $key=>$val){
          echo "<p>" .$key.": ".$val."</p>";
        };
        echo "</div>";
      break;
      };
    };
    echo "<div class='clearB'></div>";
  };
  if(!isset($_POST["characters"])){
    displayCharacter($characters,$characters[0]["name"]);
  }else {
    displayCharacter($characters,$_POST["characters"]);
  };
?>

<?php
  include("./common/footer.php");
?>