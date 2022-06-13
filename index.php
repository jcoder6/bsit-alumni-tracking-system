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

<body>
  <header>
    <nav class="navbar">
      <div class="logo-section">
        <div class="logo">
          <img src="./assets/images/Logo Psu.PNG" alt="LOGO">
        </div>
        <span class="project-name">BSIT Alumni Tracking Management System</span>
      </div>

      <ul class="menu-links">
        <a href="#" class="menu-link">
          <li>Home</li>
        </a>
        <a href="#" class="menu-link">
          <li>Alumni</li>
        </a>
        <a href="#" class="menu-link">
          <li>Gallery</li>
        </a>
        <a href="#" class="menu-link">
          <li>About</li>
        </a>
        <a href="#" class="menu-link">
          <li>Log in</li>
        </a>
      </ul>
    </nav>
  </header>


  <section class="main-page">
    <div class="hero-image-container">
      <img src="./assets/images/main page photo.jpg" alt="MAIN PAGE PHOTO">
    </div>

    <div class="main-page-content">
      <h1 class="psu">Pangasinan State University</h1>
      <h3 class="welcome">Welcome to BSIT Alumni Trackin Management System</h3>
    </div>

  </section>
</body>

</html>