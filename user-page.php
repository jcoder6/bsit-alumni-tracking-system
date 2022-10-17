<?php include('./front-partials/header.php'); ?>
<?php include('./front-partials/restrict.php'); ?>

<?php
//FOR FETHCHING DATA OF THE USER
setQueries();
$acct = fetchUserData($acctQuery, $pdo);
$bio = fetchUserData($bioQuery, $pdo);
$educ = fetchUserData($educQuery, $pdo);
$employ = fetchUserData($employQuery, $pdo);
$userImg = getUserImage($pdo);

//FOR EDIT MODALS
isEditOpen($acct, $bio, $educ, $employ, $pdo, $conn);
?>

<div class="user-sidebar">
  <div class="user-img-container">
    <img src="./assets/images/profiles/<?= $userImg ?>" alt="USER IMAGE">
  </div>

  <h3 class="user-fullname">
    <?= $bio->firstname . ' ' . $bio->lastname ?>
  </h3>

  <a href="#"><button class="button2 user-sidebar-btn">Manage Account</button></a>
  <a href="<?= ROOT_URL ?>log-out.php"><button class="button2 user-sidebar-btn">Log out</button></a>
</div>

<div class="manage-overflow"></div>
<div class="manage-account-container">
  <span class="ma-closeBtn"><i class="fa-solid fa-xmark"></i></span>
  <div class="edit-image">
    <h4 class="section-title">Upload New Image</h4>
    <div class="user-profile">
      <img src="./assets/images/profiles/<?= $userImg ?>" alt="USER IMAGE">
    </div>
    <form class="upload-form" action="" method="post" enctype="multipart/form-data">
      <label for="avatar">Choose a profile picture:</label>
      <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
      <input type="submit" name="upload_img" value="Upload profile" class="button1 upload-img">
    </form>

    <!-- UPLOAD IMGAGE FUNCTION -->
    <?php
      if(isset($_FILES['avatar']['name'])){
        uploadNewProfile($conn, $pdo);
      }
    ?>
  </div>

  <div class="edit-acct">
    <h4 class="section-title">Change Password</h4>
    <div class="changePass-form-container">
      <div class="changePass-forms">
        <form action="#" method="POST" class="acct-info">
          <div class="form-groups">
            <div class="form-group curr_password">
              <label class="label-name" for="curr_password">Current Password</label>
              <input type="password" name="curr_password" class="input curr_password-input" placeholder="Current Password" required>
            </div>
          </div>
          <div class="form-groups">
            <div class="form-group new_password">
              <label class="label-name" for="new_password">New Password</label>
              <input type="password" name="new_password" class="input new_password-input" placeholder="New Password" required>
            </div>
          </div>
          <div class="form-groups">
            <div class="form-group cpassword">
              <label class="label-name" for="cpassword">Confirm Password</label>
              <input type="password" name="cpassword" class="input password-input" placeholder="Confirm Password" required>
            </div>
          </div>
          <input type="submit" name="changePassBtn" value="Change Password" class="button1 register-btn">
        </form>
      </div>
    </div>
  </div>

  <?php
    //IF CHANGE PASSWORD IS CLICKED
    if(isset($_POST['changePassBtn'])){
      changePassword($conn, $pdo);
    }
  ?>
</div>

<div class="user-info-container">
  <div class="user-info">
    <h2 class="info-title">Biographical Information</h2>
    <div class="user-info-content">
      <div class="infor">
        <div class="key">Fullname:</div>
        <div class="value"><?= ucwords($bio->firstname) . ' ' . ucwords($bio->middlename) . ' ' . ucwords($bio->lastname) ?></div>
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
          echo ucwords($bio->house) . ', ' . ucwords($bio->municipal) . ', ' . ucwords($bio->province);
          ?>
        </div>
      </div>
    </div>
    <a class="button3 user-edit-btn" href="<?= ROOT_URL ?>user-page.php?user=<?= $_GET['user'] ?>&edit=bio">Edit</a>
  </div>

  <div class="user-info">
    <h2 class="info-title">Educational Information</h2>
    <div class="user-info-content">
      <div class="infor">
        <div class="key">Course:</div>
        <div class="value"><?= ucwords($educ->course) ?></div>
      </div>
      <div class="infor">
        <div class="key">Batch:</div>
        <div class="value"><?= $educ->batch ?></div>
      </div>
    </div>
    <a class="button3 user-edit-btn" href="<?= ROOT_URL ?>user-page.php?user=<?= $_GET['user'] ?>&edit=educ">Edit</a>
  </div>

  <div class="user-info">
    <h2 class="info-title">Employment Information</h2>
    <div class="user-info-content">
      <div class="infor">
        <div class="key">Employed:</div>
        <div class="value"><?= ucwords($employ->employed) ?></div>
      </div>
      <div class="infor">
        <div class="key">Company Name:</div>
        <div class="value"><?= ucwords($employ->company) ?></div>
      </div>
      <div class="infor">
        <div class="key">Position:</div>
        <div class="value"><?= ucwords($employ->position) ?></div>
      </div>
      <div class="infor">
        <div class="key">Salary Range:</div>
        <div class="value"><?= ucwords($employ->salary) ?></div>
      </div>
    </div>
    <a class="button3 user-edit-btn" href="<?= ROOT_URL ?>user-page.php?user=<?= $_GET['user'] ?>&edit=employ">Edit</a>
  </div>
</div>

<script>
  /* ======================================
        MESSAGE ALERTS
========================================*/
  try {
    const msg = document.querySelector('.message');
    let msgType = msg.dataset.messagetype;


    document.addEventListener('DOMContentLoaded', () => {
      console.log(msg);
      console.log('hello');
      if (msgType == 'success') {
        msg.style.color = '#3d3d3d';
        msg.style.backgroundColor = '#96FE8A';
        msg.classList.add('message-active');
      }

      if (msgType == 'error') {
        msg.style.backgroundColor = '#F96F6F';
        msg.classList.add('message-active');
      }

      setTimeout(() => {
        msg.classList.remove('message-active');
      }, 2000);
    })
  } catch (e) {
    console.log(e);
  }

  const macloseBtn = document.querySelector('.ma-closeBtn')
  const manageAcctModal = document.querySelector('.manage-account-container');
  const maOpenBtn = document.querySelector('.user-sidebar-btn');
  const overflow = document.querySelector('.manage-overflow');
  const body = document.querySelector('body');
 
  console.log(overflow);
  macloseBtn.addEventListener('click', () => {
    manageAcctModal.classList.toggle('ma-close');
    body.classList.toggle('scroll-lock');
    overflow.classList.toggle('manage-overflow-open');
  })

  maOpenBtn.addEventListener('click', () => {
    manageAcctModal.classList.add('ma-close');
    body.classList.toggle('scroll-lock');
    overflow.classList.toggle('manage-overflow-open');
  })
</script>
<?php
function setQueries() {
  global $acctQuery;
  global $bioQuery;
  global $educQuery;
  global $employQuery;
  if (isset($_GET['user'])) {
    $id = $_GET['user'];
    $acctQuery = "SELECT * FROM users WHERE id = $id";
    $bioQuery = "SELECT * FROM bio WHERE user_id = $id";
    $educQuery = "SELECT * FROM educ WHERE user_id = $id";
    $employQuery = "SELECT * FROM employment WHERE user_id = $id";
  }
}

function fetchUserData($query, $pdo) {
  $stmt = $pdo->prepare($query);
  $stmt->execute();
  return $stmt->fetchObject();
}

function isEditOpen($acct, $bio, $educ, $employ, $pdo, $conn) {
  if (isset($_GET['user']) && isset($_GET['edit'])) {
    if ($_GET['edit'] == 'bio') : ?>
      <section class="registration-modal-container" style="opacity: 1; z-index: 10;">
        <?php include('./front-partials/user-edit/edit-bio.php'); ?>
      </section>
    <?php endif;
    if ($_GET['edit'] == 'educ') : ?>
      <section class="registration-modal-container" style="opacity: 1; z-index: 10;">
        <?php include('./front-partials/user-edit/edit-educ.php'); ?>
      </section>
    <?php endif;
    if ($_GET['edit'] == 'employ') : ?>
      <section class="registration-modal-container" style="opacity: 1; z-index: 10;">
        <?php include('./front-partials/user-edit/edit-employ.php'); ?>
      </section>
<?php endif;
  }
}

// CHANGE PASSWORD
function changePassword($conn, $pdo) {
  
  $currPass = mysqli_real_escape_string($conn, md5($_POST['curr_password']));
  $newPass = mysqli_real_escape_string($conn, md5($_POST['new_password']));
  $confirmPass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
  // echo $currPass . ' ' . $newPass . ' ' . $confirmPass;

//VERIFY IS THERE HAS A USER
if(isset($_GET['user'])) {
  $id = $_GET['user'];
} else {
  echo 'something went wrong!';
}

  //FETCH THE CURRENT PASSWORD OF THE USER
  $query = "SELECT password FROM users WHERE id = $id";
  $stmt = $pdo->prepare($query);
  $stmt->execute();
  $res = $stmt->fetchObject();
  $currentPassword = $res->password;

  if($currPass == $currentPassword) {
    // echo 'Pass';
    if($newPass == $confirmPass) {
      // echo 'new pass match';
      $updatePassQuery = "UPDATE user SET password = ? WHERE id = ?";
      $updatePassStmt = $pdo->prepare($updatePassQuery);

      try {
        $updatePassQuery = "UPDATE users SET password = :newPass WHERE id = :id";
        $updatePassStmt = $pdo->prepare($updatePassQuery);
        if($updatePassStmt->execute(['newPass' => $newPass, 'id' => $id])){
          messageNotif('success', 'Password Change Successfully');
        echo "<script>window.location.href='" . ROOT_URL . "index.php';</script>";

        }
      } catch(PDOException $e) {
        echo $e;
      }
    } else {
      messageNotif('error', 'New Password Not Match');
      echo "<script>window.location.href='" . ROOT_URL . "user-page.php?user=" . $id . "';</script>"; 
    }
  } else {
    messageNotif('error', 'Password Not Match');
    echo "<script>window.location.href='" . ROOT_URL . "user-page.php?user=" . $id . "';</script>"; 
  }
}

// UPLOAD NEW PROFILE
function uploadNewProfile($conn, $pdo) {
  // echo "New Prolfile";
  //GET THE IMAGE NAME TO THE INPUT
  $imgName = mysqli_real_escape_string($conn, $_FILES['avatar']['name']);
  // echo $imgName;  
  //CHECK IF THERE HAS AN IMAGE SELECTED 
  if($imgName != "") {
    // echo $imgName;
    #RENAME THE IMAGE 
    $newImageName = renameImg($imgName, 'USER_AVATAR');
    // echo $newImageName;
    # UPLOAD THE IMAGE INTO THE FILE FOLDER WITH 3 STEPS
    # 1. GET THE IMAGE SOURCE PATH
    $sourcePath = $_FILES['avatar']['tmp_name'];
    # 2. SET THE DESTINATION PATH FOR THE IMAGE
    $destinationPath = './assets/images/profiles/' . $newImageName;
    # 3. UPLOAD THE IMAGE
    if(!move_uploaded_file($sourcePath, $destinationPath)) {
        echo 'got here';
        messageNotif('error', 'Something went wrong');
        header('location:' . ROOT_URL . 'admin/index.php?page=add-events');
        die();
    } else {
      $updateImgDB = [
        'user_img' => $newImageName,
        'id' => $_GET['user']
      ];
      $query = "UPDATE users SET user_img = :user_img WHERE id = :id";
      $stmt = $pdo->prepare($query);
      $stmt->execute($updateImgDB);
      messageNotif('success', 'Profile Updated');
      echo "<script>window.location.href='" . ROOT_URL . "user-page.php?user=" . $_GET['user'] . "';</script>"; 

    }
  } else {
    messageNotif('error', 'No Image Selected');
    echo "<script>window.location.href='" . ROOT_URL . "user-page.php?user=" . $_GET['user'] . "';</script>"; 
  }
}

function getUserImage($pdo) {
  try{
    $query = "SELECT user_img FROM users WHERE id = :id";
    $stmt = $pdo->prepare($query);
    if ($stmt->execute(['id' => $_GET['user']])) {
      $res = $stmt->fetchObject();

      if($res->user_img != "") {
        return $res->user_img;
      } else {
        return 'no-img.PNG';
      }
    }
  } catch (PDOException $e) {
    echo $e;
  }

}
?>