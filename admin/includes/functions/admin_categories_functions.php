<?php include "includes/functions/db.php"?>
<?php include "includes/functions/common_functions.php"?>
<?php



function updateCategoryInDb(){
	global $connection;
	if(isset($_POST['update'])){
		$cat_id = $_POST['cat_id'];
		$cat_title = $_POST['cat_title'];
		$query = "UPDATE categories SET ";
		$query .= " cat_title='{$cat_title}'";
		$query .= " WHERE cat_id='{$cat_id}'";
		$updating = mysqli_query($connection, $query);
		if(!$updating){
			die(" cant update because " . mysqli_error($connection));
		}
	}
}

function insertingCategoriesIntoDb(){
	global $connection;
	if(isset($_POST['submit'])){
		$cat_title = $_POST['cat_title'];
		if($cat_title == "" || empty($cat_title)){
			echo "this field should not be empty";
		} else {
			$query = "INSERT INTO categories(cat_title) ";
			$query .= "VALUE('{$cat_title}') ";
			$create_new_category = mysqli_query($connection, $query);
			if(!$create_new_category){
				die('something went wrong ' . mysqli_error($connection));
			}
		}
	}
}
?>
