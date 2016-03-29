<?php
function readFromDb($table, $queryExtention = NULL){
	global $connection;
	$query = "SELECT * FROM $table";
	if($queryExtention){
		$query = $query . $queryExtention;
	}
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("can't get data from db" . $query . mysqli_error($connection));
	}
	return $result;
}

function findRowsInDb($tableName, $id, $columnName, $extendQuery = NULL){
	global $connection;
	if(isset($_GET[$id])){
		$table_id = $_GET[$id];
		$column = $columnName;
		$query = " WHERE {$column} = {$table_id}";
		if($extendQuery){
			$query .= $extendQuery;
		}
		$result = readFromDb($tableName, $query);
		return $result;
	}
}

?>
