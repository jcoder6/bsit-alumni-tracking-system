<?php
include('./db_connect.php');
include('./inc/message.php');
if (!isset($_SESSION['user'])) {
  header('location: ' . ROOT_URL . 'admin/log-in.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Charis+SIL:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Charis+SIL:wght@400;700&family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../scss/backend-style/style/css/style.css">
  <link rel="stylesheet" href="../assets/css/all.css">

  <title><?= PROJECT_NAME ?></title>
</head>

<body <?php if (isset($_GET['view-alumni']) || isset($_GET['delete-alumni'])) echo 'style="overflow:hidden;"'; ?>>

  <?php
  if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
  }
  ?>
  <header>
    <nav class="navbar">
      <div class="logo-section">
        <div class="logo">
          <img src="../assets/images/Logo Psu.PNG" alt="LOGO">
        </div>
        <span class="project-name">BSIT Alumni Tracking System</span>
      </div>
      <a class="admin" href="#"><?= $_SESSION['user'] ?> <span class="space-left"><i class="fa-solid fa-caret-down"></i></span></a>

      <div class="admin-modal">
        <ul>
          <a href="#" class="admin-menu">
            <li><span><i class="fa-solid fa-gear"></i></span> Manage Acount</li>
          </a>
          <a href="<?= ROOT_URL . 'admin/log-out.php' ?>" class="admin-menu">
            <li><span><i class="fa-solid fa-power-off"></i></span> Log Out</li>
          </a>
        </ul>
      </div>
    </nav>
  </header>