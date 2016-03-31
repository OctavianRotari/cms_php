<?php

function resetPostViewCount($post_id){
	if(isset($_POST['reset_post_view_count'])){
		global $connection;
		$post_id = mysqli_real_escape_string($connection, $post_id);
		$view_query = "UPDATE posts SET post_view_count = 0 WHERE post_id='{$post_id}'";
		$send_query = mysqli_query($connection, $view_query);
		ifQueryFail($send_query);
		header("Location: posts.php");
	}
}

function addNewPost(){
	global $connection;
	global $msg;
	if(isset($_POST['add_new_post'])){
		$post_title  = escape($_POST['post_title']);
		$post_category_id  = escape($_POST['post_category_id']);
		$post_author = escape($_SESSION['user_name']);
		$post_image  = escape($_FILES['post_image']['name']);
		$post_image_temp  = escape($_FILES['post_image']['tmp_name']);
		$post_tags  = escape($_POST['post_tags']);
		$post_comment_count  = 0;
		$post_content = escape($_POST['post_content']);
		$post_date = date('Y-m-d H:i:s');
		$post_status = "draft";
		$submited_form = $_POST;
		$empty_values = 0;
		foreach( $submited_form  as $key => $value){
			if(empty($value)){
				$empty_values += 1;
			}
		}
		if ($empty_values === 0 ){
			move_uploaded_file($post_image_temp, "../images/$post_image");
			$query ="INSERT INTO posts(post_title, ";
			$query .= "post_category_id, post_author, post_date, post_image, ";
			$query .= "post_content, post_tags, post_comment_count, post_status)";
			$query .= " VALUE('$post_title', '$post_category_id', ";
			$query .= "'$post_author', now(), '$post_image', ";
			$query .= "'$post_content', '$post_tags', '$post_comment_count', '$post_status')";
			$adding_new_post = mysqli_query($connection, $query);
			ifQueryFail($adding_new_post);
			$msg->success('Post added', 'posts.php');
			//header("Location: posts.php");
		} else {
			$msg->error('Fill in all the fields');
		}
	}
}

function updatePostInDb(){
	global $connection;
	global $msg;
	if(isset($_POST['update_post'])){
		$post_id = $_GET['id'];
		$post_title = escape($_POST['post_title']);
		$post_category_id  = escape($_POST['post_category_id']);
		$post_image  = escape($_FILES['post_image']['name']);
		$post_image_temp  = escape($_FILES['post_image']['tmp_name']);
		$post_tags = escape($_POST['post_tags']);
		$post_content = escape($_POST['post_content']);
		$post_status = escape($_POST['post_status']);
		$submited_form = $_POST;
		$empty_values = 0;
		foreach( $submited_form  as $key => $value){
			if(empty($value)){
				$empty_values += 1;
			}
		}
		if ($empty_values === 0 ){
			move_uploaded_file($post_image_temp, "../images/$post_image");
			$query = "UPDATE posts SET";
			$query .= " post_title='{$post_title}',";
			if($_FILES['post_image']['size'] > 0){
				$query .= " post_image='{$post_image}',";
			}
			$query .= " post_tags='{$post_tags}',";
			$query .= " post_content='{$post_content}',";
			$query .= " post_status='{$post_status}',";
			$query .= " post_category_id='{$post_category_id}'";
			$query .= " WHERE post_id='{$post_id}'";
			$updating_post = mysqli_query($connection, $query);
			ifQueryFail($updating_post);
			$msg->success('Post updated', 'posts.php');
			//header("Location: posts.php");
		} else {
			$msg->error('Fill in all the fields');
		}
	}
}

function deletePost(){
	if(isset($_GET['delete_post'])){
		global $msg;
		deleteRowFromDb("comments", "delete_post", "comment_post");
		deleteRowFromDb("posts", "delete_post", "post");
		$msg->success('Post and related comments have been deleted', 'posts.php');
	}
}

function getCategoryTitleUsingCatId($row){
	$category_id = $row['post_category_id'];
	$category_query = readFromDb('categories', " WHERE cat_id={$category_id}");
	$category_row = mysqli_fetch_assoc($category_query);
	return $category_row;
}

function displayContentPostsPage(){
	if(isset($_GET['source'])){
		$source = $_GET['source'];
	} else {
		$source = '';
	}
	switch($source){
		case 'add_post';
		include "includes/posts_new.php";
		break;
		case 'edit_post';
		include "includes/post_edit.php";
		break;
		default:
		include "includes/posts_table.php";
		break;
	}
}

?>
