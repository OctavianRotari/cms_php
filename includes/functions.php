<?php include "db.php"?>
<?php include "read_from_db_function.php"?>
<?php

function displayCategories(){
	$result = readFromDb("categories");
	return $result;
}

function blogSearch($column, $searchedWord){
	if(isset($_POST['submit'])){
		$search = $_POST[$searchedWord];
		$result = readFromDb("posts", " WHERE {$column} LIKE '%$search%'");
		return $result;
	}
}

function showContentPostsPage(){
	if(isset($_GET['cat_id'])){
		$result =  findRowsInDb('cat_id', 'post_category_id');
	} else if(isset($_POST['submit'])){
		$result = blogSearch('post_tags', 'search');
	} else {
		$result = readFromDb("posts");
	}
	return $result;
}

function findRowsInDb($id = 'id', $columnName = NULL){
	global $connection;
	if(isset($_GET[$id])){
		$table_id = $_GET[$id];
		if($columnName){
			$column = $columnName;
		} else {
			$column = 'post_id';
		}
		$query = "WHERE {$column} = {$table_id}";
		$result = readFromDb("posts ", $query);
		return $result;
	}
}

function limitParagraphLength($paragraph){
	$paragraph = substr($paragraph, 0, 300) . '...';
	return $paragraph;
}

function displayContentOfPage(){
	if(isset($_GET['source'])){
		$source = $_GET['source'];
	} else {
		$source = '';
	}
	switch($source){
		case 'show_post';
		include "includes/show_post.php";
		break;
		default:
		include 'includes/show_posts.php';
		break;
	}
}
?>

