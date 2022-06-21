<div class="login-container">
  <div class="close-btn"><i class="fa-solid fa-xmark"></i></div>
  <div class="login-head">
    <div class="logo-container">
      <img src="./assets/images/Logo Psu.PNG" alt="LOGO">
    </div>

    <h3>Log in</h3>
    <h4>BSIT Alumni Tracking Management System</h4>
  </div>
  <form action="#" method="post" class="login-form">
    <div class="form-groups">
      <div class="form-group username">
        <label class="label-name" for="username">Username</label>
        <input type="text" name="username" class="input username-input" placeholder="Username">
      </div>
    </div>
    <div class="form-groups">
      <div class="form-group password">
        <label class="label-name" for="password">Password</label>
        <input type="password" name="password" class="input password-input" placeholder="Password">
      </div>
    </div>

    <p>Not yet <span><a href="#" class="ca-link">Register</a></span>?</p>
    <input type="hidden" name="user-type" value="1">
    <input type="submit" name="login" value="Log in" class="button2 login-btn">
  </form>
</div>

<?php
// unset($_POST['login']);
if (isset($_POST['login'])) {
  $usernameLog = mysqli_real_escape_string($conn, $_POST['username']);
  $passwordLog = mysqli_real_escape_string($conn, md5($_POST['password']));
  $userTypeLog = mysqli_real_escape_string($conn, $_POST['user-type']);

  echo $usernameLog . $passwordLog . $userTypeLog;

  $query = "SELECT * FROM users WHERE category = ? AND username = ? AND password = ?";
  $stmtLog = $pdo->prepare($query);
  $stmtLog->execute([$userTypeLog, $usernameLog, $passwordLog]);
  $resLog = $stmtLog->fetchObject();

  var_dump($resLog);

  if ($resLog == false) {
    messageNotif('error', 'Incorrect username or password');
    header('location: ' . ROOT_URL . 'index.php?page=events');
  } else {
    if ($resLog->is_verified == 0) {
      messageNotif('error', 'You are not yet verified');
      header('location: ' . ROOT_URL . 'index.php?page=events');
      die();
    }
    $_SESSION['logged-user'] = $resLog->id;
    $_SESSION['user-logged'] = $resLog->username;
    messageNotif('success', 'Log in successfuly');
    header('location: ' . ROOT_URL . 'index.php?page=events');
  }
}
?>