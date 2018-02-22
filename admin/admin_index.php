<?php
	require_once('phpscripts/config.php');
	 confirm_logged_in(); //if doesn't log in, you can't just type in the url or if someone bookmarks the page
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel login!</title>
</head>
<body>
<h2><?php echo $_SESSION['user_name'];?></h2>

<a href="admin_createuser.php">Create User</a>
<a href="phpscripts/caller.php?caller_id=logout">Sign Out</a> <!--trigger php function-->
</body>
</html>