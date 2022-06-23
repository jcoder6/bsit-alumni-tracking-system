<?php include('./inc/header.php'); ?>
<?php include('./inc/sidebar.php'); ?>


<section class="feature">
  <div class="main-content">
    <?php
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
      if ($page == 'add-events') {
        include('./add-event.php');
      } else if ($page == 'manage-events') {
        include('./manage-events.php');
      } else if ($page == 'manage-alumni') {
        include('./manage-alumni.php');
      } else if ($page == 'manage-gallery') {
        include('./manage-gallery.php');
      } else if ($page == 'manage-course') {
        include('./manage-course.php');
      } else if ($page == 'manage-user') {
        include('./manage-user.php');
      } else if ($page == 'manage-website') {
        include('./manage-website.php');
      } else {
        include('./dashboard.php');
      }
    }
    ?>
  </div>
</section>

<?php include('./inc/footer.php'); ?>