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

function deleteCurrentImg($imgName, $imgPath) {
  $isImg = $imgName != 'Image is not currently available' && $imgName != '';
  if ($isImg) {
    if (file_exists($imgPath)) {
      echo 'img-deleted';
      unlink($imgPath);
    } else {
      echo 'file does not exist';
    }
  }
}

function uploadNewImage($sourcePath, $destinationPath, $pdo, $query, $data) {
  if(move_uploaded_file($sourcePath, $destinationPath)) {
    $stmt = $pdo->prepare($query);
    $stmt->execute($data);
  }
}
