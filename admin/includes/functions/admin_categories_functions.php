<?php



function updateCategoryInDb(){
	global $connection;
	if(isset($_POST['update'])){
		$cat_id = escape($_POST['cat_id']);
		$cat_title = escape($_POST['cat_title']);
		$query = "UPDATE categories SET ";
		$query .= " cat_title='{$cat_title}'";
		$query .= " WHERE cat_id='{$cat_id}'";
		$updating_category = mysqli_query($connection, $query);
		ifQueryFail($updating_category);
	}
}

function insertingCategoriesIntoDb(){
	global $connection;
	if(isset($_POST['submit'])){
		$cat_title = escape($_POST['cat_title']);
		if($cat_title == "" || empty($cat_title)){
			echo "this field should not be empty";
		} else {
			$query = "INSERT INTO categories(cat_title) ";
			$query .= "VALUE('{$cat_title}') ";
			$create_new_category = mysqli_query($connection, $query);
			ifQueryFail($create_new_category);
		}
	}
}
?>
