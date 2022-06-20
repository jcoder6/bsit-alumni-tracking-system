<?php
$queryView = "SELECT u.id, u.is_verified, b.firstname, b.lastname, b.email, e.batch, e.course, b.gender, em.employed FROM users u
  JOIN bio b ON b.user_id = u.id
  JOIN educ e ON b.user_id = u.id 
  JOIN employment em ON b.user_id = u.id
  WHERE u.id = 25 
  LIMIT 1";

try {
  $stmtView = $pdo->prepare($queryView);
  $stmtView->execute();
  $rv = $stmtView->fetchObject();
  // var_dump($resView);
} catch (PDOException $e) {
  echo $e;
}
?>
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
        <div class="value"><?= ucwords($rv->firstname) . ' ' . ucwords($rv->lastname) ?></div>
      </div>
      <div class="infor">
        <div class="key">Email:</div>
        <div class="value"><?= $rv->email ?></div>
      </div>
      <div class="infor">
        <div class="key">Batch:</div>
        <div class="value"><?= $rv->batch ?></div>
      </div>
      <div class="infor">
        <div class="key">Course:</div>
        <div class="value"><?= $rv->course ?></div>
      </div>
      <div class="infor">
        <div class="key">Gender:</div>
        <div class="value"><?= ucwords($rv->gender) ?></div>
      </div>
      <div class="infor">
        <div class="key">Employment:</div>
        <div class="value"><?= ucwords($rv->employed) ?></div>
      </div>
      <div class="infor">
        <div class="key">Account Status:</div>
        <div class="value"><?php isVerified($rv->is_verified); ?></div>
      </div>
    </div>
  </div>

  <div class="alumni-modal-foot">
    <form action="" method="post"><input type="submit" name="verify-account" class="button-success" value="Verify Account"></form>
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
    header('location: ' . ROOT_URL . 'admin/index.php?page=manage-alumni');
  } else {
    messageNotif('error', 'Something went wrong');
    header('location: ' . ROOT_URL . 'admin/index.php?page=manage-alumni');
  }
}

function isVerified($isVerified) {
  echo $isVerified == 1 ? 'Verified' : 'Unverified';
}
?>