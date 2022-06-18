<?php include('./front-partials/header.php'); ?>
<?php include('./front-partials/restrict.php'); ?>
<div class="user-sidebar">
  <div class="user-img-container">
    <img src="./assets/images/devs/jomer.webp" alt="USER IMAGE">
  </div>

  <h3 class="user-fullname">
    Jomer Dorego
  </h3>

  <a href="#"><button class="button2 user-sidebar-btn">Manage Account</button></a>
  <a href="<?= ROOT_URL ?>log-out.php"><button class="button2 user-sidebar-btn">Log out</button></a>
</div>

<div class="user-info-container">
  <div class="user-info">
    <h2 class="info-title">Biographical Information</h2>
    <div class="user-info-content">
      <div class="infor">
        <div class="key">Fullname:</div>
        <div class="value">Jomer Tamayo Dorego</div>
      </div>
      <div class="infor">
        <div class="key">Gender:</div>
        <div class="value">Male</div>
      </div>
      <div class="infor">
        <div class="key">Status:</div>
        <div class="value">Single</div>
      </div>
      <div class="infor">
        <div class="key">Contact No:</div>
        <div class="value">0923211534</div>
      </div>
      <div class="infor">
        <div class="key">Birth Date:</div>
        <div class="value">November 06, 2001</div>
      </div>
      <div class="infor">
        <div class="key">Email:</div>
        <div class="value">jdorego@gmail.com</div>
      </div>
      <div class="infor">
        <div class="key">Address:</div>
        <div class="value">Aliaga, Malasiqui, Pangasinan</div>
      </div>
    </div>
    <a href="#"><button class="button3 user-edit-btn">Edit</button></a>
  </div>

  <div class="user-info">
    <h2 class="info-title">Educational Information</h2>
    <div class="user-info-content">
      <div class="infor">
        <div class="key">Course:</div>
        <div class="value">BS Infomation Technology</div>
      </div>
      <div class="infor">
        <div class="key">Batch:</div>
        <div class="value">2024</div>
      </div>
    </div>
    <a href="#"><button class="button3 user-edit-btn">Edit</button></a>
  </div>

  <div class="user-info">
    <h2 class="info-title">Employment Information</h2>
    <div class="user-info-content">
      <div class="infor">
        <div class="key">Employed:</div>
        <div class="value">Yes</div>
      </div>
      <div class="infor">
        <div class="key">Company Name:</div>
        <div class="value">Microsoft</div>
      </div>
      <div class="infor">
        <div class="key">Position:</div>
        <div class="value">Project Manager</div>
      </div>
      <div class="infor">
        <div class="key">Salary Range:</div>
        <div class="value">100,000 - 200,000</div>
      </div>
    </div>
    <a href="#"><button class="button3 user-edit-btn">Edit</button></a>
  </div>
</div>