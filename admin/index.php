<?php include('./inc/header.php'); ?>
<?php include('./inc/sidebar.php'); ?>


<section class="feature">
  <div class="main-content">
    <?php
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
      if ($page == 'dashboard') {
        include('./dashboard.php');
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
      } else {
        include('./manage-website.php');
      }
    }
    ?>
  </div>
</section>

<?php include('./inc/footer.php'); ?>