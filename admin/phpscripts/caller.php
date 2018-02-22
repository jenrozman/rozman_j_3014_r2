<?php 
//This file is NOT called through config.php!!!  DONT ADD IT TO CONFIG
	//when someone clicks on the link(logout), get the value from GET and trigger a php function, like an event listener
	require_once('config.php');//need some of the functionality in config
	if(isset($_GET['caller_id'])){
		$dir = $_GET['caller_id']; //dir=directory
			if($dir == "logout"){
				logged_out();
			}else{
				echo "Caller id was passed incorrectly"; //not best practice, but good for debugging
			}
	}

?>