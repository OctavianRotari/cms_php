<?php $row = findRowInDb("posts", "id", "post");?>
<?php updatePostInDb();?>
<?php global $msg; $msg->display();?>
<div class="col-sm-6">
	<form action="posts.php?source=edit_post&id=<?php echo $_GET['id']?>" method="post" enctype="multipart/form-data">
		<div class=form-group>
			<label for="post_title">Title:</label>
			<input class="form-control" value="<?php echo $row['post_title']?>" type="text" name="post_title">
		</div>
		<div class=form-group>
			<label for="post_category_id">Category:</label><br>
			<select name="post_category_id">
				<option value="">Choose a category</option>
				<?php
					$result = readFromDb("categories");
					while( $row_category = mysqli_fetch_assoc($result)){
						$cat_id = $row_category['cat_id'];
						$cat_title = $row_category['cat_title'];
						?>
						<option value='<?php echo $cat_id;?>'><?php echo $cat_title;?></option>
						<?php
					}
				?>
			</select>
		</div>
		<div class=form-group>
			<label for="current_image">Current Image:</label><br>
			<img name="current_image" src="../images/<?php echo $row['post_image']?>" width="300px" height="300px" name="post_current_image"><br>
			<label for="post_image">Image url:</label>
			<input type="file" name="post_image" >
		</div>
		<div class=form-group>
			<label for="post_tags">Tags:</label>
			<input class="form-control"  value="<?php echo $row['post_tags']?>" type="text" name="post_tags">
		</div>
		<div class="form-group">
			<label for="user_role">Status:</label><br>
			<select name="post_status">
				<option value="<?php echo $row['post_status'];?>"><?php echo $row['post_status'];?></option>
				<?php
				if($row['post_status'] == 'draft'){
					?>
					<option value="published">publish</option>
					<?php
				} else {
					?>
					<option value="draft">draft</option>
					<?php
				}
				?>
			</select>
		</div>
		<div class=form-group>
			<label for="post_content">Content:</label>
			<textarea id="mytextarea" class="form-control" type="text" name="post_content" rows="10"><?php echo $row['post_content']?></textarea>
		</div>
		<div class=form-group>
			<input class="btn btn-primary" value="Update Post" type="submit" name="update_post">
		</div>
	</form>
</div>
