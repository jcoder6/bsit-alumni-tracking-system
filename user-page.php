<?php include('./front-partials/header.php'); ?>
<?php include('./front-partials/restrict.php'); ?>
<?php
if (isset($_GET['user'])) {
  $id = $_GET['user'];
  $acctQuery = "SELECT * FROM users WHERE id = $id";
  $bioQuery = "SELECT * FROM bio WHERE user_id = $id";
  $educQuery = "SELECT * FROM educ WHERE user_id = $id";
  $employQuery = "SELECT * FROM employment WHERE user_id = $id";

  $acct = fetchUserData($acctQuery, $pdo);
  $bio = fetchUserData($bioQuery, $pdo);
  $educ = fetchUserData($educQuery, $pdo);
  $employ = fetchUserData($employQuery, $pdo);
}

function fetchUserData($query, $pdo) {
  $stmt = $pdo->prepare($query);
  $stmt->execute();
  return $stmt->fetchObject();
}
?>
<div class="user-sidebar">
  <div class="user-img-container">
    <img src="./assets/images/devs/jomer.webp" alt="USER IMAGE">
  </div>

  <h3 class="user-fullname">
    <?= $bio->firstname . ' ' . $bio->lastname ?>
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
        <div class="value"><?= $bio->firstname . ' ' . $bio->middlename . ' ' . $bio->lastname ?></div>
      </div>
      <div class="infor">
        <div class="key">Gender:</div>
        <div class="value"><?= ucwords($bio->gender) ?></div>
      </div>
      <div class="infor">
        <div class="key">Status:</div>
        <div class="value"><?= ucwords($bio->status) ?></div>
      </div>
      <div class="infor">
        <div class="key">Contact No:</div>
        <div class="value"><?= $bio->contactno ?></div>
      </div>
      <div class="infor">
        <div class="key">Birth Date:</div>
        <div class="value">
          <?php
          $bday = strtotime($bio->birthdate);
          echo date('F d, Y', $bday);
          ?>
        </div>
      </div>
      <div class="infor">
        <div class="key">Email:</div>
        <div class="value"><?= $bio->email ?></div>
      </div>
      <div class="infor">
        <div class="key">Address:</div>
        <div class="value">
          <?php
          echo $bio->house . ', ' . $bio->municipal . ', ' . $bio->province;
          ?>
        </div>
      </div>
    </div>
    <a href="#"><button class="button3 user-edit-btn">Edit</button></a>
  </div>

  <div class="user-info">
    <h2 class="info-title">Educational Information</h2>
    <div class="user-info-content">
      <div class="infor">
        <div class="key">Course:</div>
        <div class="value"><?= $educ->course ?></div>
      </div>
      <div class="infor">
        <div class="key">Batch:</div>
        <div class="value"><?= $educ->batch ?></div>
      </div>
    </div>
    <a href="#"><button class="button3 user-edit-btn">Edit</button></a>
  </div>

  <div class="user-info">
    <h2 class="info-title">Employment Information</h2>
    <div class="user-info-content">
      <div class="infor">
        <div class="key">Employed:</div>
        <div class="value"><?= $employ->employed ?></div>
      </div>
      <div class="infor">
        <div class="key">Company Name:</div>
        <div class="value"><?= $employ->company ?></div>
      </div>
      <div class="infor">
        <div class="key">Position:</div>
        <div class="value"><?= $employ->position ?></div>
      </div>
      <div class="infor">
        <div class="key">Salary Range:</div>
        <div class="value"><?= $employ->salary ?></div>
      </div>
    </div>
    <a href="#"><button class="button3 user-edit-btn">Edit</button></a>
  </div>
</div>