<?php

function signIn(){
	if(isset($_POST['sign_in'])){
		$user_name = $_POST['user_name'];
		$user_password = $_POST['user_password'];
		$result = readFromDb('users', " WHERE user_name='{$user_name}' AND user_password='{$user_password}'");
		$row = mysqli_fetch_assoc($result);
		if($row['user_name'] == $user_name || $row['user_password'] == $user_password){
			$_SESSION['auth'] = 'true';
			$_SESSION['user_name'] = $row['user_name'];
			$_SESSION['user_role'] = $row['user_role'];
			$_SESSION['user_id'] = $row['user_id'];
			header("Location:index.php");
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
		$rand_salt = '12345';
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
			$query .= "user_image, user_role, rand_salt)";
			$query .= " VALUE('$user_name', '$user_password', ";
			$query .= "'$user_firstname', '$user_secondname', '$user_email', ";
			$query .= "'$user_image', '$user_role', '$rand_salt')";
			$adding_new_user = mysqli_query($connection, $query);
			if(!$adding_new_user){
				die("Query fail " . mysqli_error($connection));
			}
		} else {
			echo "<h3 style='color:red'>Fill in  all the fields</h3><br>";
		}
	}
}
?>
