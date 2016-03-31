<?php $row = findRowInDb("users", "id", "user");?>
<div class="col-sm-6">
<?php updateUserInDb();?>
	<form action="users.php?source=edit_user&id=<?php echo $_GET['id']?>" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="user_name">Username:</label><br>
			<input class="form-control" value="<?php echo $row['user_name'];?>" type="text" name="user_name" >
		</div>
		<div class=form-group>
			<label for="user_image">Current Image:</label><br>
			<img name="current_image" src="../images/<?php echo $row['user_image']?>" width="300px" height="300px" name="user_current_image"><br>
			<label for="user_image">Image:</label>
			<input type="file" value="<?php echo $row['user_image'];?>" name="user_image">
		</div>
		<div class="form-group">
			<label for="user_password">Password:</label><br>
			<input class="form-control" value="<?php echo $row['user_password'];?>" type="text" name="user_password">
		</div>
		<div class="form-group">
			<label for="user_firstname">Firstname:</label><br>
			<input class="form-control" value="<?php echo $row['user_firstname'];?>" type="text" name="user_firstname">
		</div>
		<div class="form-group">
			<label for="user_secondname">Seconname:</label><br>
			<input class="form-control" value="<?php echo $row['user_secondname'];?>" type="text" name="user_secondname">
		</div>
		<div class="form-group">
			<label for="user_role">Role:</label><br>
			<select name="user_role" id="">
				<option value="<?php echo $row['user_role'];?>"><?php echo $row['user_role'];?></option>
				<?php
				if($row['user_role'] == 'user'){
					?>
					<option value="admin">Admin</option>
					<?php
				} else {
					?>
					<option value="user">User</option>
					<?php
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="user_email">Email:</label><br>
			<input class="form-control" value="<?php echo $row['user_email'];?>" type="email" name="user_email">
		</div>
		<div class=form-group>
			<input class="btn btn-primary" value="Update User" type="submit" name="edit_user">
		</div>
	</form>
</div>
