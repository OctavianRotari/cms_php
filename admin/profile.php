<?php include "includes/admin_header.php"?>
<?php include "includes/admin_navigation.php"?>
<?php include "includes/functions/admin_profile_functions.php"?>
<?php include "includes/functions/flash_messages.php"?>
<?php global $msg; $msg->display();?>
  <div id="page-wrapper">
    <div class="container-fluid">
      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
            Welcome <?php echo $_SESSION['user_name'];?>
          </h1>
<?php
updateProfileInDb();
$user_id = $_SESSION['user_id'];
$result = readFromdb("users", " WHERE user_id='{$user_id}'");
while( $row = mysqli_fetch_assoc($result)){
?>
          <form action="profile.php" method="post" enctype="multipart/form-data">
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
              <label for="user_firstname">Firstname:</label><br>
              <input class="form-control" value="<?php echo $row['user_firstname'];?>" type="text" name="user_firstname">
            </div>
            <div class="form-group">
              <label for="user_lastname">Lastname:</label><br>
              <input class="form-control" value="<?php echo $row['user_lastname'];?>" type="text" name="user_lastname">
            </div>
            <div class="form-group">
              <label for="user_email">Email:</label><br>
              <input class="form-control" value="<?php echo $row['user_email'];?>" type="email" name="user_email">
            </div>
            <div class=form-group>
              <input class="btn btn-primary" value="Update Profile" type="submit" name="edit_profile">
            </div>
          </form>
<?php
}
?>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->
</div>
<?php include "includes/admin_footer.php"?>
