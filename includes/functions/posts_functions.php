<?php

function postsSearchByTags($column, $searchedWord){
	if(isset($_POST['submit'])){
		$search = $_POST[$searchedWord];
		$result = readFromDb("posts", " WHERE post_status = 'published' AND {$column} LIKE '%$search%'");
		return $result;
	}
}
function incrementViewCount(){
	global $connection;
	$post_id = $_GET['id'];
	$view_query = "UPDATE posts SET post_view_count = post_view_count + 1 WHERE post_id='{$post_id}'";
	$send_query = mysqli_query($connection, $view_query);
	ifQueryFail($send_query);
}

function postsSearchByAuthor($column){
	if(isset($_GET['author'])){
		$search = $_GET['author'];
		$result = readFromDb("posts", " WHERE post_status = 'published' AND {$column} LIKE '%$search%'");
		return $result;
	}
}

function showContentPostsPage(){
	if(isset($_GET['cat_id'])){
		$result = findRowsInDb('posts', 'cat_id', 'post_category_id', " AND post_status = 'published'");
	} else if(isset($_POST['submit'])){
		$result = postsSearchByTags('post_tags', 'search');
	} else if(isset($_GET['author'])){
		$result = postsSearchByAuthor('post_author', 'author');
	} else {
		$result = readFromDb("posts", " WHERE post_status = 'published' LIMIT 5");
	}
	return $result;
}


function limitParagraphLength($paragraph){
	$paragraph = substr($paragraph, 0, 300) . '...';
	return $paragraph;
}

?>

