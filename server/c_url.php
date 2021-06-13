<?php

	function curl ($url){
	  //Inisiasi session CURL
	  	$init = curl_init();
	  	
	  	//Set URL
	  	curl_setopt($init, CURLOPT_URL, $url);
	  	
	  	//Return as string
	  	curl_setopt($init, CURLOPT_RETURNTRANSFER, 1);
	  	
	  	//Execution session
	  	$result = curl_exec($init);
	  	
	  	//Close session
	  	curl_close($init);
	  	
	  	//Decode result
	  	$result = json_decode($result, true);
	  	return $result;
	}
	

?>