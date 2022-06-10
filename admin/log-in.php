<?php include('./db_connect.php'); ?>
<?php include('./inc/message.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Charis+SIL:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Charis+SIL:wght@400;700&family=Josefin+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../style/css/log-in.css">
  <title>Log-in as Admin</title>
</head>

<body>
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
        <span class="project-name">PANGASINAN STATE UNIVERSITY</span>
      </div>
    </nav>
  </header>
  <div class="img-container">
    <img src="../assets/images/main page photo.jpg" alt="hero img">
    <div class="overlay"></div>
  </div>

  <section class="log-in-section">
    <div class="form-container">
      <div class="logo-container">
        <img src="../assets/images/Logo Psu.PNG" alt="lOGO">
      </div>
      <h1 class="login-title">BSIT Alumni Tracking System</h1>
      <form action="#" method="post">
        <div class="form-group">
          <label for="username">Username: </label>
          <input type="text" name="username" placeholder="Username" class="username" />
        </div>

        <div class="form-group">
          <label for="password">Password: </label>
          <input type="password" name="password" placeholder="Password" class="password" />
        </div>

        <input type="hidden" name="user-type" value="0">;
        <input type="submit" name="submit" class="submitbtn" value="Log in">
      </form>
    </div>
  </section>

  <footer>
  </footer>

  <script src="../script/log-in.js"></script>
</body>

</html>

<?php
if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $userType = mysqli_real_escape_string($conn, $_POST['user-type']);

  // echo $username . " : " . $password . " : " . $userType;

  $query = "SELECT * FROM users WHERE category = ? AND username = ? AND password = ?";
  $stmt = $pdo->prepare($query);
  $stmt->execute([$userType, $username, $password]);
  $res = $stmt->fetchObject();

  if ($res == false) {
    messageNotif('error', 'Incorrect username or password');
    header('location: ' . ROOT_URL . 'admin/log-in.php');
  } else {
    $_SESSION['user'] = $res->username;
    messageNotif('success', 'Log in successfuly');
    header('location: ' . ROOT_URL . 'admin/index.php?page=dashboard');
  }
}
?>