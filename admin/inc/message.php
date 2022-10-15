<?php
function messageNotif($messagetype, $message) {
  $_SESSION['msg'] = '<div class="message" data-messageType=' . $messagetype . '>' . $message . '</div>';
}

function showMessage() {
  if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
}

function renameImg($imageCurrentName, $imgCustomName) {
  # GET THE EXTENSION NAME OF THE CURRENT IMAGE
  $ext = explode('.', $imageCurrentName);
  $ext = '.' . end($ext);

  # GENERATE THE NEW NAME WITH THE CUSTOM NAME
  $newName = $imgCustomName . '_' . rand(000, 999) . $ext;
  return $newName;
}
