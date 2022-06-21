<?php $resAlumni = fetchCurrentAlumni($pdo) ?>

<div class="alumni-modal">
  <div class="alumni-modal-head">
    <h3>Alumni Information</h3>
  </div>

  <div class="alumni-modal-content">
    <div class="alumni-img-container">
      <img src="../assets/images/no-img.PNG" alt="ALUMNI">
    </div>
    <div class="alumni-info">
      <div class="infor">
        <div class="key">Name:</div>
        <div class="value"><?= ucwords($resAlumni->firstname) . ' ' . ucwords($resAlumni->lastname) ?></div>
      </div>
      <div class="infor">
        <div class="key">Email:</div>
        <div class="value"><?= $resAlumni->email ?></div>
      </div>
      <div class="infor">
        <div class="key">Batch:</div>
        <div class="value"><?= $resAlumni->batch ?></div>
      </div>
      <div class="infor">
        <div class="key">Course:</div>
        <div class="value"><?= $resAlumni->course ?></div>
      </div>
      <div class="infor">
        <div class="key">Gender:</div>
        <div class="value"><?= ucwords($resAlumni->gender) ?></div>
      </div>
      <div class="infor">
        <div class="key">Employment:</div>
        <div class="value"><?= ucwords($resAlumni->employed) ?></div>
      </div>
      <div class="infor">
        <div class="key">Account Status:</div>
        <div class="value"><?php isVerified($resAlumni->is_verified); ?></div>
      </div>
    </div>
  </div>

  <div class="alumni-modal-foot">
    <form action="" method="post" <?= pointer($resAlumni->is_verified) ?>>
      <input type="submit" name="verify-account" class="button-success" value="Verify Account">
    </form>
    <a href="<?php ROOT_URL ?>index.php?page=manage-alumni" class="button-secondary">Close</a>
  </div>
</div>

<?php
if (isset($_POST['verify-account'])) {
  echo 'hello';
  $userID = $_GET['view-alumni'];
  echo $userID;
  $query = "UPDATE users SET is_verified = 1 WHERE id = $userID";
  $stmt = $pdo->prepare($query);
  if ($stmt->execute()) {
    messageNotif('success', 'Verified Account');
    echo "<script>window.location.href='" . ROOT_URL . "admin/index.php?page=manage-alumni';</script>";
  } else {
    messageNotif('error', 'Something went wrong');
    header('location: ' . ROOT_URL . 'admin/index.php?page=manage-alumni');
  }
}

function fetchCurrentAlumni($pdo) {
  $vaID = $_GET['view-alumni'];
  $queryView = "SELECT u.id, u.is_verified, b.firstname, b.lastname, b.email, e.batch, e.course, b.gender, em.employed FROM users u
  JOIN bio b ON b.user_id = u.id
  JOIN educ e ON b.user_id = u.id 
  JOIN employment em ON b.user_id = u.id
  WHERE u.id = $vaID 
  LIMIT 1";

  try {
    $stmtView = $pdo->prepare($queryView);
    $stmtView->execute();
    return $stmtView->fetchObject();
    // var_dump($resView);
  } catch (PDOException $e) {
    echo $e;
  }
}

function isVerified($isVerified) {
  echo $isVerified == 1 ? 'Verified' : 'Unverified';
}

function pointer($isVerified) {
  echo $isVerified == 1 ? 'style="pointer-events: none; opacity: .7"' : 'style="pointer-events:auto;  opacity: 1"';
}
?>