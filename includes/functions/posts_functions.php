<?php

function incrementViewCount(){
	global $connection;
	$post_id = $_GET['id'];
	$view_query = "UPDATE posts SET post_view_count = post_view_count + 1 WHERE post_id='{$post_id}'";
	$send_query = mysqli_query($connection, $view_query);
	ifQueryFail($send_query);
}

function postsSearch($queryExtention){
	$query = " WHERE post_status = 'published' " . $queryExtention;
	$result = readFromDb("posts", $query);
	return $result;
}

function showContentPostsPage(){
	if(isset($_GET['cat_id'])){
		$post_category_id = $_GET['cat_id'];
		$query_category = "AND post_status = 'published' AND post_category_id = {$post_category_id}";
		$total_posts = countRowsInDb('posts', " WHERE post_status = 'published'" . $query_category);
		$query_category = $query_category . " LIMIT 5";
		if(isset($_GET['page'])){
			$number_of_page = $_GET['page'];
			$rows_offset = $number_of_page * 5;
			$query_category = $query_category . " OFFSET {$rows_offset}";
		}
		$result['cat_id'] = $post_category_id;
		$result['posts'] = postsSearch($query_category);
		$result['posts_count'] = $total_posts;
	} else if(isset($_GET['search'])){
		$post_searched_tag = $_GET['search'];
		$query_tag = " AND post_tags LIKE '%$post_searched_tag%'";
		$total_posts = countRowsInDb('posts', " WHERE post_status = 'published'" . $query_tag);
		$query_tag = $query_tag . " LIMIT 5";
		if(isset($_GET['page'])){
			$number_of_page = $_GET['page'];
			$rows_offset = $number_of_page * 5;
			$query_tag = $query_tag . " OFFSET {$rows_offset}";
		}
		$result['search'] = $post_searched_tag;
		$result['posts'] = postsSearch($query_tag);
		$result['posts_count'] = $total_posts;
	} else if(isset($_GET['author'])){
		$post_author = $_GET['author'];
		$query_author = " AND post_author = '{$post_author}'";
		$total_posts = countRowsInDb('posts', " WHERE post_status = 'published'" . $query_author);
		$query_author = $query_author . " LIMIT 5";
		if(isset($_GET['page'])){
			$number_of_page = $_GET['page'];
			$rows_offset = $number_of_page * 5;
			$query_author = $query_author . " OFFSET {$rows_offset}";
		}
		$result['author'] = $post_author;
		$result['posts'] = postsSearch($query_author);
		$result['posts_count'] = $total_posts;
	} else {
		$total_posts = countRowsInDb('posts', " WHERE post_status = 'published'");
		$query = " WHERE post_status = 'published' LIMIT 5";
		if(isset($_GET['page'])){
			$number_of_page = $_GET['page'];
			$rows_offset = $number_of_page * 5;
			$query = " WHERE post_status = 'published' LIMIT 5" . " OFFSET {$rows_offset}";
		}
		$result['posts'] = readFromDb("posts", $query);;
		$result['posts_count'] = $total_posts;
	}
	return $result;
}


function limitParagraphLength($paragraph){
	$paragraph = substr($paragraph, 0, 300) . '...';
	return $paragraph;
}

?>

