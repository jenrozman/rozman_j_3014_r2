<?php
	require_once('admin/phpscripts/config.php');
	if(isset($_GET['id'])) {
		//get the movie
		$tbl = "tbl_movies";
		$col = "movies_id";
		$id = $_GET['id'];
		$getMovie = getSingle($tbl, $col, $id);
	}//cant go to the details specifically, start at what calls this page

	
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Details</title>
</head>
<body>

<?php
	if(!is_string($getMovie)) {
			$row=mysqli_fetch_array($getMovie);//dont need a loop since its only 1 result coming back
	echo "<img src=\"images/{$row['movies_cover']}\" alt=\"{$row['movies_title']}\">
	<p>{$row['movies_title']}</p>
	<p>{$row['movies_year']}</p>
	<p>{$row['movies_storyline']}</p>
	<a href=\"index.php\">Back...</a>
	";
	}else{
		echo "<p>{$getMovie}</p>";
	}




?>

</body>
</html>