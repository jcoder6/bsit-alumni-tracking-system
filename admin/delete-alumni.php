<div class="alumni-modal delete-modal">
  <div class="alumni-modal-head">
    <h3>Alumni Information</h3>
  </div>
  <p class="del-msg">Are you sure? you want to delete this Alumni</p>
  <div class="alumni-modal-foot">
    <form action="" method="post"><input type="submit" name="delete-account" class="button-danger" value="Delete Account"></form>
    <a href="<?php ROOT_URL ?>index.php?page=manage-alumni" class="button-secondary">Close</a>
  </div>
</div>

<?php
if (isset($_POST['delete-account'])) {
  $delID = $_GET['delete-alumni'];
  $delBioQuery = "DELETE FROM bio WHERE user_id = $delID";
  $delEducQuery = "DELETE FROM educ WHERE user_id = $delID";
  $delEmployQuery = "DELETE FROM employment WHERE user_id = $delID";
  $delUserQuery = "DELETE FROM users WHERE id = $delID";

  $delBioStmt = $pdo->prepare($delBioQuery);
  $delEducStmt = $pdo->prepare($delEducQuery);
  $delEmployStmt = $pdo->prepare($delEmployQuery);
  $delUsersStmt = $pdo->prepare($delUserQuery);

  if ($delBioStmt->execute() && $delEducStmt->execute() && $delEmployStmt->execute() && $delUsersStmt->execute()) {
    messageNotif('success', 'Deleted Successfuly');
    echo "<script>window.location.href='" . ROOT_URL . "admin/index.php?page=manage-alumni';</script>";
  } else {
    echo 'failed';
  }
}
?>