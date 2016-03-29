<?php 
session_start();
if(!$_SESSION['auth']){
	header('location:../index.php');
}
?>
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
							<i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
						</li>
						<li class="active">
							<i class="fa fa-file"></i> Blank Page
						</li>
					</ol>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->
</div>
<?php include "includes/admin_footer.php"?>
