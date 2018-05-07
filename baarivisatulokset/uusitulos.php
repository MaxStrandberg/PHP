<?php
require_once "tulos.php";

session_start();


if (isset ( $_POST ["submit"] )) {

 
    

    $result = new Tulos($_POST["place"], $_POST["address"], $_POST["date"], $_POST["quiztype"], $_POST["players"], $_POST["points"], $_POST["placement"], $_POST["comment"]);
    $_SESSION["tulos"] = $result;
    session_write_close();
    $placeError = $result->checkPlace();
    $addressError = $result->checkAddress();
    $dateError = $result->checkInputdate();
    $playerError = $result->checkPlayers();
    $pointsError = $result->checkPoints();
    $placementError = $result->checkPlacement();
    $commentError = $result->checkComment();

 
    $quiztypeError = $result->checkQuiztype();
   
    
    if ($placeError === 0 && $addressError === 0 && $dateError === 0 && $playerError === 0 && $pointsError === 0 && $placementError === 0 && $commentError === 0){
      header("location: naytaTulos.php");
      exit;
    }
  
    try { require_once "tulosPDO.php";
      $kantakasittely = new tulosPDO();
      $id = $kantakasittely->addresult($result);
      } catch (Exception $error) 
      {
      print($error->getMessage());
      }
    
    
} 
elseif (isset ( $_POST ["peruuta"] )) {
  header ( "location: index.php" );
  unset($_SESSION["tulos"]);
	exit ();
} 
else {

  if (isset($_SESSION["tulos"])){
    $result = $_SESSION["tulos"];
    $placeError = $result->checkPlace();
    $addressError = $result->checkAddress();
    $dateError = $result->checkInputdate();
 
    $quiztypeError = $result->checkQuiztype();
    $playerError = $result->checkPlayers();
    $pointsError = $result->checkPoints();
    $placementError = $result->checkPlacement();
    $commentError = $result->checkComment();


  }else{

    $result = new Tulos();
    $placeError = 0;
    $dateError = 0;
    $addressError = 0;
    $playerError = 0;
    $pointsError = 0;
    $placementError = 0;
    $commentError = 0;
    $quiztypeError = 0;

  
}

}


    

?>


<!DOCTYPE html>
<html lang="fi">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="main.css" rel="stylesheet">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Baarivisa Tulokset</title>
</head>

<body>
    
    <div class="w3-content" style="max-width:1500px">

    <header class="w3-panel w3-center w3-opacity" style="padding:12px 16px">
                <h1 class="w3-xlarge">Baarivisa Tulokset</h1>
                     
                <img src="baaripahkina.png" alt="Baaripähkinä"/>
                <div class="w3-padding-32">
                        <div class="w3-bar w3-border">
                        <a href="index.php" class="w3-bar-item w3-button">Home</a>
                        <a href="uusitulos.php" class="w3-bar-item w3-button w3-light-grey">Lisää</a>
                        <a href="tulokset.php" class="w3-bar-item w3-button">Tulokset</a>
                        <a href="asetukset.php" class="w3-bar-item w3-button w3-hide-small">Asetukset</a>
    </div>
  </div>

  </header>
  
<div class="w3-panel w3-center w3-opacity" style="padding:12px 16px">
        <h2>Lisää tulos</h2>
<form class="form-horizontal" action="uusitulos.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="place">Paikka:<span style="color: #f64d78">*</span></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="place" name="place" placeholder="Lisää paikka" value="<?php print (htmlentities($result->getPlace(), ENT_QUOTES, "UTF-8")); ?>">
      <br>
      <p  style="color: red"><span><?php  print($result->getError($placeError)); ?></span></p>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="address">Osoite (muodossa: katu numero, kaupunki):<span style="color: #f64d78"></span></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="address" name="address" placeholder="Lisää osoite" value="<?php print (htmlentities($result->getAddress(), ENT_QUOTES, "UTF-8")); ?>">
      <br>
      <p  style="color: red"><span><?php  print($result->getError($addressError)); ?></span></p>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="date">Päivämäärä (muodossa pp/kk/vvvv):<span style="color: #f64d78">*</span></label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="date" value="<?php print (htmlentities($result->getDate(), ENT_QUOTES, "UTF-8")); ?>" name="date">
      <br>
      <p  style="color: red">
      <span><?php  print($result->getError($dateError)); ?></span></p>
     
    </div>
  </div>

  <div class="form-group">
   
  <label class="control-label col-sm-2">Valitse visan tyyppi<span style="color: #f64d78">*</span></label>
   <div class="col-sm-10">
   <input type="hidden" name="quiztype" value="Q">
   <table class="center">
  <tr>
    <th>Ranking</th>
    <th>Finaali</th>
    <th>Laiva</th>
  </tr>
  <tr>
    <th><input type="radio" class="form-control"  value="Ranking" name="quiztype" 
    <?php 
    if (htmlentities($result->getQuiztype(), ENT_QUOTES, "UTF-8") === "Ranking"){
    print("checked");
  }else
    {
      print("unchecked");
    }
    ?>  ></th>
    <th><input type="radio" class="form-control"  value="Finaali" name="quiztype"  
    <?php 
    if (htmlentities($result->getQuiztype(), ENT_QUOTES, "UTF-8") === "Finaali"){
    print("checked");
  }else
    {
      print("unchecked");
    }
    ?>   ></th>
    <th><input type="radio" class="form-control"  value="Laiva"   name="quiztype"  <?php 
    if (htmlentities($result->getQuiztype(), ENT_QUOTES, "UTF-8") === "Laiva"){
    print("checked");
  }else
    {
      print("unchecked");
    }
    ?>   ></th>
  </tr>

 
 </table>
    
   </div>
   
   <p  style="color: red">
     <span><?php  print($result->getError($quiztypeError)); ?></span></p>
 </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="players">Pelaaja määrä (1-5):<span style="color: #f64d78">*</span></label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="players" name="players" value="<?php print (htmlentities($result->getPlayers(), ENT_QUOTES, "UTF-8")); ?>"><br>
      <p  style="color: red">
      <span><?php  print($result->getError($playerError)); ?></span></p>
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2" for="points">Pisteet (max. 60):<span style="color: #f64d78">*</span></label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="points" name="points" value="<?php print (htmlentities($result->getPoints(), ENT_QUOTES, "UTF-8")); ?>"><br>
      <p  style="color: red">
      <span><?php  print($result->getError($pointsError)); ?></span></p>
    </div>
  </div>

   <div class="form-group">
    <label class="control-label col-sm-2" for="placement">Sijoitus:<span style="color: #f64d78">*</span></label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="placement" name="placement" value="<?php print (htmlentities($result->getPlacement(), ENT_QUOTES, "UTF-8")); ?>"><br>
      <p  style="color: red">
      <span><?php  print($result->getError($placementError)); ?></span></p>
    </div>
  </div>

    <div class="form-group">
    <label class="control-label col-sm-2" for="comment">Kommentit:</label>
    <div class="col-sm-10">
    <textarea class="form-control" rows="5" id="comment" name="comment" >
    <?php print (htmlentities($result->getComment(), ENT_QUOTES, "UTF-8")); ?>
    </textarea><br>
    <p  style="color: red">
    <span><?php  print($result->getError($commentError)); ?></span></p>
    </div>
  </div>

  <div class="form-group">
  <p style="font-size:75%;">(<span style="color: #f64d78">*</span> Pakollisia kenttiä)</p>
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-secondary">Submit</button>
      <button type="submit" name="peruuta" class="btn btn-secondary">Peruuta</button>
    </div>
  </div>

  
</form> 

  </div>



</div>
<footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-large"> 
<a href="https://github.com/MaxStrandberg"></a><i class="fa fa-github w3-hover-opacity"></i>
</footer>

</body>
</html>