<?php

function updateProfileInDb(){
	global $connection;
	global $msg;
	if(isset($_POST['edit_profile'])){
		$user_id = escape($_SESSION['user_id']);
		$user_name  = escape($_POST['user_name']);
		$user_password  = escape($_POST['user_password']);
		$user_firstname = escape($_POST['user_firstname']);
		$user_image  = escape($_FILES['user_image']['name']);
		$user_image_temp  = escape($_FILES['user_image']['tmp_name']);
		$user_secondname  = escape($_POST['user_secondname']);
		$user_email = escape($_POST['user_email']);
		$empty_values = checkIfFieldEmpty($_POST);
		if ($empty_values === 0 ){
			move_uploaded_file($user_image_temp, "../images/$user_image");
			$query ="UPDATE users SET ";
			$query .= "user_name='{$user_name}', ";
			$query .= "user_firstname='{$user_firstname}', ";
			$query .= "user_secondname='{$user_secondname}', ";
			if($_FILES['user_image']['size'] > 0){
				$query .= " user_image='{$user_image}',";
			}
			$query .= "user_email='{$user_email}' ";
			$query .= " WHERE user_id='{$user_id}'";
			$updateUser = mysqli_query($connection, $query);
			$msg->success('Profile updated', 'profile.php');
			if(!$updateUser){
				die("Query fail " . mysqli_error($connection));
			}
		} else {
			$msg->error('Fill in all the fields', 'profile.php');
		}
	}
}

?>
