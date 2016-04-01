<?php

function signIn(){
	if(isset($_POST['sign_in'])){
		global $connection;
		global $msg;
		$user_name = escape($_POST['user_name']);
		$user_password = escape($_POST['user_password']);
		$user_password = encryptPassword($user_password);
		$result = readFromDb('users', " WHERE user_name='{$user_name}' AND user_password='{$user_password}'");
		$row = mysqli_fetch_assoc($result);
		if($row['user_name'] == $user_name || $row['user_password'] == $user_password){
			$_SESSION['auth'] = 'true';
			$_SESSION['user_name'] = $row['user_name'];
			$_SESSION['user_role'] = $row['user_role'];
			$_SESSION['user_id'] = $row['user_id'];
			header("Location:admin/index.php");
		} else {
			$url = $_SERVER['REQUEST_URI'];
			$msg->error('Password or username not correct', $url);
		}
	}
}

function selectLastIdFromUsers(){
	global $connection;
	$query = "SELECT user_id FROM users ORDER BY user_id DESC LIMIT 1";
	$read_id = mysqli_query($connection, $query);
	$user_id = mysqli_fetch_assoc($read_id);
	return $user_id['user_id'];
}

function checkIfDetailsAlreadyPresentInDb($key, $value){
	$result = readFromDb('users', " WHERE user_{$key}='{$value}'");
    $number_of_results = $result->num_rows;
	return $number_of_results;
}

function addNewUser(){
	global $connection;
	global $msg;
	if(isset($_POST['create_account'])){
		$user_name  = escape($_POST['user_name']);
		$user_password  = escape($_POST['user_password']);
		$user_firstname = escape($_POST['user_firstname']);
		$user_image  = escape($_FILES['user_image']['name']);
		$user_image_temp  = escape($_FILES['user_image']['tmp_name']);
		$user_secondname  = escape($_POST['user_secondname']);
		$user_email = escape($_POST['user_email']);
		$user_role = 'user';
		$user_password = encryptPassword($user_password);
		$username_present = checkIfDetailsAlreadyPresentInDb('name', $user_name);
		$email_present = checkIfDetailsAlreadyPresentInDb('email', $user_email);
		$empty_values = checkIfFieldEmpty();
		if ($empty_values !== 0 ){
			$msg->error('Fill in all the fields', 'posts.php?source=create_account');
		} else if($username_present !== 0){
			$msg->error('Username already taken', 'posts.php?source=create_account');
		} else if($email_present !== 0){
			$msg->error('Email already taken', 'posts.php?source=create_account');
		} else {
			move_uploaded_file($user_image_temp, "images/$user_image");
			$query ="INSERT INTO users(user_name, ";
			$query .= "user_password, user_firstname, user_secondname, user_email, ";
			$query .= "user_image, user_role)";
			$query .= " VALUE('$user_name', '$user_password', ";
			$query .= "'$user_firstname', '$user_secondname', '$user_email', ";
			$query .= "'$user_image', '$user_role')";
			$adding_new_user = mysqli_query($connection, $query);
			ifQueryFail($adding_new_user);
			$new_user_id = selectLastIdFromUsers();
			$_SESSION['auth'] = 'true';
			$_SESSION['user_name'] = $user_name;
			$_SESSION['user_role'] = $user_role;
			$_SESSION['user_id'] = $new_user_id;
			header("Location:admin/index.php");
		} 
	}
}
?>
