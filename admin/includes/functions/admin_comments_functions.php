<?php

function updateCommentInDb(){
	global $connection;
	if(isset($_POST['update_comment'])){
		$comment_id = $_GET['id'];
		$comment_author = $_POST['comment_author'];
		$comment_email  = $_POST['comment_email'];
		$comment_content = $_POST['comment_content'];
		$comment_status = $_POST['comment_status'];
		$submited_form = $_POST;
		$empty_values = 0;
		foreach( $submited_form  as $key => $value){
			if(empty($value)){
				$empty_values += 1;
			}
		}
		if ($empty_values === 0 ){
			$query = "UPDATE comments SET";
			$query .= " comment_author='{$comment_author}',";
			$query .= " comment_email='{$comment_email}',";
			$query .= " comment_content='{$comment_content}',";
			$query .= " comment_status='{$comment_status}'";
			$query .= " WHERE comment_id='{$comment_id}'";
			$updating_comment = mysqli_query($connection, $query);
			ifQueryFail($updating_comment);
			header("Location: comments.php");
		} else {
			echo "<h3 style='color:red'>Fill in  all the fields</h3><br>";
		}
	}
}

function changeStatus(){
	global $connection;
	$value = NULL;
	if(isset($_POST['aprove_comment'])){
		$value = $_POST['aprove_comment'];
	} else if(isset($_POST['unaprove_comment'])){
		$value = $_POST['unaprove_comment'];
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
