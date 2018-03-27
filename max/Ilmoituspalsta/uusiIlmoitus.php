<?php
require_once "ilmoitus.php";

if (isset ( $_POST ["submit"] )) {
	
} 
elseif (isset ( $_POST ["peruuta"] )) {
	header ( "location: index.php" );
	exit ();
} 
else {
} 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Myyntipaikka netissä - osta, myy &amp; vaihda!</title>
<meta name="author" content="Sirpa Marttila">
<link href="ilmoitus.css" rel="stylesheet">
<style>
label {
	display: block;
	float: left;
	width: 8em;
}
</style>
</head>
<body>
	<div class="tausta">
		<header> Myyntipaikka netissä </header>
		<nav>
			<ul>
				<li><a href="index.php">Etusivu</a></li>
				<li class="active">Ilmoita</li>
				<li><a href="">Kaikki ilmoitukset</a></li>
				<li><a href="">Hae ilmoitusta</a></li>
			</ul>
		</nav>

		<article>
			<form action="uusiIlmoitus.php" method="post">
				<fieldset>

					<legend>Ilmoittaja</legend>
					<p>
						<label>Nimi <span style="color: #B94A48">*</span></label> <input
							type="text" name="nimi" value="">
					</p>

					<p>
						<label>Sähköposti <span style="color: #B94A48">*</span></label> <input
							type="text" name="email" value="">
					</p>

					<p>
						<label>Puhelinnumero</label> <input type="text" name="puhnro"
							value="">
					</p>

					<p>
						<label>Paikkakunta <span style="color: #B94A48">*</span></label> <input
							type="text" name="paikkakunta" value="">
					</p>

				</fieldset>

				<fieldset>

					<legend>Ilmoitus</legend>
					<p>
						<label>Tyyppi</label> <select name="tyyppi">
							<option value="1">Myydään</option>
							<option value="2">Ostetaan</option>
							<option value="3">Vaihdetaan</option>
						</select>
					</p>

					<p>
						<label>Otsikko <span style="color: #B94A48">*</span></label> <input
							type="text" name="otsikko" value="">
					</p>

					<p>
						<label>Kuvaus</label>
						<textarea rows="10" name="kuvaus"></textarea>
					</p>

					<p>
						<label>Hinta <span style="color: #B94A48">*</span></label> <input
							size="16" type="text" name="hinta" value=""> &euro;
					</p>

					<p style="margin-left: 8em">
						<input class="blue" type="submit" name="submit" value="Lähetä"> <input
							class="red" type="submit" name="peruuta" value="Peruuta">
					</p>
				</fieldset>
			</form>
		</article>
	</div>
</body>
</html>
