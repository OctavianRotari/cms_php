<div class="collapse navbar-collapse navbar-ex1-collapse">
	<ul class="nav navbar-nav side-nav">
		<li>
			<a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
		</li>
		<li>
			<a href="javascript:;" data-toggle="collapse" data-target="#posts_dropdown"><i class="fa fa-fw fa-arrows-v"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
			<ul id="posts_dropdown" class="collapse">
				<li>
					<a href="posts.php">View All Posts</a>
				</li>
				<li>
					<a href="posts.php?source=add_post">Add Posts</a>
				</li>
			</ul>
		</li>
		<li>
			<a href="categories.php"><i class="fa fa-fw fa-bar-chart-o"></i> Categories</a>
		</li>
		<li>
			<a href="comments.php"><i class="fa fa-fw fa-table"></i> Comments</a>
		</li>
		<?php
			$user_role = $_SESSION['user_role'];
			if($user_role === 'admin'){
			?>
				<li>
					<a href="javascript:;" data-toggle="collapse" data-target="#users"><i class="fa fa-fw fa-arrows-v"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
					<ul id="users" class="collapse">
						<li>
							<a href="users.php">Show All Users</a>
						</li>
						<li>
							<a href="users.php?source=add_user">Add User</a>
						</li>
					</ul>
				</li>
			<?php
			}
		?>
		<li>
			<a href="bootstrap-grid.html"><i class="fa fa-fw fa-wrench"></i> Profile</a>
		</li>
	</ul>
</div>
