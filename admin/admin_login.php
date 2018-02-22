<?php
	require_once('phpscripts/config.php');
	$ip = $_SERVER['REMOTE_ADDR']; //working with ip address'. we want to track b.c if they try and attack you know from where. also because it could be a client request. ie. you can only login at the office. or tracking
	//echo $ip; //will show up localhost ip 127.0.0.1 for local host
	if(isset($_POST['submit'])){
		//echo "Working!";//wont show up until you hit submit
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);//when you copy+paste a temp psw, you can sometimes grab whitespace by accident, thats why it doesnt work sometimes. trim removes that
		if($username !== "" && $password !== ""){	//checks for other accounts only if both fields are filled out != is okay, !== is not okay
			// "" is empty " " is not
			$result = logIn($username, $password, $ip);
			$message = $result;
		}else{ //not filled out
			$message = "Please fill out the required fields";
		}
	}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel login!</title>
</head>
<body>
<?php
	if(!empty($message)){ echo $message;}//onlyruns when empty with a msg?>
	<form action="admin_login.php" method="post">
		<label>Username</label>
		<input type="text" name="username" value="">

		<label>Password</label>
		<input type="password" name="password" value="">
		<br>
		<input type="submit" name="submit" value="Show me the money!">
	</form>

</body>
</html>
