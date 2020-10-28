<?php
  // assignation variable + affichage
  // $playerName1 = "b3b3r";
  // $playerAge1 = 30;
  // $isManPlayer1 = true;
  // echo "Coucou " . $playerName1;
  // echo "<br />";
  // echo "Age: " .$playerAge1;
  // $playerAge1 = $playerAge1 + 1;
  // echo "<br />";
  // echo "Age: " .$playerAge1;
  // echo "<br />";
  // // conditions
  // if ($isManPlayer1) {
  //   echo "C'est un homme";
  // } else {
  //   echo "C'est une femme";
  // };

  // //fonctions
  // $playerName2 = "lili";
  // $playerAge2 = 20;
  // $isManPlayer2 = false;
  // function displayname($name, $age, $isMan) {
  //   echo "Coucou " . $name;
  //   echo "<br />";
  //   echo "Age: " .$age;
  //   $age ++;
  //   echo "<br />";
  //   echo "Age: " .$age;
  //   echo "<br />";
  //   if ($isMan) {
  //     echo "C'est un homme";
  //   } else {
  //     echo "C'est une femme";
  //   };
  // }
  // echo "<br />";
  // displayname($playerName1,$playerAge1,$isManPlayer1);
  // echo "<br />";
  // displayname($playerName2,$playerAge2,$isManPlayer2);

  // Tableau associatifs
  define("SEPARATEUR", "-");

  $players = [
    [
      "name"=>"B3b3r",
      "age"=>20,
      "isMan"=>true
    ],
    [
      "name"=>
      [
        "first"=>"Jean",
        "second"=>"Claude",
      ],
      "age"=>25,
      "isMan"=>true
    ]
    ];

  function breakLine($number){
    echo "<br />";
    for ($i=0; $i < $number; $i++) { 
    echo SEPARATEUR;
    }
    echo "<br />";
  };

  function displayPlayer($player){
    foreach($player as $index=> $value){
      if (is_array($value)) {
        displayPlayer($value);
      } else {
        echo $index . ": " . $value . "<br />";
      };
    };
  };

  function displayPlayers($players){
    foreach($players as $player){
      echo "<br />";
      displayPlayer($player);
      breakLine(50);
    };
  };

  displayPlayers($players);
?>