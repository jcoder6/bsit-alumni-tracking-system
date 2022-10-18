<div class="alumni-modal delete-modal">
  <div class="alumni-modal-head">
    <h3>Alumni Information</h3>
  </div>
  <p class="del-msg">Are you sure? you want to delete this Course?
  </p>
  <div class="alumni-modal-foot">
    <form action="" method="post"><input type="submit" name="del-course" class="button-danger" value="Delete Course"></form>
    <a href="<?php ROOT_URL ?>index.php?page=manage-course" class="button-secondary">Close</a>
  </div>
</div>
<?php
  if(isset($_POST['del-course'])) {
      $courseID = $_GET['delete-course'];
      $query = "DELETE FROM course WHERE id = :id";
      $stmt = $pdo->prepare($query);
      if($stmt->execute(['id' => $courseID])){
        messageNotif('success', 'Course Deleted');
        echo "<script>window.location.href='" . ROOT_URL . "admin/index.php?page=manage-course';</script>";
      } else {
        messageNotif('error', 'something went wrong');
        echo "<script>window.location.href='" . ROOT_URL . "admin/index.php?page=manage-course';</script>";
      }
  }
?>
