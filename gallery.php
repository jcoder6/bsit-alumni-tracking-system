<div class="gallery">
  <h3 class="content-title">Gallery</h3>
</div>
<?php $galleries = fetchGallery($pdo) ?>  

<div class="gallery-container">
  <?php foreach($galleries as $gallery): ?>
  <div class="gallery">
    <div class="batch-year">
      <?= 'BATCH ' . $gallery->img_year ?>
    </div>

    <div class="img-batch-container">
      <img src="./assets/images/gallery/<?= $gallery->gallery_img ?>" alt="gallery image">
    </div>
  </div>
  <?php endforeach; ?>  
</div>

<?php
  function fetchGallery($pdo) {
    $query = "SELECT g.gallery_img, g.img_year FROM gallery g ORDER BY g.img_year LIMIT 16";
    $stmt = $pdo->prepare($query);
    if($stmt->execute()){
      return $stmt->fetchAll();
    }
  }
?>