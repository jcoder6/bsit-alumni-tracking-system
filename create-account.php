<div class="registration-head">
  <a href="<?= ROOT_URL ?>" class="ca-close-btn"><i class="fa-solid fa-xmark"></i></a>
  <div class="logo-container">
    <img src="./assets/images/Logo Psu.PNG" alt="LOGO">
  </div>

  <div class="regis-head-content">
    <h3 class="registration-title">Registration</h3>
    <p class="registration-sub">BSIT Alumni Tracking Management System</p>
  </div>
</div>
<div class="register-form-container">
  <div class="registration-forms">
    <form action="#" method="POST" class="acct-info">
      <h4 class="form-title">Registration Account</h4>
      <div class="form-groups">
        <div class="form-group username">
          <label class="label-name" for="username">Username</label>
          <input type="text" name="username" class="input username-input" placeholder="Username" required>
        </div>
      </div>
      <div class="form-groups">
        <div class="form-group password">
          <label class="label-name" for="password">Password</label>
          <input type="password" name="password" class="input password-input" placeholder="Password" required>
        </div>
      </div>
      <div class="form-groups">
        <div class="form-group cpassword">
          <label class="label-name" for="cpassword">Confirm Password</label>
          <input type="password" name="cpassword" class="input password-input" placeholder="Confirm Password" required>
        </div>
      </div>

      <input type="submit" name="create_account" value="Register" class="button1 register-btn">
    </form>
  </div>
</div>

<?php
if (isset($_POST['create_account'])) {
  $registerUsername = mysqli_real_escape_string($conn, $_POST['username']);
  $registerPassword = mysqli_real_escape_string($conn, md5($_POST['password']));
  $regConfirmPassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
  $userCateg = 1;
  $isVerified = 0;


  if ($registerPassword == $regConfirmPassword) {
    // echo $registerUsername . $registerPassword . $regConfirmPassword . $userCateg . '<br>';
    try {
      $caQuery = "INSERT INTO users(is_verified, username, password, category) VALUES(?, ?, ?, ?)";
      $caStmt = $pdo->prepare($caQuery)->execute([$isVerified, $registerUsername, $registerPassword, $userCateg]);
      $_SESSION['regUsername'] = $registerUsername;
      $_SESSION['regPassword'] = $registerPassword;
      $_SESSION['in-register'] = 'hello';
      messageNotif('success', 'Created an Account, Just Fill out the form');
      echo ("<script>location.href = '" . ROOT_URL . "reg-form-route.php';</script>");
    } catch (Exception $e) {
      echo 'something went wrong';
    }
  } else {
    echo 'unmatch';
    messageNotif('error', 'Password not matched');
    echo ("<script>location.href = '" . ROOT_URL . "index.php?caOpen';</script>");
  }
}
?>