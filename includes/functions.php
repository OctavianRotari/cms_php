<?php include "db.php"?>
<?php
function readCategoriesFromDb(){
	global $connection;
	$query = "SELECT * FROM categories";
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("can't get data from db" . mysqli_error($connection));
	}
	while( $row = mysqli_fetch_assoc($result)){
	?>
		<li><a href="#"><?php echo $row["cat_title"]?></a></li>
	<?php
	}
}
?>
