<div>
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
				<th>Edit</th>
				<th>Show</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			deleteRowFromDb("posts", "delete_post", "post");
			$result = readFromdb("posts");
			while( $row = mysqli_fetch_assoc($result)){
				?>
				<tr>
				<td><?php echo $row['post_id'];?></td>
				<td><?php echo $row['post_author'];?></td>
				<td><?php echo $row['post_title'];?></td>
				<td><?php
					$category_row = getCategoryTitleUsingCatId($row);
					echo $category_row['cat_title'];
				?></td>
				<td><?php echo $row['post_status'];?></td>
				<td><img src='../images/<?php echo $row['post_image'];?>' width='100px'height='100px'></td>
				<td><?php echo $row['post_tags'];?></td>
				<td><?php echo countCommentsUsingId($row);?></td>
				<td><?php echo $row['post_date'];?></td>
				<td><a href='posts.php?source=edit_post&id=<?php echo $row['post_id'];?>'>Edit</a></td>
				<td><a href='posts.php?source=show_post&id=<?php echo $row['post_id'];?>'>Show</a></td>
				<td><a href='posts.php?delete_post=<?php echo $row['post_id'];?>'>Delete</a></td>
				<tr>
				<?php
			}
			?>
		</tbody>
	</table>
</div>

