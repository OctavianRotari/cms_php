<?php

function updateCategoryInDb(){
	global $msg;
	global $connection;
	if(isset($_POST['update'])){
		$cat_id = escape($_POST['cat_id']);
		$cat_title = escape($_POST['cat_title']);
		$empty_values = checkIfFieldEmpty($_POST);
		if ($empty_values === 0 ){
			$query = "UPDATE categories SET ";
			$query .= " cat_title='{$cat_title}'";
			$query .= " WHERE cat_id='{$cat_id}'";
			$updating_category = mysqli_query($connection, $query);
			ifQueryFail($updating_category);
		} else {
			$location = 'categories.php?update=' . $cat_id;
			$msg->error('Fill in all the fields', $location);
		}
	}
}

function insertingCategoriesIntoDb(){
	global $msg;
	global $connection;
	if(isset($_POST['submit'])){
		$cat_title = escape($_POST['cat_title']);
		if($cat_title == "" || empty($cat_title)){
			$msg->error('Fill in all the fields', 'categories.php');
		} else {
			$query = "INSERT INTO categories(cat_title) ";
			$query .= "VALUE('{$cat_title}') ";
			$create_new_category = mysqli_query($connection, $query);
			ifQueryFail($create_new_category);
		}
	}
}
?>
