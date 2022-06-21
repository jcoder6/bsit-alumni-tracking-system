<?php editEduc($pdo, $conn) ?>
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
    <div class="educ-info" style="margin-top: 9rem;">
      <h4 class="form-title">Educational Information</h4>
      <div class="form-groups">
        <div class="form-group course">
          <label class="label-name" for="course">Course <span class="required">*</span> </label>
          <select required class="course-select" name="course" class="input course-input">
            <option selected disabled hidden>Choose here</option>
            <option value="BS Information Technology" selected>BS Information Technology</option>
          </select>
        </div>
        <div class="form-group batch">
          <label class="label-name" for="batch">Batch <span class="required">*</span> </label>
          <input required type="number" name="batch" class="input batch-input" placeholder="Batch" value="<?= $educ->batch ?>">
        </div>
      </div>

      <input type="submit" name="educ-submit" value="Submit" class="button1 register-btn">
    </div>
  </form>
</div>

<?php
function editEduc($pdo, $conn) {
  if (isset($_POST['educ-submit'])) {
    $userID = $_GET['user'];
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $batch = mysqli_real_escape_string($conn, $_POST['batch']);

    $educData = [$course, $batch, $userID];
    $query = "UPDATE educ SET course = ?, batch = ? WHERE user_id = ?";

    try {
      $stmt = $pdo->prepare($query);
      if ($stmt->execute($educData)) {
        messageNotif('success', 'Update Success');
        echo "<script>window.location.href='" . ROOT_URL . "user-page.php?user=" . $userID . "';</script>";
      } else {
        messageNotif('error', 'Something went wrong');
        echo "<script>window.location.href='" . ROOT_URL . "user-page.php?user=" . $userID . "';</script>";
      }
    } catch (PDOException $e) {
      echo $e;
    }
  }
}
?>