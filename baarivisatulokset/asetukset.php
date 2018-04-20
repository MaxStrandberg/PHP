<?php
$name = " ";
if (isset($_POST["submit"])) {		 
   $name = $_POST["name"] ;
   setcookie("nimi", $name, time() + 60*60*24*7);
   header("Location: index.php");
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
                        <a href="asetukset.php" class="w3-bar-item w3-button w3-hide-small w3-light-grey">Asetukset</a>
    </div>
  </div>
  <div class="w3-row-padding w3-grayscale" style="margin-bottom:128px">
        <h2>Asetukset</h2>
        <div class="w3-panel w3-center w3-opacity" style="padding:12px 16px">
        <form action="" method="post">
        <p>Laita nimi sivulle: </p>
        <input type="input" name="name" type="text" size="20" 
        value="<?php 
        if (isset($_COOKIE["nimi"])){
          print($_COOKIE["nimi"]);
        }else {
          print(" ");
        } ?>"/>
        <input name="submit" type="submit" value="Lisää">
        </form>
        </div>
  </div>
  
</header>
</div>
<footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-large"> 
<a href="https://github.com/MaxStrandberg"></a><i class="fa fa-github w3-hover-opacity"></i>
</footer>

</body>
</html>