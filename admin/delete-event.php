<div class="alumni-modal delete-modal">
  <div class="alumni-modal-head">
    <h3>Course Information</h3>
  </div>
  <p class="del-msg">Are you sure? you want to delete this Event?</p>
  <div class="alumni-modal-foot">
    <form action="" method="post"><input type="submit" name="del-event" class="button-danger" value="Delete Event"></form>
    <a href="<?php ROOT_URL ?>index.php?page=manage-events" class="button-secondary">Close</a>
  </div>
</div>
<?php
    if(isset($_POST['del-event'])){
        if(isset($_GET['delete-event'])){
          # DELETE THE EVENT BANNER/IMAGE FROM THE DIRECTORY SO THAT IT WILL NOT TAKE SO MUCH SPACE.
          #SET THE IMAGE PATH THAT WILL BE DELETED.
          $imgPath = '../assets/images/events/' . $_GET['img'];
          #FUNCTION FOR DELETEING IMG IN MESSAGE FILE.
          deleteCurrentImg($_GET['img'], $imgPath);

          # DELETE THE EVENT FROM THE DATABASE
          $eventID = $_GET['delete-event'];
          $query = "DELETE FROM events WHERE id = :id";
          $stmt = $pdo->prepare($query);
                    
            if($stmt->execute(['id' => $eventID])){
                messageNotif('success', 'Event Deleted');
                echo "<script>window.location.href='" . ROOT_URL . "admin/index.php?page=manage-events';</script>";
            } else {
                messageNotif('error', 'something went wrong');
                echo "<script>window.location.href='" . ROOT_URL . "admin/index.php?page=manage-events';</script>";
            }
        }
    }

?>
