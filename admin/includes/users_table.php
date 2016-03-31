<?php
$user_role = $_SESSION['user_role'];
if($user_role === 'admin'){
?>
<?php global $msg; $msg->display();?>
<div>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>User Id</th>
				<th>Username</th>
				<th>Firstname</th>
				<th>Secondname</th>
				<th>Email</th>
				<th>Image</th>
				<th>Role</th>
				<th>Delete</th>
				<th>Edit</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			deleteRowFromDb("users", "delete_user", "user");
			$result = readFromdb("users", " ORDER BY user_id DESC");
			while( $row = mysqli_fetch_assoc($result)){
		?>
				<tr>
				<td><?php echo $row['user_id'];?></td>
				<td><?php echo $row['user_name'];?></td>
				<td><?php echo $row['user_firstname'];?></td>
				<td><?php echo $row['user_secondname'];?></td>
				<td><?php echo $row['user_email'];?></td>
				<td><img src='../images/<?php echo $row['user_image'];?>' width='100px'height='100px'></td>
				<td><?php echo $row['user_role'];?></td>
				<td><a href='users.php?delete_user=<?php echo $row['user_id'];?>'>Delete</a></td>
				<td><a href='users.php?source=edit_user&id=<?php echo $row['user_id'];?>'>Edit</a></td>
				<tr>
		<?php
			}
		?>
		</tbody>

	</table>
</div>
<?php
}
?>
