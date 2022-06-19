<?php include('./config/constants.php') ?>
<?php include('./config/db_connect.php') ?>
<?php include('./admin/inc/message.php') ?>
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

<body <?php if (isset($_GET['id']) || isset($_GET['caOpen']) || isset($_GET['alumni'])) { ?> class="scroll-lock" <?php } ?>>
  <?php
  createAccountOpen();
  registrationSuccessOpen();
  showMessage();
  ?>

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

        <?php checkUserLogged() ?>
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
  <section class="createAcct-modal-container" <?php isCreateAccount(); ?>>
    <?php include('./create-account.php'); ?>
  </section>
  <!-- CREATE ACCOUNT MODAL -->


  <section class="registerSuccess-modal-container" <?php isRSOpen() ?>>
    <?php include('./register-success.php'); ?>
  </section>



  <?php
  function checkUserLogged() {
    $is_logged = isset($_SESSION['user-logged']);
    $loggedLink = $is_logged ? $_SESSION['user-logged'] : 'Log in';
    $showLink = $is_logged ? 'style="display: block;"' : 'style="display: none;"';
    $dontShowLink = $is_logged ? 'style="display: none;"' : 'style="display: block;"';
  ?>
    <a href="user-page.php" class="menu-link" <?= $showLink ?>>
      <li><?= $loggedLink ?></li>
    </a>
    <a href="#" class="menu-link login-link" <?= $dontShowLink ?>>
      <li>Log in</li>
    </a>
  <?php
  }


  function createAccountOpen() {
    if (isset($_GET['caOpen'])) $_SESSION['caOpen'] = 'style="opacity: 1; z-index: 10;"';
  }

  function registrationSuccessOpen() {
    if (isset($_GET['alumni'])) $_SESSION['rso'] = 'style="opacity: 1; z-index: 10;"';
  }

  function isCreateAccount() {
    if (isset($_SESSION['caOpen'])) {
      echo $_SESSION['caOpen'];
      unset($_SESSION['caOpen']);
    }
  }

  function isRSOpen() {
    if (isset($_SESSION['rso'])) {
      echo $_SESSION['rso'];
      unset($_SESSION['rso']);
    }
  }
  ?>