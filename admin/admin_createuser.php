<?php
	require_once('phpscripts/config.php');
	 confirm_logged_in(); //if doesn't log in, you can't just type in the url or if someone bookmarks the page. comment out when working on it, then add back when it's done

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		$email = trim($_POST['email']);
		$userlvl = $_POST['userlvl']; //don't need trim on the list because it's just a suggestion
		if(empty($userlvl)){//see if userlvl is empty
			$message = "Please select a user level.";
		} else{
			$result = createUser($fname, $username, $password, $email, $userlvl);
			$message = $result;
			$sendMessage =  submitUser($email, $username, $password);
		}
	}

	function randomPw($alpha = 2, $num = 3, $char = 1) {//6 char pw
	    $pass_order = Array();
	    $passWord = '';
  		for ($i = 0; $i < $alpha; $i++) {
	        $pass_order[] = chr(rand(65, 90));//65-90 are letters
	    }
	    for ($i = 0; $i < $num; $i++) {
	        $pass_order[] = chr(rand(48, 57)); //numbers
	    }
			for ($i = 0; $i < $char; $i++) {
		         $pass_order[] = chr(rand(33, 47));// random symbols like ? * ()
		     }
	    shuffle($pass_order);//randomizes the order of the letters/#/symbols

	    foreach ($pass_order as $char) { //gives a set pw
	        $passWord .= $char;
	    }	    return $passWord;	}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Create User!</title>
</head>
<body>

<h2>Create Username</h2>
<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_createuser.php" method="post">

		<label>First Name:</label>
		<input type="text" name="fname" value=""><br><br>
		<label>Username:</label>
		<input type="text" name="username" value=""><br><br>
		<label>Password:</label>
		<input type="text" readonly name="password" value="<?php echo "\n".randomPw()."\n"; ?>"><br>	<br><!--Lock Input so they have to use the random password-->
		<label>Email:</label>
		<input type="text" name="email" value=""><br><br>
		<select name="userlvl">
			<option value="">Select User Level</option><!--leave blank so it explains it and we can trigger an error if they leave this blank-->
			<option value="2">Web Admin</option> <!--user # not text for value-->
			<option value="1">Web Master</option>
		</select><br><br>
		<input type="submit" name="submit" value="Create User">


	</form>

</body>
</html>
