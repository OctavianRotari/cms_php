<?php include "db.php"?>
<?php include "read_from_db_function.php"?>
<?php

function displayCategories($query = NULL){
	$result = readFromDb("categories", $query);
	while( $row = mysqli_fetch_assoc($result)){
		$cat_title = $row["cat_title"];
		echo "<li><a href='#'>{$cat_title}</a></li>";
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

