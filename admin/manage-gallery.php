<section class="view-alumni-modal-container" <?php isDeleteGallery() ?>>
  <?php include('./delete-gallery.php'); ?>
</section>

<div class="manage-event">
  <h1 class="section-name">Manage Gallery</h1>
</div>

<?php $gallery = fetchAllEvent($pdo); ?>

<div class="manage-table events">
  <div class="table-head">
    <h3 class="table-name">List of Gallery</h3>
    <a href="<?= ROOT_URL ?>admin/index.php?page=add-gallery" class="add-btn add-event">
      <i class="fa-solid fa-plus"></i>Add Gallery
    </a>
  </div>

  <div class="table-content">
    <div class="table-data">
      <div class="column no">#</div>
      <div class="column title">Gallery Year</div>
      <div class="column date">Gallery Description</div>
      <div class="column photo">Gallery Image</div>
      <div class="column action head">Action</div>
    </div>
    <?php $num = 1; foreach($gallery as $gal): extract($gal)?>
    <div class="table-data">
      <div class="column no"><?= $num ?></div>
      <div class="column title"><?= $img_year ?></div>
      <div class="column date"><?= $img_description ?></div>
      <div class="column photo">
        <div class="event-img-container">
          <img src="../assets/images/gallery/<?= $gallery_img ?>" alt="EVENT">
        </div>
      </div>
      <div class="column action head">
        <a class="alumni-action button-primary" href="<?= ROOT_URL ?>admin/index.php?page=edit-gallery&edit=<?= $id ?>">Edit</a>
        <a class="alumni-action button-danger" href="<?= ROOT_URL ?>admin/index.php?page=manage-gallery&delete-gallery=<?= $id ?>&img=<?= $gallery_img ?>">Delete</a>
      </div>
    </div>
    <?php $num++; endforeach; ?>
  </div>
</div>

    <?php
    function fetchAllEvent($pdo) {
      $queryEvent1 = "SELECT * FROM gallery ORDER BY img_year DESC LIMIT 16";
      $stmtEvent1 = $pdo->prepare($queryEvent1);

      if ($stmtEvent1->execute()) {
        return $stmtEvent1->fetchAll(PDO::FETCH_ASSOC);
      } else {
        echo 'failed';
      }
    }

    function isDeleteGallery() {
      if(isset($_GET['delete-gallery'])){
        echo 'style="opacity: 1; z-index: 5;"';
      }
    }
    ?>