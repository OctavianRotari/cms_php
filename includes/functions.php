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
?>

