<?php $row = findRowInDb("posts", "id", "post");?>
<?php updatePostInDb();?>
<div class="col-sm-6">
	<form action="posts.php?source=edit_post&id=<?php echo $_GET['id']?>" method="post" enctype="multipart/form-data">
		<div class=form-group>
			<label for="post_title">Title</label>
			<input class="form-control" value="<?php echo $row['post_title']?>" type="text" name="post_title">
		</div>
		<div class=form-group>
			<label for="post_author">Author</label>
			<input class="form-control" value="<?php echo $row['post_author']?>" type="text" name="post_author">
		</div>
		<div class=form-group>
			<label for="current_image">Current Image</label><br>
			<img name="current_image" src="../images/<?php echo $row['post_image']?>" width="300px" height="300px"><br>
			<label for="post_image">Image url</label>
			<input type="file" name="post_image">
		</div>
		<div class=form-group>
			<label for="post_tags">Tags</label>
			<input class="form-control"  value="<?php echo $row['post_tags']?>" type="text" name="post_tags">
		</div>
		<div class=form-group>
			<label for="post_content">Content</label>
			<textarea class="form-control" type="text" name="post_content" rows="10"><?php echo $row['post_content']?></textarea>
		</div>
		<div class=form-group>
			<input class="btn btn-primary" value="Update Post" type="submit" name="update_post">
		</div>
	</form>
</div>