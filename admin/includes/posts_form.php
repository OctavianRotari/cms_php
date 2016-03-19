<div class="col-sm-6">
<?php addNewPost();?>
	<form action="posts.php?source=add_post" method="post" enctype="multipart/form-data">
		<div class=form-group>
			<label for="post_title">Title</label>
			<input class="form-control" type="text" name="post_title">
		</div>
		<div class=form-group>
			<label for="post_author">Author</label>
			<input class="form-control" type="text" name="post_author">
		</div>
		<div class=form-group>
			<label for="post_image">Image</label>
			<input type="file" name="post_image">
		</div>
		<div class=form-group>
			<label for="post_tags">Tags</label>
			<input class="form-control" type="text" name="post_tags">
		</div>
		<div class=form-group>
			<label for="post_content">Content</label>
			<textarea class="form-control" type="text" name="post_content" rows="10"></textarea>
		</div>
		<div class=form-group>
			<input class="btn btn-primary" value="Add Post" type="submit" name="add_new_post">
		</div>
	</form>
</div>
