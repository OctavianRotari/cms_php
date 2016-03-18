<?php include "../includes/db.php"?>
<?php include "../includes/read_from_db_function.php"?>
<?php

function displayCategoriesInTable(){
	$result = readFromDb("categories");
	while( $row = mysqli_fetch_assoc($result)){
		$cat_title = $row["cat_title"];
		$cat_id = $row["cat_id"];
		echo "<tr>";
		echo "<td>{$cat_id}</td>";
		echo "<td>{$cat_title}</td>";
		echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
		echo "<td><a href='categories.php?update={$cat_id}'>Update</a></td>";
		echo "<tr>";
	}
}

function deleteCategoryFromDb(){
	global $connection;
	if(isset($_GET['delete'])){
		$cat_id = $_GET['delete'];
		$query = "DELETE FROM categories ";
		$query .= "WHERE cat_id=$cat_id";
		$delete_category = mysqli_query($connection, $query);
		echo "category deleted";
		header("Location: categories.php");
		if(!$delete_category){
			die('Cant delete because ' . mysqli_error($connection));
		}
	}

}

function findCategoryInDb(){
	global $connection;
	if(isset($_GET['update'])){
		$cat_id = $_GET['update'];
		$result = readFromDb("categories", " WHERE cat_id={$cat_id}");
		while($row = mysqli_fetch_assoc($result)){
			return $row;
		}
	}
}

function htmlFormUpdateCategory(){
	if(isset($_GET['update'])){
		echo "<form action='categories.php' method='post'>
			<div class='form-group'>
				<label for='cat_title'>Update Category with Id: </label>";
				$row = findCategoryInDb();
				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];
		echo   "<input class='control-label' style='border:none' readonly value='{$cat_id}' name='cat_id'>
				<input type='text' class='form-control' value='{$cat_title}' name='cat_title'>
			</div>
			<div class='form-group'>
				<input type='submit' value='Update' name='update' class='btn btn-primary'>
			</div>
		</form>";
	}
}

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
