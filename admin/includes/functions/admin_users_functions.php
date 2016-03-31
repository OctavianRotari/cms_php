<?php

function addNewUser(){
	global $connection;
	global $msg;
	if(isset($_POST['add_new_user'])){
		$user_name  = $_POST['user_name'];
		$user_password  = $_POST['user_password'];
		$user_firstname = $_POST['user_firstname'];
		$user_image  = $_FILES['user_image']['name'];
		$user_image_temp  = $_FILES['user_image']['tmp_name'];
		$user_secondname  = $_POST['user_secondname'];
		$user_email = $_POST['user_email'];
		$user_role = $_POST['user_role'];
		$rand_salt = '12345';
		$submited_form = $_POST;
		$empty_values = 0;
		foreach( $submited_form  as $key => $value){
			if(empty($value)){
				$empty_values += 1;
			}
		}
		if ($empty_values === 0 ){
			move_uploaded_file($user_image_temp, "../images/$user_image");
			$query ="INSERT INTO users(user_name, ";
			$query .= "user_password, user_firstname, user_secondname, user_email, ";
			$query .= "user_image, user_role, rand_salt)";
			$query .= " VALUE('$user_name', '$user_password', ";
			$query .= "'$user_firstname', '$user_secondname', '$user_email', ";
			$query .= "'$user_image', '$user_role', '$rand_salt')";
			$adding_new_user = mysqli_query($connection, $query);
			$msg->success('User created', 'users.php');
			if(!$adding_new_user){
				die("Query fail " . mysqli_error($connection));
			}
		} else {
			$msg->error('Fill in all the fields', 'users.php');
		}
	}
}

function updateUserInDb(){
	global $connection;
	global $msg;
	if(isset($_POST['edit_user'])){
		$user_id = $_GET['id'];
		$user_name  = $_POST['user_name'];
		$user_password  = $_POST['user_password'];
		$user_firstname = $_POST['user_firstname'];
		$user_image  = $_FILES['user_image']['name'];
		$user_image_temp  = $_FILES['user_image']['tmp_name'];
		$user_secondname  = $_POST['user_secondname'];
		$user_email = $_POST['user_email'];
		$user_role = $_POST['user_role'];
		$submited_form = $_POST;
		$empty_values = 0;
		foreach( $submited_form  as $key => $value){
			if(empty($value)){
				$empty_values += 1;
			}
		}
		if ($empty_values === 0 ){
			move_uploaded_file($user_image_temp, "../images/$user_image");
			$query ="UPDATE users SET ";
			$query .= "user_name='{$user_name}', ";
			$query .= "user_password='{$user_password}', ";
			$query .= "user_firstname='{$user_firstname}', ";
			$query .= "user_secondname='{$user_secondname}', ";
			$query .= "user_email='{$user_email}', ";
			if($_FILES['user_image']['size'] > 0){
				$query .= " user_image='{$user_image}', ";
			}
			$query .= "user_role='{$user_role}' ";
			$query .= "WHERE user_id='{$user_id}'";
			$updateUser = mysqli_query($connection, $query);
			$msg->success('User updated', 'users.php');
			if(!$updateUser){
				die("Query fail " . mysqli_error($connection));
			}
		} else {
			$msg->error('Fill in all the fields', 'users.php');
		}
	}
}

function displayContentUsersPage(){
	if(isset($_GET['source'])){
		$source = $_GET['source'];
	} else {
		$source = '';
	}
	switch($source){
		case 'add_user';
		include "includes/user_new.php";
		break;
		case 'edit_user';
		include "includes/user_edit.php";
		break;
		default:
		include "includes/users_table.php";
		break;
	}
}

?>
