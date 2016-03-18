<div>
	<table class="table table-bordered table-hover">
		<?php deletePost();?>
		<thead>
			<tr>
				<th>Post Id</th>
				<th>Author</th>
				<th>Title</th>
				<th>Category</th>
				<th>Status</th>
				<th>Image</th>
				<th>Tags</th>
				<th>Comments</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
			<?php displayPostsInTable();?>
		</tbody>
	</table>
</div>
