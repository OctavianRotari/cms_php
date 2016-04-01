<?php include "includes/admin_header.php"?>
	<?php include "includes/admin_navigation.php"?>
	<?php include "includes/functions/admin_categories_functions.php"?>
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
						<div class="col-xs-6">
							<?php insertingCategoriesIntoDb();?>
							<form action="categories.php" method="post">
								<div class="form-group">
									<label for="cat_title">Add Category</label>
									<input type="text" class="form-control" name="cat_title">
								</div>
								<div class="form-group">
									<input type="submit" value="Add new" name="submit" class="btn btn-primary">
								</div>
							</form>
							<?php 
							if(isset($_GET['update'])){
								$row = findRowInDb("categories", "update", "cat");
							?>
								<form action='categories.php' method='post'>
									<div class='form-group'>
										<label for='cat_title'>Update Category with Id: </label>
										<input class='control-label' style='border:none' readonly value='<?php echo $row['cat_id'];?>' name='cat_id'>
										<input type='text' class='form-control' value='<?php echo $row['cat_title'];?>' name='cat_title'>
									</div>
									<div class='form-group'>
										<input type='submit' value='Update' name='update' class='btn btn-primary'>
									</div>
								</form>
							<?php 
							}
							?>
							<?php updateCategoryInDb() ?>
						</div>
						<div class="col-xs-6">
						<table class="table table-bordered table-hover">
							<?php deleteRowFromDb("categories", "delete", "cat");?>
							<thead>
								<tr>
									<th>Id</th>
									<th>Category Title</th>
								</tr>
							</thead>
							<tbody>
							<?php 
							$result = readFromDb("categories");
							while( $row = mysqli_fetch_assoc($result)){
								?>
								<tr>
								<td><?php echo $row["cat_id"];?></td>
								<td><?php echo $row["cat_title"];?></td>
								<?php
								$user_role = $_SESSION['user_role'];
								if($user_role === 'admin'){
									?>
								<td><a onclick="return confirm('Are you sure you want to delete?')" href='categories.php?delete=<?php echo $row["cat_id"];?>'>Delete</a></td>
								<?php
								}
								?>
								<td><a href='categories.php?update=<?php echo $row["cat_id"];?>'>Update</a></td>
								<tr>
								<?php
							}
							?>
							</tbody>
						</table>
						</div>
					</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container-fluid -->
		</div>
		<!-- /#page-wrapper -->
	</div>
<?php include "includes/admin_footer.php"?>
