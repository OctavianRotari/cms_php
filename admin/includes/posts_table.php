<div>
<?php global $msg; $msg->display();?>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>Post Id</th>
				<th>Author</th>
				<th>Title</th>
				<th>Category</th>
				<th>Status</th>
				<th>Image</th>
				<th>Tags</th>
				<th>Comments<br>Count</th>
				<th>Date</th>
				<th>Viewed</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$current_user_id = $_SESSION['user_id'];
			$result = readFromdb("posts", " WHERE post_user_id='{$current_user_id}'");
			while( $row = mysqli_fetch_assoc($result)){
				?>
				<tr>
				<td><?php echo $row['post_id'];?></td>
				<td><?php echo $row['post_author'];?></td>
				<td>
				<?php
				if($row['post_status'] === 'published'){
					?>
					<a href="../posts.php?source=show_post&id=<?php echo $row['post_id'];?>"><?php echo $row['post_title'];?></a>
					<?php
				} else {
					?>
					<?php echo $row['post_title'];?>
					<?php
				}
				?>
				</td>
				<td><?php
					$category_row = getCategoryTitleUsingCatId($row);
					echo $category_row['cat_title'];
				?></td>
				<td><?php echo $row['post_status'];?></td>
				<td><img src='../images/<?php echo $row['post_image'];?>' width='100px'height='100px'></td>
				<td><?php echo $row['post_tags'];?></td>
				<td><?php echo countRowsInDb("comments", " WHERE comment_post_id='{$row['post_id']}'");?></td>
				<td><?php echo $row['post_date'];?></td>
				<td>
					<?php echo $row['post_view_count'];?><br><br>
					<?php resetPostViewCount($row['post_id']);?>
					<form action="posts.php" method="post">
						<input class='btn btn-primary' type="submit" value="Reset" name="reset_post_view_count">
					</form>
				</td>
				<td><a href='posts.php?source=edit_post&id=<?php echo $row['post_id'];?>'>Edit</a></td>
				<?php deletePost($row['post_image']);?>
				<td><a onclick="return confirm('Are you sure you want to delete?')" href='posts.php?delete_post=<?php echo $row['post_id'];?>'>Delete</a></td>
				<tr>
				<?php
			}
			?>
		</tbody>
	</table>
</div>
