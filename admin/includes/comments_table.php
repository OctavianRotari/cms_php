<div>
<h3><?php global $msg; $msg->display();?></h3>
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
				<th>Approve</th>
				<th>Unapprove</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			deleteRowFromDb("comments", "delete_comment", "comment");
			$current_user = $_SESSION['user_name'];
			$result_posts = readFromdb("posts", " WHERE post_author='{$current_user}'");
			while( $row = mysqli_fetch_assoc($result_posts)){
				$post_id = $row['post_id'];
				$post_title = $row['post_title'];
				$result = readFromdb("comments", " WHERE comment_post_id='{$post_id}' ORDER BY comment_id DESC");
				while( $row = mysqli_fetch_assoc($result)){
					?>
					<tr>
					<td><?php echo $row['comment_id'];?></td>
					<td><?php echo $row['comment_author'];?></td>
					<td><?php echo $row['comment_content'];?></td>
					<td><?php echo $row['comment_email'];?></td>
					<td>
						<a href="../posts.php?source=show_post&id=<?php echo $post_id;?>">
							<?php echo $post_title;?>
						</a>
					</td>
					<td><?php echo $row['comment_status'];?></td>
					<td><?php echo $row['comment_date'];?></td>
					<td>
						<form action="comments.php" method="post">
							<input type="hidden" value="<?php echo $row['comment_id'];?>" name="comment_id">
							<input  class="btn btn-success" type="submit" name="approve_comment" value="approved">
						</form>
					</td>
					<td>
						<form action="comments.php" method="post">
							<input type="hidden" value="<?php echo $row['comment_id'];?>" name="comment_id">
							<input class="btn btn-warning" type="submit" name="unapprove_comment" value="unapproved">
						</form>
					</td>
					<?php changeStatus();?>
					<td><a onclick="return confirm('Are you sure you want to delete?')" href='comments.php?delete_comment=<?php echo $row['comment_id'];?>'>Delete</a></td>
					<tr>
					<?php
				}
			}
			?>
		</tbody>
	</table>
</div>

