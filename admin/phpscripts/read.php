<?php
// get all of something
function getAll($tbl){
	include('connect.php');
	$queryAll = "SELECT * FROM {$tbl}";
	$runAll = mysqli_query($link, $queryAll);
	if($runAll){
		return $runAll;
	}else{
		$error ="there was an error accessing this info. Please contact your admin.";
		return $error;
	}

	mysqli_close($link);
}

function getSingle($tbl,$col,$id){
	include('connect.php');
	$querySingle = "SELECT * FROM {$tbl} WHERE {$col} = {$id}";

	$runSingle = mysqli_query($link, $querySingle);
	if($runSingle){
		return $runSingle;
	}else{
		$error ="there was an error accessing this info. Please contact your admin.";
		return $error;
	}
		mysqli_close($link);
}


function filterType($tbl,$tbl2, $tbl3, $col, $col2, $col3, $filter){
//convert your SQL query from phpmyadmin to variables, variablesin final query need to be in curly brackets
//$tbl = "tbl_movies";
//$tbl2 ="tbl_genre";
//$tbl3 = "tbl_mov_genre";
//$col="movies_id";
//$col2 = "genre_id";
//$col3 = "genre_name";
//$filter
//move all of the above variables to the index page or whereever the condition is set

include('connect.php');
$queryFilter="SELECT * FROM {$tbl} , {$tbl2}, {$tbl3} WHERE {$tbl}.{$col} = {$tbl3}.{$col} AND {$tbl2}.{$col2} = {$tbl3}.{$col2}  AND {$tbl2}.{$col3}= '{$filter} '";

//echo $queryFilter; //to test if the queries working copy and paste in the SQL section phpmyadmin

$runFilter = mysqli_query($link, $queryFilter);

if($runFilter){
	return $runFilter;
}else{
	$error = "There was an error accesing this info";
	return error;
}

mysqli_close($link);

}
?>
