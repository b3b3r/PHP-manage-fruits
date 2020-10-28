<?php
  include("./common/header.php");
  include("./common/menu.php");
?>

<h1>Exercice 7 - <span>Tableau</span></h1>
<h2>Résultats:</h2>
<?php
  $arr= [2,6,12,5,26,34,40,60];
  function doesContainPeer($arr){
    foreach($arr as $val){
      if ($val%2===0) {
        return true;
      };
    };
    return false;
  };
  if (doesContainPeer($arr)) {
    echo "<p>Le tableau ne contient que des valeurs pairs</p>";
  } else {
    echo "<p>Le tableau contient des valeurs impairs</p>";
  };  
?>

<?php
  include("./common/footer.php");
?>