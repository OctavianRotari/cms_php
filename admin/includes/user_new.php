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
      <label for="user_lastname">Seconname:</label><br>
      <input class="form-control" type="text" name="user_lastname">
    </div>
    <div class="form-group">
      <label for="user_role">Role:</label><br>
      <select name="user_role" id="">
        <option value="">Select Options</option>
        <option value="admin">Admin</option>
        <option value="user">User</option>
      </select>
    </div>
    <div class="form-group">
      <label for="user_email">Email:</label><br>
      <input class="form-control" type="email" name="user_email">
    </div>
    <div class=form-group>
      <input class="btn btn-primary" value="Add user" type="submit" name="add_new_user">
    </div>
  </form>
</div>
