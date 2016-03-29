<?php include "includes/functions/users_functions.php"?>
<?php addNewUser();?>
<div class="well">
	<form action="#" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="user_name">Put your Username:</label><br>
			<input class="form-control" type="text" name="user_name" >
		</div>
		<div class=form-group>
			<label for="user_image">Put your Image:</label>
			<input type="file" name="user_image">
		</div>
		<div class="form-group">
			<label for="user_password">Put your Password:</label><br>
			<input class="form-control" type="password" name="user_password">
		</div>
		<div class="form-group">
			<label for="user_firstname">Put your Firstname:</label><br>
			<input class="form-control" type="text" name="user_firstname">
		</div>
		<div class="form-group">
			<label for="user_secondname">Put your Seconname:</label><br>
			<input class="form-control" type="text" name="user_secondname">
		</div>
		<div class="form-group">
			<label for="user_email">Put your Email:</label><br>
			<input class="form-control" type="text" name="user_email">
		</div>
		<button type="submit" name="create_account" value="submited" class="btn btn-primary">Create Account</button>
	</form>
</div>
