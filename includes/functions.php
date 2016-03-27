<?php include "db.php"?>
<?php include "read_from_db_function.php"?>
<?php

function displayCategories($query = NULL){
	$result = readFromDb("categories", $query);
	return $result;
}

function displayPosts(){
	if(blogSearch()){
		$result = blogSearch();
	} else {
		$result = readFromDb("posts");
		return $result;
	}
}
function blogSearch(){
	if(isset($_POST['submit'])){
		$search = $_POST['search'];
		return readFromDb("posts", " WHERE post_tags LIKE '%$search%'");
	}
}

function findRowInDb(){
	global $connection;
	if(isset($_GET['id'])){
		$post_id = $_GET['id'];
		$query = "WHERE post_id = {$post_id}";
		$result = readFromDb("posts ", $query);
		while($row = mysqli_fetch_assoc($result)){
			return $row;
		}
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

