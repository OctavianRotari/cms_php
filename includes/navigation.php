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
			<a class="navbar-brand" href="posts.php?page=1">CMS Front</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="navbar-header navbar-right collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<?php
				if(isset($_SESSION['auth'])){
					?>
					<li>
						<a href="admin/posts.php"><i class="fa fa-fw fa-power-off"></i> Written Posts</a>
					</li>
					<li>
						<a href="admin/posts.php?source=add_post"><i class="fa fa-fw fa-power-off"></i> Write New Post</a>
					</li>
					<li>
						<a href="admin/profile.php"><i class="fa fa-fw fa-power-off"></i> Profile</a>
					</li>
					<li>
						<a href="admin">Admin area</a>
					</li>
					<li>
						<?php signOut()?>
						<a href="posts.php?signOut=true"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
					</li>
					<?php
				} else {
					?>
					<li>
						<a href="posts.php?source=create_account">Sign-up</a>
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
