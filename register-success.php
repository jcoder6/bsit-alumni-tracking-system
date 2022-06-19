<div class="registration-head">
  <div class="logo-container">
    <img src="./assets/images/Logo Psu.PNG" alt="LOGO">
  </div>

  <div class="regis-head-content">
    <h3 class="registration-title">Registration</h3>
    <p class="registration-sub">BSIT Alumni Tracking Management System</p>
  </div>
</div>

<div class="register-form-container">
  <div class="message-modal-container">
    <div class="bc-img-container">
      <img src="./assets/images/bigcheck.PNG" alt="CHECK">
    </div>
    <div class="congrats-message-container">
      <h2 class="cm">You're All Caught</h2>
      <p class="wait-message">Congrats Mr./Ms. <span><?= $_SESSION['alumni-name'] ?></span> Just wait for office Verification. Then, you can log in to your account</p>
      <a href="<?= ROOT_URL ?>log-out.php"><button class="button1">Got it</button></a>
    </div>
  </div>
</div>