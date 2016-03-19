<?php
	$row = findRowInDb("posts", "id", "post");
?>
<h2>
	<a href='#'><?php echo $row["post_title"]?></a>
</h2>
<p class='lead'>
by <a href='index.php'><?php echo $row["post_author"]?></a>
</p>
<p><span class='glyphicon glyphicon-time'></span> Posted on <?php echo $row["post_date"]?> </p>
<hr>
<img class='img-responsive' src='<?php echo $row["post_image"]?>' alt='' height='300px' width='300px'>
<hr>
<p><?php echo $row["post_content"]?></p>
<hr>
