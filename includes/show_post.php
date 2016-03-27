<?php
$result = findRowsInDb();
while($row = mysqli_fetch_assoc($result)){
	$post_title = $row["post_title"];
	$post_author = $row["post_author"];
	$post_date = $row['post_date'];
	$post_image = $row['post_image'];
	$post_content = $row['post_content'];
?>
	<h2><?php echo $post_title;?></h2>
	<p class='lead'>
	by <a href='index.php'><?php echo $post_author;?></a>
	</p>
	<p><span class='glyphicon glyphicon-time'></span> Posted on <?php echo $post_date;?></p>
	<hr>
	<img class='img-responsive' src='images/<?php echo $post_image;?>' alt='' height='300px' width='300px'>
	<hr>
	<p maxlength='10'><?php echo $post_content;?></p>
	<a class='btn btn-primary' href='index.php'><span class='glyphicon glyphicon-chevron-left'></span> Go Back</a>
	<hr>
<?php
}
?>

