<?php
$result = displayCategories();
while( $row = mysqli_fetch_assoc($result)){
	$cat_id = $row["cat_id"];
	$cat_title = $row["cat_title"];
	?>
		<li><a href='index.php?source=category&cat_id=<?php echo $cat_id?>'><?php echo $cat_title?></a></li>
	<?php
}
?>
