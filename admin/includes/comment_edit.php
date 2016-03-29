<?php $row = findRowInDb("comments", "id", "comment");?>
<?php updateCommentInDb();?>
<div class="col-sm-6">
	<?php
	$post_row = getPostTitleUsingPostId($row);
	$post_title = $post_row['post_title'];
	echo "<h3>Post Title: {$post_title}</h3>";
	?>
	<form action="comments.php?source=edit_comment&id=<?php echo $_GET['id']?>" method="post" enctype="multipart/form-data">
		<div class=form-group>
			<label for="comment_title">Author</label>
			<input class="form-control" value="<?php echo $row['comment_author']?>" type="text" name="comment_author">
		</div>
		<div class=form-group>
			<label for="comment_author">Email</label>
			<input class="form-control" value="<?php echo $row['comment_email']?>" type="text" name="comment_email">
		</div>
		<div class=form-group>
			<label for="comment_status">Status</label>
			<input class="form-control"  value="<?php echo $row['comment_status']?>" type="text" name="comment_status">
		</div>
		<div class=form-group>
			<label for="comment_content">Content</label>
			<textarea class="form-control" type="text" name="comment_content" rows="10"><?php echo $row['comment_content']?></textarea>
		</div>
		<div class=form-group>
			<input class="btn btn-primary" value="Update comment" type="submit" name="update_comment">
		</div>
	</form>
</div>
