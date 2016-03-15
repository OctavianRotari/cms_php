<?php include "db.php"?>
<?php
function readFromDb($table){
	global $connection;
	$query = "SELECT * FROM $table";
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("can't get data from db" . mysqli_error($connection));
	}
	return $result;
}

function displayCategories($table){
	$result = readFromDb($table);
	while( $row = mysqli_fetch_assoc($result)){
	?>
		<li><a href="#"><?php echo $row["cat_title"]?></a></li>
	<?php
	}
}

function displayPosts($table){
	$result = readFromDb($table);
	while($row = mysqli_fetch_assoc($result)){
		?>
		<h2>
		<a href="#"><?php echo $row["post_title"]?></a>
		</h2>
		<p class="lead">
		by <a href="index.php"><?php echo $row["post_author"]?></a>
		</p>
		<p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $row["post_date"]?></p>
		<hr>
		<img class="img-responsive" src="<?php echo $row['post_image']?>" alt="" height="300px" width="300px">
		<hr>
		<p>"<?php echo $row['post_content']?>"</p>
		<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
		<?php
	}
}
?>

