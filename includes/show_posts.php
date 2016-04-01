<?php include "functions/posts_functions.php"?>
<?php
$result = showContentPostsPage();
$rowCount = $result['posts']->num_rows;
if($rowCount === 0 ){
	echo "<h3 class='text-center'>No results found</h3>";
}
while($row = mysqli_fetch_assoc($result['posts'])){
	$post_id = $row["post_id"];
	$post_title = $row["post_title"];
	$post_author = $row["post_author"];
	$post_date = $row['post_date'];
	$post_image = $row['post_image'];
	$post_content = $row['post_content'];
	?>
	<h2><a href='index.php?source=show_post&id=<?php echo $post_id;?>'><?php echo $post_title;?></a></h2>
	<p class='lead'>
	by <a href='index.php?page=1&author=<?php echo $post_author;?>'><?php echo $post_author;?></a>
	</p>
	<p><span class='glyphicon glyphicon-time'></span> Posted on <?php echo $post_date;?></p>
	<hr>
	<img class='img-responsive' src='images/<?php echo $post_image;?>' alt='' height='300px' width='300px'>
	<hr>
	<p maxlength='10'><?php echo limitParagraphLength($post_content);?></p>
	<a class='btn btn-primary' href='index.php?source=show_post&id=<?php echo $post_id;?>'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>
	<hr>
<?php
}
?>
<?php include "includes/show_num_page.php"?>
