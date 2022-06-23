<?php include('./front-partials/header.php') ?>
<?php include('./front-partials/main-page.php'); ?>
<section class="content-container">
  <?php
  if (isset($_GET['page'])) {
    $fpage = $_GET['page'];

    if ($fpage == 'alumni') {
      include('./alumni.php');
    }

    if ($fpage == 'gallery') {
      include('./gallery.php');
    }

    if ($fpage == 'about') {
      include('./about.php');
    }

    if ($fpage == 'events') {
      include('./events.php');
    }

    if ($fpage == 'view-event') {
      include('./view-event.php');
    }
  } else {
    include('./events.php');
  }
  ?>
</section>


<?php include('./front-partials/footer.php') ?>