<?php
function displayContentOfPage(){
	if(isset($_GET['source'])){
		$source = $_GET['source'];
	} else {
		$source = '';
	}
	switch($source){
		case 'show_post';
		include "includes/show_post.php";
		break;
		default:
		include 'includes/show_posts.php';
		break;
	}
}
?>
