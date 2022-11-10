<div class="alumni-modal delete-modal">
  <div class="alumni-modal-head">
    <h3>Alumni Information</h3>
  </div>
  <p class="del-msg">If you Reset the password the pass will become <strong>"psuats123"</strong> as default password
  <?php
    if(isset($_POST['reset-pass'])){
        $id = $_GET['reset'];
        $np = md5('psuats123');
        $query = "UPDATE users SET password = '$np' WHERE id = $id";   
        $stmt = $pdo->prepare($query);

        if($stmt->execute()){
            messageNotif('success', 'Password Reseted');
            echo "<script>window.location.href='" . ROOT_URL . "admin/index.php?page=manage-user';</script>";
        } else {
            messageNotif('error', 'Something went wrong');
            echo "<script>window.location.href='" . ROOT_URL . "admin/index.php?page=manage-user';</script>";
        }
    }
    ?>  
  </p>
  <div class="alumni-modal-foot">
    <form action="" method="post"><input type="submit" name="reset-pass" class="button-danger" value="Reset Password"></form>
    <a href="<?php ROOT_URL ?>index.php?page=manage-user" class="button-secondary">Close</a>
  </div>
</div>