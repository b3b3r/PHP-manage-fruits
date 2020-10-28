<?php
  include("./common/header.php");
  include("./common/menu.php");
?>

<h1>Exercice 9 - <span>Liste de personnages</span></h1>
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
  function displayCharacter($characters){
    foreach($characters as $character){
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
    };
    echo "<div class='clearB'></div>";
  };
  displayCharacter($characters);
?>

<?php
  include("./common/footer.php");
?>