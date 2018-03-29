<?php
require_once "tulos.php";

if (isset ( $_POST ["submit"] )) {
    $result = new Tulos($_POST["place"], $_POST["date"], $_POST["players"], $_POST["points"], $_POST["placement"], $_POST["comment"]);

    $placeError = $result->checkPlace();
    $dateError = $result->checkDate();
    $playerError = $result->checkPlayers();
    $pointsError = $result->checkPoints();
    $placementError = $result->checkPlacement();
    $commentError = $result->checkComment();
} 
elseif (isset ( $_POST ["peruuta"] )) {
	header ( "location: index.php" );
	exit ();
} 
else {
    $result = new Tulos();

    $placeError = 0;
    $dateError = 0;
    $playerError = 0;
    $pointsError = 0;
    $placementError = 0;
    $commentError = 0;
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
<link href="ilmoitus.css" rel="stylesheet">
<title>Baarivisa Tulokset</title>
<style type="text/css">

</style>
</head>

<body>
    <div class="w3-content" style="max-width:1500px">

    <header class="w3-panel w3-center w3-opacity" style="padding:128px 16px">
                <h1 class="w3-xlarge">Baarivisa Tulokset</h1>
                        
  
                        <div class="w3-padding-32">
                        <div class="w3-bar w3-border">
                        <a href="index.php" class="w3-bar-item w3-button">Home</a>
                        <a href="uusitulos.php" class="w3-bar-item w3-button w3-light-grey">Lisää</a>
                        <a href="#" class="w3-bar-item w3-button">Lista</a>
                        <a href="#" class="w3-bar-item w3-button w3-hide-small">Asetukset</a>
    </div>
  </div>
  <div class="w3-row-padding w3-grayscale" style="margin-bottom:128px">
        <h2>Lisää tulos</h2>
<form class="form-horizontal" action="uusitulos.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="place">Paikka:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="place" name="place" placeholder="Lisää paikka" value="<?php print (htmlentities($result->getPlace(), ENT_QUOTES, "UTF-8")); ?>">
      <br>
      <p  style="color: red"><span><?php  print($result->getError($placeError)); ?></span></p>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="date">Päivämäärä:</label>
    <div class="col-sm-10">
      <input type="date" type="datetime-local" class="form-control" id="date" value="<?php print (htmlentities($result->getDate(), ENT_QUOTES, "UTF-8")); ?>" name="date" placeholder="Syötä Päivämäärä">
      <br>
      <p  style="color: red">
      <span><?php  print($result->getError($dateError)); ?></span></p>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="players">Pelaaja määrä:</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="players" name="players" value="<?php print (htmlentities($result->getPlayers(), ENT_QUOTES, "UTF-8")); ?>"><br>
      <p  style="color: red">
      <span><?php  print($result->getError($playerError)); ?></span></p>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="points">Pisteet:</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="points" name="points" value="<?php print (htmlentities($result->getPoints(), ENT_QUOTES, "UTF-8")); ?>"><br>
      <p  style="color: red">
      <span><?php  print($result->getError($pointsError)); ?></span></p>
    </div>
  </div>

   <div class="form-group">
    <label class="control-label col-sm-2" for="placement">Sijoitus:</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="placement" name="placement" value="<?php print (htmlentities($result->getPlacement(), ENT_QUOTES, "UTF-8")); ?>"><br>
      <p  style="color: red">
      <span><?php  print($result->getError($placementError)); ?></span></p>
    </div>
  </div>

    <div class="form-group">
    <label class="control-label col-sm-2" for="comment">Kommentit:</label>
    <div class="col-sm-10">
    <textarea class="form-control" rows="5" id="comment" name="comment" value="<?php print (htmlentities($result->getComment(), ENT_QUOTES, "UTF-8")); ?>"></textarea><br>
    <p  style="color: red">
    <span><?php  print($result->getError($commentError)); ?></span></p>
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-default">Submit</button>
      <button type="submit" name="peruuta" class="btn btn-default">Peruuta</button>
    </div>
  </div>

  
</form> 

  </div>


<footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-large"> 
<a href="https://github.com/MaxStrandberg"><i class="fa fa-github w3-hover-opacity"/></i>
</footer>
</header>
</body>
</html>