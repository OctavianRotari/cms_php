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

function findRowInDb($tableName, $getValue, $idName){
	global $connection;
	if(isset($_GET[$getValue])){
		$row_id = $_GET[$getValue];
		$result = readFromDb($tableName, " WHERE {$idName}_id={$row_id}");
		while($row = mysqli_fetch_assoc($result)){
			return $row;
		}
	}
}

function deleteRowFromDb($tableName, $getValue, $idName){
	global $connection;
	if(isset($_GET[$getValue])){
		$row_id = $_GET[$getValue];
		$query = "DELETE FROM {$tableName} ";
		$query .= "WHERE {$idName}_id={$row_id}";
		$delete_category = mysqli_query($connection, $query);
		header("Location: {$tableName}.php");
		if(!$delete_category){
			die('Cant delete because ' . mysqli_error($connection));
		}
	}

}
?>
