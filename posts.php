<?php include "includes/header.php"?>
<body>
  <!-- Navigation -->
  <?php include "includes/navigation.php"?>
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <?php global $msg; $msg->display();?>
        <!-- First Blog Post -->
        <?php displayContentOfPage();?>
      </div>
      <!-- Blog Sidebar Widgets Column -->
      <?php include "includes/sidebar.php"?>
    </div>
    <!-- /.row -->
    <hr>
  <?php include "includes/footer.php"?>
