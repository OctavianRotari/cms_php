<div>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>Post Id</th>
				<th>Author</th>
				<th>Content</th>
				<th>Email</th>
				<th>Post Title</th>
				<th>Status</th>
				<th>Date</th>
				<th>Aprove</th>
				<th>Unaprove</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			deleteRowFromDb("comments", "delete_comment", "comment");
			$result = readFromdb("comments");
			while( $row = mysqli_fetch_assoc($result)){
				?>
				<tr>
				<td><?php echo $row['comment_id'];?></td>
				<td><?php echo $row['comment_author'];?></td>
				<td><?php echo $row['comment_content'];?></td>
				<td><?php echo $row['comment_email'];?></td>
				<td><?php $post_row = getPostTitleUsingPostId($row);?>
					<a href="../index.php?source=show_post&id=<?php echo $post_row['post_id'];?>">
						<?php echo $post_row['post_title'];?>
					</a>
				</td>
				<td><?php echo $row['comment_status'];?></td>
				<td><?php echo $row['comment_date'];?></td>
				<td>
					<form action="comments.php" method="post">
						<input type="hidden" value="<?php echo $row['comment_id'];?>" name="comment_id">
						<input  class="btn btn-success" type="submit" name="aprove_comment" value="aproved">
					</form>
				</td>
				<td>
					<form action="comments.php" method="post">
						<input type="hidden" value="<?php echo $row['comment_id'];?>" name="comment_id">
						<input class="btn btn-warning" type="submit" name="unaprove_comment" value="unaproved">
					</form>
				</td>
				<?php changeStatus();?>
				<td><a href='comments.php?source=edit_comment&id=<?php echo $row['comment_id'];?>'>Edit</a></td>
				<td><a href='comments.php?delete_comment=<?php echo $row['comment_id'];?>'>Delete</a></td>
				<tr>
				<?php
			}
			?>
		</tbody>
	</table>
</div>

