<div class="alumni-modal delete-modal">
  <div class="alumni-modal-head">
    <h3>Alumni Information</h3>
  </div>
  <p class="del-msg">If you unverified this account the user will not be able to login in the system.
  
<?php
    if(isset($_POST['unverified'])){
        $id = $_GET['unverified'];
        $query = "UPDATE users SET is_verified = 0 WHERE id = $id";   
        $stmt = $pdo->prepare($query);

        if($stmt->execute()){
            messageNotif('success', 'Unverified Successfuly');
            echo "<script>window.location.href='" . ROOT_URL . "admin/index.php?page=manage-user';</script>";
        } else {
            messageNotif('error', 'Something went wrong');
            echo "<script>window.location.href='" . ROOT_URL . "admin/index.php?page=manage-user';</script>";
        }
    }
?> 
  </p>
  <div class="alumni-modal-foot">
    <form action="" method="post"><input type="submit" name="unverified" class="button-danger" value="Unverified"></form>
    <a href="<?php ROOT_URL ?>index.php?page=manage-user" class="button-secondary">Close</a>
  </div>
</div>
