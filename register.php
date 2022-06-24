<?php
$courses = fetchAllCourse($pdo);
if (isset($_POST['register'])) {
  if (!isset($_GET['id']) || !isset($_SESSION['in-register'])) {
    messageNotif('error', 'Something went wrong');
    header('location: ' . ROOT_URL);
    die();
  }

  $userID = $_GET['id'];
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
    $userID, $firstname, $middlename, $lastname, $contactNumber, $emailAddress, $gender, $birthDate, $status, $houseNo, $municipal, $zipCode, $province, $country
  ];
  $bioQuery = "INSERT INTO bio(
        user_id,
        firstname,
        middlename,
        lastname,
        contactno,
        email,
        gender,
        birthdate,
        status,
        house,
        municipal,
        zipcode,
        province,
        country
      ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  insertData($bioQuery, $bioData, $pdo);
  // EDUCATIONAL INFORMATION

  $course = mysqli_real_escape_string($conn, $_POST['course']);
  $batch = mysqli_real_escape_string($conn, $_POST['batch']);

  $educData = [$userID, $course, $batch];
  $educQuery = "INSERT INTO educ(user_id, course, batch) VALUES(?, ?, ?)";

  insertData($educQuery, $educData, $pdo);
  // EMPLOYMENT INFORMATION
  $is_employed = mysqli_real_escape_string($conn, $_POST['employed']);
  $employed = $is_employed == 'on' ? 'employed' : 'unemployed';
  if ($employed == 'employed') {
    $company = mysqli_real_escape_string($conn, $_POST['company_name']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $salaryRange = mysqli_real_escape_string($conn, $_POST['salary_range']);
  } else {
    $company = 'unemployed';
    $position = 'unemployed';
    $salaryRange = 'unemployed';
  }

  $employData = [$userID, $employed, $company, $position, $salaryRange];
  $employQuery = "INSERT INTO employment(user_id, employed, company, position, salary) VALUES(?, ?, ?, ?, ?)";

  insertData($employQuery, $employData, $pdo);
  /*echo $firstname . '<br>' .
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
    $country . '<br><br>' .
    $course . '<br>' .
    $batch . '<br><br>' .
    $employed . '<br>' .
    $company . '<br>' .
    $position . '<br>' .
    $salaryRange . '<br><br>';*/


  $_SESSION['alumni-name'] = $firstname . ' ' . $middlename . ' ' . $lastname;
  messageNotif('success', 'Registered successfuly');

  header('location: ' . ROOT_URL . 'index.php?alumni=set');
}

function insertData($query, $data, $pdo) {
  try {
    $stmt = $pdo->prepare($query);
    $stmt->execute($data);
  } catch (PDOException $e) {
    echo $e;
  }
}

function fetchAllCourse($pdo) {
  $query = "SELECT course_name FROM course";
  $stmt = $pdo->prepare($query);
  if ($stmt->execute()) {
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  } else {
    echo 'error fetch';
  }
}
?>

<div class="registration-head">
  <a href="<?= ROOT_URL ?>cancel-reg.php?id=<?= $_GET['id'] ?>" class="reg-close-btn"><i class="fa-solid fa-xmark"></i></a>
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
          <input required type="text" name="fName" class="input name-input" placeholder="First name">
        </div>
        <div class="form-group name">
          <label class="label-name" for="fName">Middle Name <span class="required">*</span> </label>
          <input required type="text" name="mName" class="input name-input" placeholder="Middle name">
        </div>
        <div class="form-group name">
          <label class="label-name" for="fName">Last Name <span class="required">*</span> </label>
          <input required type="text" name="lName" class="input name-input" placeholder="Last name">
        </div>
      </div>

      <div class="form-groups">
        <div class="form-group contact">
          <label class="label-name" for="contact_number">Contact Number <span class="required">*</span> </label>
          <input required type="number" name="contact_number" class="input contact-input" placeholder="XXX-XXX-XXXX">
        </div>
        <div class="form-group contact">
          <label class="label-name" for="email_address">Email Address <span class="required">*</span> </label>
          <input required type="email" name="email_address" class="input contact-input" placeholder="example@gmail.com">
        </div>
      </div>

      <div class="form-groups person">
        <div class="form-group personal">
          <label class="label-name" for="gender">Gender <span class="required">*</span></label>
          <select required class="personal-select" name="gender" class="input personal-input">
            <option value="" selected disabled hidden>Choose here</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>

        <div class="form-group personal">
          <label for="birthdate" class="label-name">Birth Date <span class="required">*</span> </label>
          <input required type="date" class="b-day" name="birthdate">
        </div>

        <div class="form-group personal">
          <label class="label-name" for="status">Status <span class="required">*</span> </label>
          <select required class="personal-select" name="status" class="input personal-input">
            <option value="" selected disabled hidden>Choose here</option>
            <option value="single">Single</option>
            <option value="married">Married</option>
          </select>
        </div>
      </div>

      <div class="form-groups">
        <div class="form-group contact">
          <label class="label-name" for="house">House#/Street/Brgy. <span class="required">*</span> </label>
          <input required type="text" name="house" class="input addr1-input" placeholder="#/street/brgy.">
        </div>
        <div class="form-group contact">
          <label class="label-name" for="municipal">Municipality <span class="required">*</span> </label>
          <input required type="text" name="municipal" class="input addr1-input" placeholder="Municipality">
        </div>
      </div>

      <div class="form-groups">
        <div class="form-group addr2">
          <label class="label-name" for="zip">Zip Code <span class="required">*</span> </label>
          <input required type="number" name="zip" class="input addr2-input" placeholder="0000">
        </div>
        <div class="form-group addr2">
          <label class="label-name" for="province">Provincial <span class="required">*</span> </label>
          <input required type="text" name="province" class="input addr2-input" placeholder="Provincial">
        </div>
        <div class="form-group addr2">
          <label class="label-name" for="country">Country <span class="required">*</span> </label>
          <input required type="text" name="country" class="input addr2-input" placeholder="Country">
        </div>
      </div>
    </div>

    <div class="educ-info">
      <h4 class="form-title">Educational Information</h4>
      <div class="form-groups">
        <div class="form-group course">
          <label class="label-name" for="course">Course <span class="required">*</span> </label>
          <select required class="course-select" name="course" class="input course-input">
            <option value="" selected disabled hidden>Choose here</option>
            <?php foreach ($courses as $course) : ?>
              <option value="BS Information Technology"><?= $course->course_name ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="form-group batch">
          <label class="label-name" for="batch">Batch <span class="required">*</span> </label>
          <input required type="number" name="batch" class="input batch-input" placeholder="Batch">
        </div>
      </div>
    </div>

    <div class="employ-info">
      <h4 class="form-title">Employment Information</h4>
      <div class="form-groups">
        <div class="form-group is-employed">
          <input type="checkbox" name="employed" id="employCB">
          <label for="employed" class="label-name checkbox-lable">Employed</label>
        </div>
      </div>
      <div class="form-groups">
        <div class="form-group company_name disabled">
          <label class="label-name" for="company_name">Company Name</label>
          <input type="text" name="company_name" class="input company_name-input" placeholder="Company Name">
        </div>
      </div>
      <div class="form-groups">
        <div class="form-group position disabled">
          <label class="label-name" for="position">Position</label>
          <input type="text" name="position" class="input position-input" placeholder="Position">
        </div>
      </div>

      <div class="form-groups">
        <div class="form-group salary-range disabled">
          <label class="label-name" for="salary_range">Salary Range</label>
          <select class="salary-range-select" name="salary_range" class="input salary_range-input">
            <option value="" selected disabled hidden>Choose here</option>
            <option value="0-10,000">0-10,000</option>
            <option value="10,001-50,000">10,001-50,000</option>
            <option value="50,001-100,000">50,001-100,000</option>
            <option value="100,001-200,000">100,001-200,000</option>
            <option value="200,001 above">200,001 above</option>
          </select>
        </div>
      </div>

      <input type="submit" name="register" value="Register" class="button1 register-btn">
    </div>
  </form>
</div>