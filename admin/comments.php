<?php include "includes/admin_header.php"?>
<?php include "includes/admin_navigation.php"?>
<?php include "includes/functions/admin_comments_functions.php"?>
<?php include "includes/functions/flash_messages.php"?>
<div id="page-wrapper">
	<div class="container-fluid">
		<!-- Page Heading -->
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Welcome <?php echo $_SESSION['user_name'];?>
				</h1>
				<?php displayContentCommentsPage();?>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->
</div>
<?php include "includes/admin_footer.php"?>
