<?php include "../includes/db.php"?>
<?php include "../includes/read_from_db_function.php"?>
<?php

function displayPostsInTable(){
	$result = readFromDb("posts");
	while( $row = mysqli_fetch_assoc($result)){
		$post_id = $row["post_id"];
		$post_title = $row["post_title"];
		$post_author = $row["post_author"];
		$post_date = $row['post_date'];
		$post_image = $row['post_image'];
		$post_tags = $row['post_tags'];
		$post_status = $row['post_status'];
		echo "<tr>";
		echo "<td>{$post_id}</td>";
		echo "<td>{$post_author}</td>";
		echo "<td>{$post_title}</td>";
		echo "<td>Category</td>";
		echo "<td>{$post_status}</td>";
		echo "<td><img src='{$post_image}' width='100px'height='100px'></td>";
		echo "<td>{$post_tags}</td>";
		echo "<td>Comments</td>";
		echo "<td>{$post_date}</td>";
		echo "<tr>";
	}
}

function addNewPost(){
	global $connection;
	if(isset($_POST['add_new_post'])){
		$post_title  = $_POST['post_title'];
		$post_category_id  = '23';
		$post_author = $_POST['post_author'];
		$post_image  = $_POST['post_image'];
		$post_tags  = $_POST['post_tags'];
		$post_comment_count  = '23';
		$post_content = $_POST['post_content'];
		$post_date = date('Y-m-d H:i:s');
		$post_status = "draft";
		$query ="INSERT INTO posts(post_title, post_category_id, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status)";
		$query .= "VALUE('$post_title', '$post_category_id', '$post_author', '$post_date', '$post_image', '$post_content', '$post_tags', '$post_comment_count', '$post_status')";
		$result = mysqli_query($connection, $query);
		header("Location: posts.php");
		if(!$result){
			die('Cant post post because ' . mysqli_error($connection));
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

		default:
		include "includes/posts_table.php";
		break;
	}
}

?>
