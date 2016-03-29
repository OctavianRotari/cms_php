<?php

function addCommentToDb(){
	global $connection;
	if(isset($_POST['submit_comment'])){
		$comment_post_id = $_GET['id'];
		$comment_author = $_POST['comment_author'];
		$comment_email = $_POST['comment_email'];
		$comment_content = $_POST['comment_content'];
		$comment_status = "unaproved";
		$submited_form = $_POST;
		$empty_values = 0;
		foreach( $submited_form  as $key => $value){
			if(empty($value)){
				$empty_values += 1;
			}
		}
		if ($empty_values === 0 ){
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
			echo "<h4 style='color:green'>Comment posted</h4><br>";
		} else {
			echo "<h4 style='color:red'>If you want to leave a comment fill in  all the fields</h4><br>";
		}
	}
}

?>
