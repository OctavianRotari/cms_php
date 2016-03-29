<?php

function addNewPost(){
	global $connection;
	if(isset($_POST['add_new_post'])){
		$post_title  = $_POST['post_title'];
		$post_category_id  = $_POST['post_category_id'];
		$post_author = $_SESSION['user_name'];
		$post_image  = $_FILES['post_image']['name'];
		$post_image_temp  = $_FILES['post_image']['tmp_name'];
		$post_tags  = $_POST['post_tags'];
		$post_comment_count  = 0;
		$post_content = $_POST['post_content'];
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
			header("Location: posts.php");
		} else {
			echo "<h3 style='color:red'>Fill in  all the fields</h3><br>";
		}
	}
}

function updatePostInDb(){
	global $connection;
	if(isset($_POST['update_post'])){
		$post_id = $_GET['id'];
		$post_title = $_POST['post_title'];
		$post_category_id  = $_POST['post_category_id'];
		$post_image  = $_FILES['post_image']['name'];
		$post_image_temp  = $_FILES['post_image']['tmp_name'];
		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		$post_status = $_POST['post_status'];
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
			header("Location: posts.php");
		} else {
			echo "<h3 style='color:red'>Fill in  all the fields</h3><br>";
		}
	}
}

function getCategoryTitleUsingCatId($row){
	$category_id = $row['post_category_id'];
	$category_query = readFromDb('categories', " WHERE cat_id={$category_id}");
	$category_row = mysqli_fetch_assoc($category_query);
	return $category_row;
}

function countCommentsUsingId($row){
	$post_id = $row['post_id'];
	$comments_query = readFromDb('comments', " WHERE comment_post_id={$post_id}");
	$commentsCount = 0;
	while($row = mysqli_fetch_assoc($comments_query)){
		$commentsCount += 1;
	}
	return $commentsCount;
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
		case 'show_post';
		include "includes/post_show.php";
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
