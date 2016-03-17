<?php include "db.php"?>
<?php
function readFromDb($table, $queryExtention = NULL){
	global $connection;
	$query = "SELECT * FROM $table";
	if($queryExtention){
		$query = $query . $queryExtention;
	}
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("can't get data from db" . $query . mysqli_error($connection));
	}
	return $result;
}

function displayCategories($query = NULL){
	$result = readFromDb("categories", $query);
	while( $row = mysqli_fetch_assoc($result)){
		$cat_title = $row["cat_title"];
		echo "<li><a href='#'>{$cat_title}</a></li>";
	}
}

function displayCategoriesInTable(){
	$result = readFromDb("categories");
	while( $row = mysqli_fetch_assoc($result)){
		$cat_title = $row["cat_title"];
		$cat_id = $row["cat_id"];
		echo "<tr>";
		echo "<td>{$cat_id}</td>";
		echo "<td>{$cat_title}</td>";
		echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
		echo "<tr>";
	}
}

function deleteCategoriesFromDb(){
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

function displayPosts(){
	if(blogSearch()){
		$result = blogSearch();
	} else {
		$result = readFromDb("posts");
	}
	while($row = mysqli_fetch_assoc($result)){
		$post_title = $row["post_title"];
		$post_author = $row["post_author"];
		$post_date = $row['post_date'];
		$post_image = $row['post_image'];
		$post_content = $row['post_content'];
		echo
		"<h2>
		<a href='#'>{$post_title}</a>
		</h2>
		<p class='lead'>
		by <a href='index.php'>{$post_author}</a>
		</p>
		<p><span class='glyphicon glyphicon-time'></span> Posted on {$post_date} </p>
		<hr>
		<img class='img-responsive' src='{$post_image}' alt='' height='300px' width='300px'>
		<hr>
		<p>{$post_content}</p>
		<a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>
		<hr>";
	}
}
function blogSearch(){
	if(isset($_POST['submit'])){
		$search = $_POST['search'];
		return readFromDb("posts", " WHERE post_tags LIKE '%$search%'");
	}
}
?>

