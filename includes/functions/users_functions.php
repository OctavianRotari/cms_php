<?php

function signIn(){
	if(isset($_POST['sign_in'])){
		global $connection;
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
		}
	}
}

function addNewUser(){
	global $connection;
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
