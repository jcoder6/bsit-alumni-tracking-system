<div class="alumni-modal delete-modal">
  <div class="alumni-modal-head">
    <h3>Delete Gallery</h3>
  </div>
  <p class="del-msg">Are you sure? you want to delete this Gallery?</p>
  <div class="alumni-modal-foot">
    <form action="" method="post"><input type="submit" name="del-gal" class="button-danger" value="Delete Gallery"></form>
    <a href="<?php ROOT_URL ?>index.php?page=manage-gallery" class="button-secondary">Close</a>
  </div>
</div>

<?php
    if(isset($_POST['del-gal'])){
        $imgPath = '../assets/images/gallery/' . $_GET['img'];
        deleteCurrentImg($_GET['img'], $imgPath);
        $id = $_GET['delete-gallery'];
        $query = "DELETE FROM gallery WHERE id = $id";
        if($stmt = $pdo->prepare($query)->execute()){
            messageNotif('success', 'Deleted Gallery');
            echo "<script>window.location.href='" . ROOT_URL . "admin/index.php?page=manage-gallery';</script>"; 
        } else {
            messageNotif('success', 'Something Went Wrong');
            echo "<script>window.location.href='" . ROOT_URL . "admin/index.php?page=manage-gallery';</script>"; 
        }
    }
?>