<?php

function addNewUser(){
  global $connection;
  global $msg;
  if(isset($_POST['add_new_user'])){
    $user_name  = escape($_POST['user_name']);
    $user_password  = escape($_POST['user_password']);
    $user_firstname = escape($_POST['user_firstname']);
    $user_image  = escape($_FILES['user_image']['name']);
    $user_image_temp  = escape($_FILES['user_image']['tmp_name']);
    $user_lastname  = escape($_POST['user_lastname']);
    $user_email = escape($_POST['user_email']);
    $user_role = escape($_POST['user_role']);
    $user_password = encryptPassword($user_password);
    $empty_values = checkIfFieldEmpty($_POST);
    if ($empty_values === 0 ){
      move_uploaded_file($user_image_temp, "../images/$user_image");
      $query ="INSERT INTO users(user_name, ";
      $query .= "user_password, user_firstname, user_secondname, user_email, ";
      $query .= "user_image, user_role)";
      $query .= " VALUE('$user_name', '$user_password', ";
      $query .= "'$user_firstname', '$user_secondname', '$user_email', ";
      $query .= "'$user_image', '$user_role')";
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
