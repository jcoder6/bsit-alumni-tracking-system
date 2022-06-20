<section class="view-alumni-modal-container" <?php isViewAlumni() ?>>
  <?php include('./view-alumni.php'); ?>
</section>

<section class="view-alumni-modal-container" <?php isDeleteAlumni() ?>>
  <?php include('./delete-alumni.php'); ?>
</section>

<?php $resAlumni = fetchAllAlumni($pdo); ?>

<div class="alumni-list">
  <h1 class="section-name">ALUMNI LIST</h1>
</div>

<div class="manage-table alumni">
  <div class="table-head">
    <h3 class="table-name">List of Alumni</h3>
  </div>
  <div class="table-content">
    <div class="table-data">
      <div class="no">#</div>
      <div class="alumni-np">Alumni</div>
      <div class="course">Course</div>
      <div class="action head">Action</div>
    </div>
    <?php
    $no = 0;
    foreach ($resAlumni as $rs) :
      $no++;
    ?>
      <div class="table-data">
        <div class="no"><?= $no ?></div>
        <div class="alumni-np">
          <div class="alumni-img-container">
            <img src="../assets/images/no-img.PNG" alt="ALUMNI">
          </div>
          <h4 class="alumni-name"><?= $rs['firstname'] . ' ' . $rs['lastname'] ?></h4>
        </div>
        <div class="course"><?= $rs['course'] ?></div>
        <div class="action">
          <a class="alumni-action button-primary" href="<?php ROOT_URL ?>index.php?page=manage-alumni&view-alumni=<?= $rs['id'] ?>">View</a>
          <a class="alumni-action button-danger" href="<?php ROOT_URL ?>index.php?page=manage-alumni&delete-alumni=<?= $rs['id'] ?>">Delete</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>


<?php
function fetchAllAlumni($pdo) {
  $queryAlumni = "SELECT u.id, b.firstname, b.lastname, e.course FROM users u
  JOIN bio b ON b.user_id = u.id 
  JOIN educ e ON e.user_id = u.id
  WHERE u.category = 1";

  $stmtAlumni = $pdo->prepare($queryAlumni);
  if ($stmtAlumni->execute()) {
    return $stmtAlumni->fetchAll(PDO::FETCH_ASSOC);
  } else {
    echo 'failed';
  }
}

function isViewAlumni() {
  if (isset($_GET['view-alumni'])) {
    echo 'style="opacity: 1; z-index: 5;"';
  }
}

function isDeleteAlumni() {
  if (isset($_GET['delete-alumni'])) {
    echo 'style="opacity: 1; z-index: 5;"';
  }
}
?>