<div class="col-sm-6">
<?php addNewUser();?>
	<form action="users.php?source=add_user" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="user_name">Username:</label><br>
			<input class="form-control" type="text" name="user_name" >
		</div>
		<div class=form-group>
			<label for="user_image">Image:</label>
			<input type="file" name="user_image">
		</div>
		<div class="form-group">
			<label for="user_password">Password:</label><br>
			<input class="form-control" type="password" name="user_password">
		</div>
		<div class="form-group">
			<label for="user_firstname">Firstname:</label><br>
			<input class="form-control" type="text" name="user_firstname">
		</div>
		<div class="form-group">
			<label for="user_secondname">Seconname:</label><br>
			<input class="form-control" type="text" name="user_secondname">
		</div>
		<div class="form-group">
			<label for="user_email">Email:</label><br>
			<input class="form-control" type="text" name="user_email">
		</div>
		<div class=form-group>
			<input class="btn btn-primary" value="Add user" type="submit" name="add_new_user">
		</div>
	</form>
</div>
