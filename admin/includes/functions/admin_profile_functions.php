<?php

function updateProfileInDb(){
	global $connection;
	global $msg;
	if(isset($_POST['edit_profile'])){
		$user_id = $_SESSION['user_id'];
		$user_name  = $_POST['user_name'];
		$user_password  = $_POST['user_password'];
		$user_firstname = $_POST['user_firstname'];
		$user_image  = $_FILES['user_image']['name'];
		$user_image_temp  = $_FILES['user_image']['tmp_name'];
		$user_secondname  = $_POST['user_secondname'];
		$user_email = $_POST['user_email'];
		$submited_form = $_POST;
		$empty_values = 0;

		$user_name = mysqli_real_escape_string($connection, $user_name);
		$user_password = mysqli_real_escape_string($connection, $user_password);
		$user_firstname = mysqli_real_escape_string($connection, $user_firstname);
		$user_secondname = mysqli_real_escape_string($connection, $user_secondname);
		$user_email = mysqli_real_escape_string($connection, $user_email);

		$user_password = encryptPassword($user_password);

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
