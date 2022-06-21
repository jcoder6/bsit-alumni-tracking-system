<?php editBio($pdo, $conn) ?>
<div class="registration-head">
  <a href="<?= ROOT_URL ?>user-page.php?user=<?= $_GET['user'] ?>" class="reg-close-btn"><i class="fa-solid fa-xmark"></i></a>
  <div class="logo-container">
    <img src="./assets/images/Logo Psu.PNG" alt="LOGO">
  </div>
  <div class="regis-head-content">
    <h3 class="registration-title">Registration</h3>
    <p class="registration-sub">BSIT Alumni Tracking Management System</p>
  </div>
</div>

<div class="register-form-container">
  <form action="#" method="post" class="registration-forms">
    <div class="bio-info">
      <h4 class="form-title">Biographical Information</h4>

      <div class="form-groups">
        <div class="form-group name">
          <label class="label-name" for="fName">First Name <span class="required">*</span> </label>
          <input required type="text" name="fName" class="input name-input" placeholder="First name" value="<?= $bio->firstname ?>">
        </div>
        <div class="form-group name">
          <label class="label-name" for="fName">Middle Name <span class="required">*</span> </label>
          <input required type="text" name="mName" class="input name-input" placeholder="Middle name" value="<?= $bio->middlename ?>">
        </div>
        <div class="form-group name">
          <label class="label-name" for="fName">Last Name <span class="required">*</span> </label>
          <input required type="text" name="lName" class="input name-input" placeholder="Last name" value="<?= $bio->lastname ?>">
        </div>
      </div>

      <div class="form-groups">
        <div class="form-group contact">
          <label class="label-name" for="contact_number">Contact Number <span class="required">*</span> </label>
          <input required type="number" name="contact_number" class="input contact-input" placeholder="XXX-XXX-XXXX" value="<?= $bio->contactno ?>">
        </div>
        <div class="form-group contact">
          <label class="label-name" for="email_address">Email Address <span class="required">*</span> </label>
          <input required type="email" name="email_address" class="input contact-input" placeholder="example@gmail.com" value="<?= $bio->email ?>">
        </div>
      </div>

      <div class="form-groups person">
        <div class="form-group personal">
          <label class="label-name" for="gender">Gender<span class="required">*</span></label>
          <select required class="personal-select" name="gender" class="input personal-input">
            <option value="<?= $bio->gender ?>" selected hidden><?= $bio->gender ?></option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>

        <div class="form-group personal">
          <label for="birthdate" class="label-name">Birth Date <span class="required">*</span> </label>
          <input required type="date" class="b-day" name="birthdate" value="<?= ucwords($bio->birthdate) ?>">
        </div>

        <div class="form-group personal">
          <label class="label-name" for="status">Status <span class="required">*</span> </label>
          <select required class="personal-select" name="status" class="input personal-input">
            <option value="<?= $bio->status ?>" selected hidden><?= $bio->status ?></option>
            <option value="single">Single</option>
            <option value="married">Married</option>
          </select>
        </div>
      </div>

      <div class="form-groups">
        <div class="form-group contact">
          <label class="label-name" for="house">House#/Street/Brgy. <span class="required">*</span> </label>
          <input required type="text" name="house" class="input addr1-input" placeholder="#/street/brgy." value="<?= $bio->house ?>">
        </div>
        <div class="form-group contact">
          <label class="label-name" for="municipal">Municipality <span class="required">*</span> </label>
          <input required type="text" name="municipal" class="input addr1-input" placeholder="Municipality" value="<?= $bio->municipal ?>">
        </div>
      </div>

      <div class="form-groups">
        <div class="form-group addr2">
          <label class="label-name" for="zip">Zip Code <span class="required">*</span> </label>
          <input required type="number" name="zip" class="input addr2-input" placeholder="0000" value="<?= $bio->zipcode ?>">
        </div>
        <div class="form-group addr2">
          <label class="label-name" for="province">Provincial <span class="required">*</span> </label>
          <input required type="text" name="province" class="input addr2-input" placeholder="Provincial" value="<?= $bio->province ?>">
        </div>
        <div class="form-group addr2">
          <label class="label-name" for="country">Country <span class="required">*</span> </label>
          <input required type="text" name="country" class="input addr2-input" placeholder="Country" value="<?= $bio->country ?>">
        </div>
      </div>
      <input type="submit" name="bio-submit" value="Submit" class="button1 register-btn">
    </div>
  </form>
</div>

<?php
function editBio($pdo, $conn) {
  if (isset($_POST['bio-submit'])) {
    $userID = $_GET['user'];
    // BIOGRAPHICAL INFORMATION
    $firstname = mysqli_real_escape_string($conn, $_POST['fName']);
    $middlename = mysqli_real_escape_string($conn, $_POST['mName']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lName']);
    $contactNumber = mysqli_real_escape_string($conn, $_POST['contact_number']);
    $emailAddress = mysqli_real_escape_string($conn, $_POST['email_address']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $birthDate = mysqli_real_escape_string($conn, $_POST['birthdate']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $houseNo = mysqli_real_escape_string($conn, $_POST['house']);
    $municipal = mysqli_real_escape_string($conn, $_POST['municipal']);
    $zipCode = mysqli_real_escape_string($conn, $_POST['zip']);
    $province = mysqli_real_escape_string($conn, $_POST['province']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $bioData = [
      $firstname, $middlename, $lastname, $contactNumber, $emailAddress, $gender, $birthDate, $status, $houseNo, $municipal, $zipCode, $province, $country, $userID
    ];
    /* echo 
      $firstname . '<br>' .
      $middlename . '<br>' .
      $lastname . '<br>' .
      $contactNumber . '<br>' .
      $emailAddress . '<br>' .
      $gender . '<br>' .
      $birthDate . '<br>' .
      $status . '<br>' .
      $houseNo . '<br>' .
      $municipal . '<br>' .
      $zipCode . '<br>' .
      $province . '<br>' .
      $country . '<br><br>' .*/


    $query = "UPDATE bio SET 
          firstname = ? ,
          middlename = ? ,
          lastname = ? ,
          contactno = ? ,
          email = ? ,
          gender = ? ,
          birthdate = ? ,
          status = ? ,
          house = ? ,
          municipal = ? ,
          zipcode = ? ,
          province = ? ,
          country = ?
      WHERE user_id = ?";
    // echo $pdo;
    try {
      $stmt = $pdo->prepare($query);
      if ($stmt->execute($bioData)) {
        messageNotif('success', 'Update Success');
        echo "<script>window.location.href='" . ROOT_URL . "user-page.php?user=" . $userID . "';</script>";
      } else {
        messageNotif('error', 'Somethin went wrong');
        echo "<script>window.location.href='" . ROOT_URL . "user-page.php?user=" . $userID . "';</script>";
      }
    } catch (PDOException $e) {
      echo $e;
    }
  }
}
?>