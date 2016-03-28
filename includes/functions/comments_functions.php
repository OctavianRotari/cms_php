<?php

function addCommentToDb(){
	global $connection;
	if(isset($_POST['submit_comment'])){
		$comment_post_id = $_GET['id'];
		$comment_author = "mew";
		$comment_email = "jjdjd@kkv.com";
		$comment_content = $_POST['comment_content'];
		$comment_status = "draft";
		$query = 'INSERT INTO comments(comment_post_id, comment_date, comment_author, comment_email, comment_content, comment_status)';
		$query .= " VALUE('$comment_post_id',";
		$query .= " now(),";
		$query .= " '$comment_author',";
		$query .= " '$comment_email',";
		$query .= " '$comment_content',";
		$query .= " '$comment_status')";
		$adding_new_comment = mysqli_query($connection, $query);
		if(!$adding_new_comment){
			die("cannot connect because " . mysqli_error($connection));
		}
	}
}

?>
