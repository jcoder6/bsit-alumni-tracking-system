<?php include('./config/constants.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Charis+SIL:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Charis+SIL:wght@400;700&family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="//db.onlinewebfonts.com/c/f3258385782c4c96aa24fe8b5d5f9782?family=Old+English+Text+MT" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="./scss/frontend-style/style/css/style.css">
  <link rel="stylesheet" href="./assets/css/all.css">

  <title><?= PROJECT_NAME ?></title>
</head>

<body <?php if (isset($_GET['id'])) { ?> class="scroll-lock" <?php } ?>>
  <header>
    <nav class="navbar">
      <div class="logo-section">
        <div class="logo">
          <img src="./assets/images/Logo Psu.PNG" alt="LOGO">
        </div>
        <span class="project-name">BSIT Alumni Tracking Management System</span>
      </div>

      <ul class="menu-links">
        <a href="<?= ROOT_URL ?>index.php?page=events" class="menu-link home-link">
          <li>Home</li>
        </a>
        <a href="<?= ROOT_URL ?>index.php?page=alumni" class="menu-link alumni-link">
          <li>Alumni</li>
        </a>
        <a href="<?= ROOT_URL ?>index.php?page=gallery" class="menu-link gallery-link">
          <li>Gallery</li>
        </a>
        <a href="<?= ROOT_URL ?>index.php?page=about" class="menu-link about-link">
          <li>About</li>
        </a>
        <a href="#" class="menu-link login-link">
          <li>Log in</li>
        </a>
      </ul>
    </nav>
  </header>
  <!-- LOG IN MODAL -->
  <section class="login-modal-container">
    <?php include('./log-in.php'); ?>
  </section>

  <!-- REGISTRATION MODAL -->
  <?php
  if (isset($_GET['id'])) {
  ?>
    <section class="registration-modal-container" style="opacity: 1; z-index: 10;">
      <?php include('./register.php'); ?>
    </section>
  <?php
  } else {
  ?>
    <section class="registration-modal-container">
      <?php include('./register.php'); ?>
    </section>
  <?php
  }
  ?>

  <!-- CREATE ACCOUNT MODAL -->
  <section class="createAcct-modal-container">
    <?php include('./create-account.php'); ?>
  </section>