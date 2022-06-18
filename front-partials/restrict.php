<?php
if (!isset($_SESSION['user-logged'])) {
  messageNotif('error', 'You need to log in first');
  header('location: ' . ROOT_URL);
}
