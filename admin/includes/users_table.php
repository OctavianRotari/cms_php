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
        <th>Lastname</th>
        <th>Email</th>
        <th>Image</th>
        <th>Role</th>
        <th>Delete</th>
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
        <td><?php echo $row['user_lastname'];?></td>
        <td><?php echo $row['user_email'];?></td>
        <td><img src='../images/<?php echo $row['user_image'];?>' width='100px'height='100px'></td>
        <td><?php echo $row['user_role'];?></td>
        <td><a onclick="return confirm('Are you sure you want to delete?')" href='users.php?delete_user=<?php echo $row['user_id'];?>'>Delete</a></td>
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
