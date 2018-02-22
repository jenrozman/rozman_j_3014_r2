<?php

	function createUser($fname, $username, $password, $email, $userlvl){
			include('connect.php');
			$userstring = "INSERT INTO tbl_user VALUES(NULL, '{$fname}', '{$username}', '{$password}','{$email}', NULL, '{$userlvl}', 'no')";
			//must be a 1:1 column match. have to follow order of columns in db. null#1 for id. nul#2 is for date
			//echo $userstring;

			$userquery = mysqli_query($link, $userstring);

				if($userquery){//Something here is broken, it's not sending when you hit submit
					redirect_to("admin_index.php");//if works, send to index

				}else{
						$message = "This did not work, it was aliens.";
						return $message;
				}
			mysqli_close($link);
	}
?>
