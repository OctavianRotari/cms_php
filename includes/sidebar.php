<div class="col-md-4">
	<!-- Blog Search Well -->
	<?php 
	?>
	<div class="well">
		<h4>Blog Search</h4>
		<form action="index.php" method="post">
		<div class="input-group">
			<input name="search" type="text" class="form-control">
			<span class="input-group-btn">
				<button class="btn btn-default" name="submit" type="submit">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</span>
		</div>
		<!-- /.input-group -->
	</div>
	<!-- Blog Categories Well -->
	<div class="well">
		<h4>Blog Categories</h4>
		<div class="row">
			<div class="col-lg-12">
				<ul class="list-unstyled">
					<?php displayCategories(" LIMIT 3")?>
				</ul>
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- Side Widget Well -->
	<?php include "widget.php"?>
</div>
