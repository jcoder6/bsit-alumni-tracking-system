<?php $img = fetchMainImg($pdo) ?>

<section class="main-page">
  <div class="hero-image-container">
    <img src="<?=  ROOT_URL ?>assets/images/<?= $img->page_img ?>" alt="MAIN PAGE PHOTO">
  </div>

  <div class="main-page-content">
    <h1 class="psu">Pangasinan State University</h1>
    <h3 class="welcome">Welcome to BSIT Alumni Tracking Management System</h3>
  </div>
</section>

<?php
  function fetchMainImg($pdo) {
    try {
      $query = "SELECT page_img FROM page WHERE id = 1";
      $stmt = $pdo->prepare($query);
      if($stmt->execute()) {
        return $stmt->fetch(PDO::FETCH_OBJ);
      } else {
        echo 'database connection failed'; 
      }
    } catch (PDOException $e) {
      echo $e;
    }
  } 
?>