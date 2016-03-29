<?php include "functions/router_function.php"?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">CMS Front</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="navbar-header collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<?php include "includes/show_categories.php"?>
			<li>
				<a href="admin">Admin</a>
			</li>
			<?php
			if(isset($_SESSION['auth'])){
				?>
				<li>
					<?php signOut()?>
					<a href="index.php?signOut=true"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
				</li>
				<?php
			} else {
				?>
				<li>
					<a href="index.php?source=create_account">Sign-up</a>
				</li>
				<?php
			}
			?>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>
