<?php

	//to get everything form the table, doesnt matter which table, you can tell it later which table to target
	function getAll($tbl){//get everything
		include('connect.php');
		$queryAll = "SELECT * FROM {$tbl}"; //use instead of hard code like tbl_movies. now just cares about the table.
		$runAll = mysqli_query($link, $queryAll); //link access db, and query string
		if($runAll){ //return the getall from index, send it to what called it(get movies). if run is an object do this
			return $runAll;
		}else{
			$error = "There was a problem accessing this information. sorry dude.";
			return $error;
		}
		mysqli_close($link);//keep it open, then close it at a certain time. the link is from the connect.php, destroys the connection. always need after an include
	}
//we can use this for any table not just one kind.	

//get one item from any table
function getSingle($tbl, $col, $id) {
	include('connect.php');
	$querySingle = "SELECT * FROM {$tbl} WHERE {$col} = {$id}";
	$runSingle = mysqli_query($link, $querySingle);

	if($runSingle){
		return $runSingle;
	}else{
		$error = "There was a problem accessing this information. sorry dude.";
		return $error;
	}

}
function  filterResults($tbl, $tbl2, $tbl3, $col, $col2, $col3, $filter){
	include('connect.php');
	/*$tbl1 = "tbl_movies";
	$tbl2 = "tbl_genre";
	$tbl3 = "tbl_mov_genre";
	$col = "movies_id";
	$col2 = "genre_id";
	$col3 = "genre_name";
	$filter = "action"; YOU CAN DELETE THIS BECAUSE ITS IN FILTER RESULTS*/

	$filterQuery = "SELECT * FROM {$tbl}, {$tbl2}, {$tbl3}
	 WHERE {$tbl}.{$col} = {$tbl3}.{$col} AND {$tbl2}.{$col2} = {$tbl3}.{$col2} AND {$tbl2}.{$col3}='{$filter}'";
	//echo $filterQuery;
	 $runQuery = mysqli_query($link, $filterQuery);
	 if($runQuery){
	 	return $runQuery;
	 }else{
	 	$error = "There was a problem accessing this information. sorry dude.";
		return $error;
	 }
 mysqli_close($link);
}

?>