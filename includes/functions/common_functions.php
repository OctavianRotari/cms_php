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

function escape($value){
	global $connection;
	return mysqli_real_escape_string($connection, $value);
}

function countRowsInDb($table, $query = NULL){
	$result = readFromDb($table, $query);
	$numOfRows = mysqli_num_rows($result);
	return $numOfRows;
}

function encryptPassword($user_password){
	$rand_salt = "thesearemytwentytwocha";
	$hash_format = "$2y$10$";
	$hash_and_salt = $hash_format . $rand_salt;
	$user_password_hashed = crypt($user_password, $hash_and_salt);
	return $user_password_hashed;
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

function ifQueryFail($nameOfQuery){
	global $connection;
	if(!$nameOfQuery){
		die("Query fail " . mysqli_error($connection));
	}
}

function signOut(){
	if(isset($_GET['signOut'])){
		session_start();
		session_unset();
		session_destroy();
		header('location:index.php');
	}
}
?>
