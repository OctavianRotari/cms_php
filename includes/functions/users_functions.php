<?php

function signIn(){
	if(isset($_POST['sign_in'])){
		global $connection;
		$user_name = $_POST['user_name'];
		$user_password = $_POST['user_password'];
		$user_name = mysqli_real_escape_string($connection, $user_name);
		$user_password = mysqli_real_escape_string($connection, $user_password);

		$rand_salt = "thesearemytwentytwocha";
		$hash_format = "$2y$10$";
		$hash_and_salt = $hash_format . $rand_salt;
		$user_password = crypt($user_password, $hash_and_salt);

		$result = readFromDb('users', " WHERE user_name='{$user_name}' AND user_password='{$user_password}'");
		$row = mysqli_fetch_assoc($result);
		if($row['user_name'] == $user_name || $row['user_password'] == $user_password){
			$_SESSION['auth'] = 'true';
			$_SESSION['user_name'] = $row['user_name'];
			$_SESSION['user_role'] = $row['user_role'];
			$_SESSION['user_id'] = $row['user_id'];
			header("Location:admin/index.php");
		}
	}
}

function addNewUser(){
	global $connection;
	if(isset($_POST['create_account'])){
		$user_name  = $_POST['user_name'];
		$user_password  = $_POST['user_password'];
		$user_firstname = $_POST['user_firstname'];
		$user_image  = $_FILES['user_image']['name'];
		$user_image_temp  = $_FILES['user_image']['tmp_name'];
		$user_secondname  = $_POST['user_secondname'];
		$user_email = $_POST['user_email'];
		$user_role = 'normal_user';

		$user_name = mysqli_real_escape_string($connection, $user_name);
		$user_password = mysqli_real_escape_string($connection, $user_password);
		$user_firstname = mysqli_real_escape_string($connection, $user_firstname);
		$user_secondname = mysqli_real_escape_string($connection, $user_secondname);
		$user_email = mysqli_real_escape_string($connection, $user_email);

		$rand_salt = "thesearemytwentytwocha";
		$hash_format = "$2y$10$";
		$hash_and_salt = $hash_format . $rand_salt;
		$user_password = crypt($user_password, $hash_and_salt);

		$submited_form = $_POST;
		$empty_values = 0;
		foreach( $submited_form  as $key => $value){
			if(empty($value)){
				$empty_values += 1;
			}
		}
		if ($empty_values === 0 ){
			move_uploaded_file($user_image_temp, "images/$user_image");
			$query ="INSERT INTO users(user_name, ";
			$query .= "user_password, user_firstname, user_secondname, user_email, ";
			$query .= "user_image, user_role)";
			$query .= " VALUE('$user_name', '$user_password', ";
			$query .= "'$user_firstname', '$user_secondname', '$user_email', ";
			$query .= "'$user_image', '$user_role')";
			$adding_new_user = mysqli_query($connection, $query);
			ifQueryFail($adding_new_user);
		} else {
			echo "<h3 style='color:red'>Fill in  all the fields</h3><br>";
		}
	}
}
?>
