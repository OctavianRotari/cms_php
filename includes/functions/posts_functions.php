<?php

function postsSearchByTags($column, $searchedWord){
	if(isset($_POST['submit'])){
		$search = $_POST[$searchedWord];
		$result = readFromDb("posts", " WHERE {$column} LIKE '%$search%'");
		return $result;
	}
}

function postsSearchByAuthor($column){
	if(isset($_GET['author'])){
		$search = $_GET['author'];
		$result = readFromDb("posts", " WHERE {$column} LIKE '%$search%'");
		return $result;
	}
}

function showContentPostsPage(){
	if(isset($_GET['cat_id'])){
		$result = findRowsInDb('posts', 'cat_id', 'post_category_id');
	} else if(isset($_POST['submit'])){
		$result = postsSearchByTags('post_tags', 'search');
	} else if(isset($_GET['author'])){
		$result = postsSearchByAuthor('post_author', 'author');
	} else {
		$result = readFromDb("posts");
	}
	return $result;
}


function limitParagraphLength($paragraph){
	$paragraph = substr($paragraph, 0, 300) . '...';
	return $paragraph;
}

?>

