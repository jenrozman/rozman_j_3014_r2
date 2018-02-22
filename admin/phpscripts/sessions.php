<?php

	session_start();
	function confirm_logged_in(){//protects pages
		if(!isset($_SESSION['user_id'])){//if session hasnt been set
			redirect_to("admin_login.php");
		}
}
		function logged_out(){
				session_destroy(); //actually destroy session
				redirect_to("../admin_login.php");
				//make sure you think of where you are in the file directory, this page is inside of phpscripts, but admin_login is out of it in the admin
		}
//actually destroy session
?>