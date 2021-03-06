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
<script src="http://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
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
                        <a href="tulokset.php" class="w3-bar-item w3-button">Tulokset</a>
                        <a href="haeTulos.php" class="w3-bar-item w3-button w3-light-grey">Hae Tulosta</a>
                        <a href="asetukset.php" class="w3-bar-item w3-button w3-hide-small">Asetukset</a>
    </div>
  </div>
  <div class="w3-row-padding w3-grayscale" style="margin-bottom:128px">
        <h2>Hae tulosta</h2>
        <p>Kirjoita baarin nimi mistä haluat löytää tuloksen</p>
        <form action="" method="post">
			<input type="text" id="place" name="place">
			
			<input type="button" id="hae" name="hae" value="Hae">
		</form>

        <div class="w3-row-padding w3-grayscale" style="margin-bottom:128px" id="lista"></div>
    <script>
        $(document).on("ready", function() {
            $("#hae").on("click", function() {
            $. ajax({
                    url: "tulosJSON.php",
                    method: "get",
                    data: {place: $("#place").val()},
                    dataType: "json",
                    timeout: 5000
                    })
            

        .done(
                function(data) {
                        $("#lista").html("");
                        for(var i = 0; i < data.length; i++) {
                                $("#lista").append("<p>Paikka: " + data[i].place +
                                "<br>Päivämäärä: " + data[i].date +
                                "<br>Pisteet: " + data[i].points +
                                "<br>Sijoitus: " + data[i].placement + "</p>");
                                                            } //for
                                }) //done
        .fail (function() {
            $("#lista").html("<p>Listausta ei voida tehdä</p>");
                        });  

            });  
});
</script>


  </div>
  
</header>
</div>
<footer class="w3-container w3-padding-64 w3-light-grey w3-center w3-large"> 
<a href="https://github.com/MaxStrandberg"></a><i class="fa fa-github w3-hover-opacity"></i>
</footer>

</body>
</html>