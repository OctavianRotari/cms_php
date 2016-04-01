<?php include "includes/admin_header.php"?>
<?php include "includes/admin_navigation.php"?>
	<div id="page-wrapper">
		<div class="container-fluid">
			<!-- Page Heading -->
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						Welcome <?php echo $_SESSION['user_name'];?>
					</h1>
				</div>
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-file-text fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
							<div class='huge'><?php echo countRowsInDb('posts', " WHERE post_author='{$_SESSION['user_name']}'");?></div>
									<div>Posts</div>
								</div>
							</div>
						</div>
						<a href="posts.php">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-green">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-comments fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
								<div class='huge'><?php echo countRowsInDb('comments', " WHERE comment_post_author='{$_SESSION['user_name']}'");?></div>
								<div>Comments</div>
								</div>
							</div>
						</div>
						<a href="comments.php">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
				<?php
				$user_role = $_SESSION['user_role'];
				if($user_role === 'admin'){
					?>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-yellow">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-user fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
									<div class='huge'><?php echo countRowsInDb('users');?></div>
										<div> Users</div>
									</div>
								</div>
							</div>
							<a href="users.php">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
				<?php
				}
				?>
				<div class="col-lg-3 col-md-6">
					<div class="panel panel-red">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-3">
									<i class="fa fa-list fa-5x"></i>
								</div>
								<div class="col-xs-9 text-right">
									<div class='huge'><?php echo countRowsInDb('categories');?></div>
									<div>Categories</div>
								</div>
							</div>
						</div>
						<a href="categories.php">
							<div class="panel-footer">
								<span class="pull-left">View Details</span>
								<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
								<div class="clearfix"></div>
							</div>
						</a>
					</div>
				</div>
			</div>
			<script type="text/javascript">
			<?php
			$totalNumberOfPosts = countRowsInDb('posts', " WHERE post_author='{$_SESSION['user_name']}'");
			$numberOfDraftPosts = countRowsInDb('posts', " WHERE post_author='{$_SESSION['user_name']}' AND post_status = 'draft'");
			$numberOfPublishedPosts = countRowsInDb('posts', " WHERE post_author='{$_SESSION['user_name']}' AND post_status = 'published'");
			$totalNumberOfComments = countRowsInDb('comments', " WHERE comment_post_author='{$_SESSION['user_name']}'");
			$numberOfDraftComments = countRowsInDb('comments', " WHERE comment_post_author='{$_SESSION['user_name']}' AND comment_status = 'unapproved'");
			$numberOfPublishedComments = countRowsInDb('comments', " WHERE comment_post_author='{$_SESSION['user_name']}' AND comment_status = 'approved'");
			?>
			google.charts.load('current', {'packages':['bar']});
			google.charts.setOnLoadCallback(drawChart);
			function drawChart() {
				var data = google.visualization.arrayToDataTable([
					['<?php echo $_SESSION['user_name'];?>', 'Draft', 'Published', 'Total'],
					['Posts', <?php echo $numberOfDraftPosts;?>, <?php echo $numberOfPublishedPosts;?>, <?php echo $totalNumberOfPosts;?>],
					['Comments', <?php echo $numberOfDraftComments;?>, <?php echo $numberOfPublishedComments;?>, <?php echo $totalNumberOfComments;?>],
				]);
				var options = {
				chart: {
				title: 'Posts & comments',
					subtitle: 'Published or not',
				}
				};
				var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
				chart.draw(data, options);
			}
			</script>
			<div class="row" id="columnchart_material" style="height: 500px; width:'auto'"></div>
				<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->
</div>
<?php include "includes/admin_footer.php"?>
