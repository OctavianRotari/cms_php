<?php
$row = findPostInDb();
$post_title = $row["post_title"];
$post_author = $row["post_author"];
$post_date = $row['post_date'];
$post_image = $row['post_image'];
$post_content = $row['post_content'];
echo
"<h2>
<a href='#'>{$post_title}</a>
</h2>
<p class='lead'>
by <a href='index.php'>{$post_author}</a>
</p>
<p><span class='glyphicon glyphicon-time'></span> Posted on {$post_date} </p>
<hr>
<img class='img-responsive' src='{$post_image}' alt='' height='300px' width='300px'>
<hr>
<p>{$post_content}</p>
<hr>";
?>
