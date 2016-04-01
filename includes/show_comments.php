<?php include "functions/comments_functions.php"?>
<?php
$post_id = $_GET['id'];
?>
<!-- Blog Comments -->
<!-- Comments Form -->
<?php addCommentToDb();?>
<div class="well">
	<h4>Leave a Comment:</h4>
	<form action="posts.php?source=show_post&id=<?php echo $post_id;?>" method="post">
		<div class="form-group">
			<label for="comment_author">Put your name:</label><br>
			<input class="form-control" type="text" name="comment_author" >
		</div>
		<div class="form-group">
			<label for="comment_email">Put your email:</label><br>
			<input class="form-control" type="text" name="comment_email">
		</div>
		<div class="form-group">
			<label for="comment_content">Put your comment:</label><br>
			<textarea class="form-control" name="comment_content" rows="3"></textarea>
		</div>
		<button type="submit" name="submit_comment" value="submited" class="btn btn-primary">Submit</button>
	</form>
</div>
<hr>
<!-- Posted Comments -->
<!-- Comment -->
<?php
$commentsResult = findRowsInDb('comments', 'id', 'comment_post_id', " AND comment_status = 'approved' ORDER BY comment_id DESC");
while($row = mysqli_fetch_assoc($commentsResult)){
	$comment_author = $row["comment_author"];
	$comment_date = $row['comment_date'];
	$comment_email = $row['comment_email'];
	$comment_content = $row['comment_content'];
	?>
	<div class="media">
		<a class="pull-left" href="#">
			<img class="media-object" src="http://placehold.it/64x64" alt="">
		</a>
		<div class="media-body">
		<h4 class="media-heading"><?php echo $comment_author;?>
			<small>Posted on <?php echo $comment_date;?></small>
		</h4>
		<p><?php echo $comment_content;?></p>
		</div>
	</div>
	<hr>
	<?php
}
?>
