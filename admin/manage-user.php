<div class="manage-user">
  <h1 class="section-name">MANAGE USER</h1>
</div>

<section class="view-alumni-modal-container" <?php isResetPassword() ?>>
  <?php include('./reset-user-passoword.php'); ?>
</section>

<section class="view-alumni-modal-container" <?php isUnverified() ?>>
  <?php include('./unverified-acct.php'); ?>
</section>

<?php $resAlumni = fetchAllAlumni($pdo); ?>

<div class="manage-table alumni">
  <div class="table-head">
    <h3 class="table-name">List of Alumni</h3>
  </div>
  <div class="table-content">
    <div class="table-data">
      <div class="column no">#</div>
      <div class="column alumni-np">Alumni</div>
      <div class="column course">Course</div>
      <div class="column action head">Action</div>
    </div>
    <?php
    $no = 0;
    foreach ($resAlumni as $rs) :
      $no++;
    ?>
      <div class="table-data">
        <div class="column no"><?= $no ?></div>
        <div class="column alumni-np">
          <div class="alumni-img-container">
            <img src="../assets/images/profiles/<?= $rs['user_img'] ?>" alt="<?= $rs['user_img'] ?>">
          </div>
          <h4 class="alumni-name"><?= $rs['firstname'] . ' ' . $rs['lastname'] ?></h4>
        </div>
        <div class="column course"><?= $rs['course'] ?></div>
        <div class="column action">
          <a class="alumni-action button-primary" href="<?php ROOT_URL ?>index.php?page=manage-user&reset=<?= $rs['id'] ?>">Reset Password</a>
          <a class="alumni-action button-primary" href="<?php ROOT_URL ?>index.php?page=manage-user&unverified=<?= $rs['id'] ?>">Unverified Account</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>


<?php
function fetchAllAlumni($pdo) {
  $queryAlumni = "SELECT u.id, u.user_img, b.firstname, b.lastname, e.course FROM users u
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

function isResetPassword() {
  if (isset($_GET['reset'])) {
    echo 'style="opacity: 1; z-index: 5;"';
  }
}

function isUnverified(){
  if (isset($_GET['unverified'])) {
    echo 'style="opacity: 1; z-index: 5;"';
  }
}