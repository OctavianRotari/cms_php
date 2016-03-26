<?php
$result = displayCategories();
while( $row = mysqli_fetch_assoc($result)){
	$cat_title = $row["cat_title"];
	?>
		<li><a href='#'><?php echo $cat_title?></a></li>
	<?php
}
?>
