<ul class='pager'>
<?php
$number_of_pages = ceil($result['posts_count']/5);
for($i = 1; $i <= $number_of_pages; $i++){
	if(array_key_exists('author', $result)){
		if($_GET['page'] == $i){
			?>
				<li><a  class="active_link" href="posts.php?page=<?php echo $i?>&author=<?php echo $result['author'];?>"><?php echo $i?></a></li>
			<?php
		} else {
			?>
				<li><a href="posts.php?page=<?php echo $i?>&author=<?php echo $result['author'];?>"><?php echo $i?></a></li>
			<?php
		}
	} else if(array_key_exists('search', $result)){
		if($_GET['page'] == $i){
			?>
				<li><a  class="active_link" href="posts.php?page=<?php echo $i?>&search=<?php echo $result['search'];?>"><?php echo $i?></a></li>
			<?php
		} else {
			?>
				<li><a href="posts.php?page=<?php echo $i?>&search=<?php echo $result['search'];?>"><?php echo $i?></a></li>
			<?php
		}
	} else if(array_key_exists('cat_id', $result)){
		if($_GET['page'] == $i){
			?>
				<li><a  class="active_link" href="posts.php?page=<?php echo $i?>&cat_id=<?php echo $result['cat_id'];?>"><?php echo $i?></a></li>
			<?php
		} else {
			?>
				<li><a href="posts.php?page=<?php echo $i?>&cat_id=<?php echo $result['cat_id'];?>"><?php echo $i?></a></li>
			<?php
		}
	} else {
		if($_GET['page'] == $i){
			?>
				<li><a  class="active_link" href="posts.php?page=<?php echo $i?>"><?php echo $i?></a></li>
			<?php
		} else {
			?>
				<li><a href="posts.php?page=<?php echo $i?>"><?php echo $i?></a></li>
			<?php
		}
	}
}
?>
</ul>
