<?php include "includes/functions/db.php"?>
<?php include "includes/functions/common_functions.php"?>
<?php

function addNewPost(){
	global $connection;
	if(isset($_POST['add_new_post'])){
		$post_title  = $_POST['post_title'];
		$post_category_id  = '23';
		$post_author = $_POST['post_author'];
		$post_image  = $_FILES['post_image']['name'];
		$post_image_temp  = $_FILES['post_image']['tmp_name'];
		$post_tags  = $_POST['post_tags'];
		$post_comment_count  = '23';
		$post_content = $_POST['post_content'];
		$post_date = date('Y-m-d H:i:s');
		$post_status = "draft";
		move_uploaded_file($post_image_temp, "../images/$post_image");
		$query ="INSERT INTO posts(post_title, ";
		$query .= "post_category_id, post_author, post_date, post_image, ";
		$query .= "post_content, post_tags, post_comment_count, post_status)";
		$query .= "VALUE('$post_title', '$post_category_id', ";
		$query .= "'$post_author', '$post_date', '$post_image', ";
		$query .= "'$post_content', '$post_tags', '$post_comment_count', '$post_status')";
		$result = mysqli_query($connection, $query);
		if(!$result){
			die('Cant post post because ' . mysqli_error($connection));
		}
	}
}

function updatePostInDb(){
	global $connection;
	if(isset($_POST['update_post'])){
		$post_id = $_GET['id'];
		$post_title = $_POST['post_title'];
		$post_author = $_POST['post_author'];
		$post_image  = $_FILES['post_image']['name'];
		$post_image_temp  = $_FILES['post_image']['tmp_name'];
		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		move_uploaded_file($post_image_temp, "../images/$post_image");
		$query = "UPDATE posts SET";
		$query .= " post_title='{$post_title}',";
		$query .= " post_author='{$post_author}',";
		$query .= " post_image='{$post_image}',";
		$query .= " post_tags='{$post_tags}',";
		$query .= " post_content='{$post_content}'";
		$query .= " WHERE post_id='{$post_id}'";
		$updating = mysqli_query($connection, $query);
		header("Location: posts.php");
		if(!$updating){
			die(" cant update because " . mysqli_error($connection));
		}
	}
}

function displayContentPostsPage(){
	if(isset($_GET['source'])){
		$source = $_GET['source'];
	} else {
		$source = '';
	}
	switch($source){
		case 'add_post';
		include "includes/posts_form.php";
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
