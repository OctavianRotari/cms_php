<?php include "includes/header.php"?>

<body>
	<!-- Navigation -->
	<?php include "includes/navigation.php"?>
	<!-- Page Content -->
	<div class="container">
		<div class="row">
			<!-- Blog Entries Column -->
			<div class="col-md-8">
				<h1 class="page-header">
					Page Heading
					<small>Secondary Text</small>
				</h1>
				<!-- First Blog Post -->
				<?php displayPosts("posts")?>
			</div>
			<!-- Blog Sidebar Widgets Column -->
			<?php include "includes/sidebar.php"?>
		</div>
		<!-- /.row -->
		<hr>

	<?php include "includes/footer.php"?>
