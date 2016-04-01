<div class="well">
	<?php signIn();?>
	<?php global $msg; $msg->display();?>
	<form action="index.php" method="post">
		<div class="form-group">
			<label for="user_name">Put your Username:</label><br>
			<input class="form-control" type="text" name="user_name" >
		</div>
		<label for="user_password">Put your Password:</label><br>
		<div class="input-group">
			<input class="form-control" type="password" name="user_password">
			<span class="input-group-btn">
				<button type="submit" name="sign_in" value="submited" class="btn btn-primary">Sign-in
				</button>
			</span>
		</div>
	</form>
</div>
