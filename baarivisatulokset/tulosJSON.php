<?php

try {
    require_once "tulosPDO.php";
    $kantakasittely = new tulosPDO();
    if (isset ( $_GET ["place"] )) {

		
		$tulos = $kantakasittely->searchResult( $_GET ["place"] );
		
		
		print (json_encode ( $tulos )) ;
	} 	
	
	else {
		$tulos = $kantakasittely->allResults();
	
	
		print(json_encode($tulos));
	}
} catch ( Exception $error ) {
}

?>