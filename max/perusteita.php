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
    print("<p>Nimi on: $sukunimi $etunimi </p>");

    $pvm = "27.03.2018";

    if (preg_match("/\d{1,2}\.\d{1,2}\.\d{4}/", $pvm)){
        print("<p>Oikein laitettu pvm</p>");
        list($pp, $kk, $vvvv) = explode(".", $pvm);
        if (checkdate($kk , $pp , $vvvv)){
            print("<p>Kelvollinen päivämäärä</p>");
        }else{
            print("<p>Ei kelpaa päivämäärä</p>");
        }
    }
     else {
        print("<p>Väärä pvm</p>");
    }
    
    $hinta = "12.50";
    
    if (preg_match("/^\d+(\.\d{2})?$/", $hinta)){
        print("Hinta ok");
    }else{
        print("Hinta ei mitenkään ole ok");
    }
?> 
</body> 
</html>
