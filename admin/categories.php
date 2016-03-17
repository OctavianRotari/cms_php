<?php include "includes/admin_header.php"?>
<?php include "includes/admin_navigation.php"?>
	<div id="page-wrapper">
		<div class="container-fluid">
			<!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						Blank Page
						<small>Subheading</small>
					</h1>
					<ol class="breadcrumb">
						<li>
							<i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
						</li>
						<li class="active">
							<i class="fa fa-file"></i> Blank Page
						</li>
					</ol>
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
						<?php htmlFormUpdateCategory()?>
						<?php updateCategoryInDb() ?>
					</div>
					<div class="col-xs-6">
					<table class="table table-bordered table-hover">
						<?php deleteCategoryFromDb();?>
						<thead>
							<tr>
								<th>Id</th>
								<th>Category Title</th>
							</tr>
						</thead>
						<tbody>
							<?php displayCategoriesInTable();?>
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
