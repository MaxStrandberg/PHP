<!DOCTYPE html> 
<html> 
<head> 
<meta charset="UTF-8">   
<title>Esimerkki</title> 
</head> 
<body> 

<?php 
  
    $aika = time();
    $paiva = date("D j.n.Y", $aika);
    $kello = date("G:i", $aika);

    print ("<p style = 'color: gold'> heräsit $paiva $kello</p>\n");

    $nimi = "MaX stRanDbErg";
    list($etunimi, $sukunimi) = explode(" ", $nimi);
    $sukunimi=mb_convert_case($sukunimi,MB_CASE_TITLE,"UTF-8");
    $etunimi=mb_convert_case($etunimi,MB_CASE_TITLE,"UTF-8");
    print("<p>Nimi on: $sukunimi $etunimi </p>")
?> 
</body> 
</html>
