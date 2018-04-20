<?php
require_once "tulos.php";

session_start();

if (isset ($_POST["fix"])){
    header("location: uusitulos.php");
    $tulos = $_SESSION["tulos"];
    exit;
}elseif ( isset ($_POST["save"])){
    header("location: kiitos.php");
   
    exit;
}elseif ( isset ($_POST["cancel"])){
    header("location: index.php");
    unset($_SESSION["tulos"]);
    exit;
  
}

if(isset($_SESSION["tulos"])){
    $tulos = $_SESSION["tulos"];
    //unset($_SESSION["tulos"]);
}



?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="main.css" rel="stylesheet">
<title>Baarivisa Tulokset</title>

</head>

<body>
    <div class="w3-content" style="max-width:1500px">

    <header class="w3-panel w3-center w3-opacity" style="padding:12px 16px">
                <h1 class="w3-xlarge">Baarivisa Tulokset</h1>
                <img src="baaripahkina.png"/>        
  
                        <div class="w3-padding-32">
                        <div class="w3-bar w3-border">
                        <a href="index.php" class="w3-bar-item w3-button ">Home</a>
                        <a href="uusitulos.php" class="w3-bar-item w3-button ">Lisää</a>
                        <a href="tulokset.php" class="w3-bar-item w3-button">Tulokset</a>
                        <a href="asetukset.php" class="w3-bar-item w3-button w3-hide-small">Asetukset</a>
    </div>
  </div>
  <div class="w3-row-padding w3-grayscale" style="margin-bottom:128px">
        <h2>Tuloksesi</h2>
    
    <?php
    print("<h3>" . $tulos->getPlace(). "</h3>\n");
    print("<p>" . $tulos->getAddress(). "</p>\n");
    print("<p>" . $tulos->getDate(). "</p>\n");
    print("<p>Visan tyyppi: " . $tulos->getQuiztype(). "</p>\n");
    print("<p>Pelaajat: " . $tulos->getPlayers()." Pisteet: ". $tulos->getPoints(). " Sijoitus: ". $tulos->getPlacement(). "</p>\n");
    print("<p>Kommentit illasta: </p>\n");
    print("<p>".$tulos->getComment()."</p>")
    ?>
<form action="naytaTulos.php" method="post">
 <input type="submit" name="fix" value="Korjaa"/>
 <input type="submit" name="save" value="Tallenna"/>
 <input type="submit" name="cancel" value="Peruuta"/>
</form>
</div>
  
</header>
</div>
<footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-large"> 
<a href="https://github.com/MaxStrandberg"></a><i class="fa fa-github w3-hover-opacity"></i>
</footer>

</body>
</html>