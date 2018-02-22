<?php
//specifically for only people logging in
	function logIn($username, $password, $ip){ //user+psw is a go
		require_once('connect.php');
		$username = mysqli_real_escape_string($link, $username);//cleans it in the db and places it back in the data. mysql is old, mysqli is new. Removes certain characters line a ' or ". Replaces with real characters instead of opening/closing strings
		//DO ^ EVERY TIME WITH AN INPUT FIELD
		$password = mysqli_real_escape_string($link, $password);
		$loginstring = "SELECT * FROM tbl_user WHERE user_name='{$username}' AND user_pass='{$password}'";
		//echo $loginstring;
		$user_set = mysqli_query($link, $loginstring);
		//find out of the user actually exists
		//asking for the #rows in the object, real=1 fake=0	
		//echo mysqli_num_rows($user_set);
		if(mysqli_num_rows($user_set)){
			$founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			$id = $founduser['user_id'];
		echo $id;
		
		//temp on the browser, gets destroyed
		$_SESSION['user_id'] = $id;
		$_SESSION['user_name'] = $founduser['user_fname'];
		if(mysqli_query($link, $loginstring)){
			$update = "UPDATE tbl_user SET user_ip='{$ip}' WHERE user_id={$id}"; //update user tbl with ip address
			$updateQuery = mysqli_query($link, $update);
		}
			redirect_to("admin_index.php");
}else{//if they spell something wrong
	$message = "learn how to type, idiot";
	return $message;
}
	mysqli_close($link);
	}	
?> 