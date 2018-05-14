<?php
require_once "tulos.php";


session_start();
    $valittuID = "";

    $_SESSION['valittuID'] = $valittuID;
  
    if (isset ($_POST["delete"])){
      try{
      require_once "tulosPDO.php";
      $_SESSION['valittuID'] = $valittuID;
      $kantakasittely = new tulosPDO();
      $id = $kantakasittely->deleteResult();
      }catch (Exception $error) {
        print($error->getMessage());
      }
      header("location: tulokset.php");
   
      exit;
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
                <img src="baaripahkina.png" alt="logo"/>     
  
                        <div class="w3-padding-32">
                        <div class="w3-bar w3-border">
                        <a href="index.php" class="w3-bar-item w3-button">Home</a>
                        <a href="uusitulos.php" class="w3-bar-item w3-button ">Lisää</a>
                        <a href="tulokset.php" class="w3-bar-item w3-button w3-light-grey">Tulokset</a>
                        <a href="haeTulos.php" class="w3-bar-item w3-button ">Hae Tulosta</a>
                        <a href="asetukset.php" class="w3-bar-item w3-button w3-hide-small">Asetukset</a>
    </div>
  </div>
  <div class="w3-row-padding w3-grayscale" style="margin-bottom:128px">
        <h2>Tulokset</h2>

    <?php
        try {
          require_once "tulosPDO.php";
          $kanta = new tulosPDO();
          $rivit = $kanta->allResults();
          foreach ($rivit as $result) {
          print("<p>Paikka: " . $result->getPlace());
          print("<br>Päivämäärä: " . $result->getDate()."</p>");
          print("<form action='tiettyTulos.php' method='get'> ");
          print("<input type='hidden' name='valittuID' value='". $result->getId())."'/> ";
          print("<input type='submit' name='show' value='Näytä'/></form>");
          print("<form action='' method='post'><input type='hidden' name='valittuID' value='". $result->getId()."'/><input type='submit' name='delete' value='Poista'/>");
          print("</form>");
                }
            } catch (Exception $error) {
              print($error->getMessage());
                                        }
?>

  </div>
  
</header>
</div>
<footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-large"> 
<a href="https://github.com/MaxStrandberg"></a><i class="fa fa-github w3-hover-opacity"></i>
</footer>

</body>
</html>