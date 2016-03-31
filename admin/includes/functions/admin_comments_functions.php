<?php

function changeStatus(){
	global $connection;
	$value = NULL;
	if(isset($_POST['approve_comment'])){
		$value = $_POST['approve_comment'];
	} else if(isset($_POST['unapprove_comment'])){
		$value = $_POST['unapprove_comment'];
	}
	if($value){
		$comment_id = $_POST['comment_id'];
		$query = "UPDATE comments SET";
		$query .= " comment_status='{$value}'";
		$query .= " WHERE comment_id='{$comment_id}'";
		$updating_comment = mysqli_query($connection, $query);
		ifQueryFail($updating_comment);
		header("Location: comments.php");
	}
}

function getPostTitleUsingPostId($row){
	$post_id = $row['comment_post_id'];
	$post_query = readFromDb('posts', " WHERE post_id={$post_id}");
	$post_row = mysqli_fetch_assoc($post_query);
	return $post_row;
}

function displayContentCommentsPage(){
	if(isset($_GET['source'])){
		$source = $_GET['source'];
	} else {
		$source = '';
	}
	switch($source){
		case 'add_comment';
		include "includes/comment_new.php";
		break;
		case 'edit_comment';
		include "includes/comment_edit.php";
		break;
		default:
		include "includes/comments_table.php";
		break;
	}
}
?>
