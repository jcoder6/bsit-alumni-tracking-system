<?php
if (!isset($_SESSION['user-logged'])) {
  messageNotif('error', 'You need to log in first');
  echo "<script>window.location.href='" . ROOT_URL . "index.php?page=events';</script>";
  exit;
}
