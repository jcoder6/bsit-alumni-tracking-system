<?php editEmploy($pdo, $conn) ?>

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
    <div class="employ-info" style="margin-top: 9rem;">
      <h4 class="form-title">Employment Information</h4>
      <div class="form-groups">
        <div class="form-group is-employed">
          <input type="checkbox" name="employed" id="editEmploy" <?php isEmployed($employ->employed) ?>>
          <label for="employed" class="label-name checkbox-lable">Employed</label>
        </div>
      </div>
      <div class="form-groups <?php isDisabled($employ->employed) ?>">
        <div class="form-group edit-company_name">
          <label class="label-name" for="company_name">Company Name</label>
          <input type="text" name="company_name" class="input company_name-input" placeholder="Company Name" value="<?= $employ->company ?>">
        </div>
      </div>
      <div class="form-groups <?php isDisabled($employ->employed) ?>">
        <div class="form-group edit-position">
          <label class="label-name" for="position">Position</label>
          <input type="text" name="position" class="input position-input" placeholder="Position" value="<?= $employ->position ?>">
        </div>
      </div>

      <div class="form-groups <?php isDisabled($employ->employed) ?>">
        <div class="form-group edit-salary-range">
          <label class="label-name" for="salary_range">Salary Range</label>
          <select class="salary-range-select" name="salary_range" class="input salary_range-input">
            <option value="<?= $employ->salary ?>" selected hidden><?= $employ->salary ?></option>
            <option value="0-10,000">0-10,000</option>
            <option value="10,001-50,000">10,001-50,000</option>
            <option value="50,001-100,000">50,001-100,000</option>
            <option value="100,001-200,000">100,001-200,000</option>
            <option value="200,001 above">200,001 above</option>
          </select>
        </div>
      </div>

      <input type="submit" name="employ-submit" value="Submit" class="button1 register-btn">
    </div>
  </form>
</div>

<?php
function isEmployed($employed) {
  echo $employed == 'employed' ? 'checked' : null;
}

function isDisabled($employed) {
  echo !$employed == 'employed' ? 'disabled' : null;
}
?>

<script>
  /* ======================================
      EMPLOYMENT FORM SCRIPT
========================================*/

  document.addEventListener('DOMContentLoaded', () => {
    const checkbox = document.getElementById('editEmploy')
    const companyName = document.querySelector('.edit-company_name');
    const position = document.querySelector('.edit-position');
    const salRange = document.querySelector('.edit-salary-range');

    if (!checkbox.checked) {
      companyName.classList.add('disabled');
      position.classList.add('disabled');
      salRange.classList.add('disabled');
    }

    checkbox.addEventListener('change', (event) => {
      let cbValue = (event.currentTarget.checked) ? 'employed' : 'unemployed';

      if (cbValue !== 'employed') {
        companyName.classList.add('disabled');
        position.classList.add('disabled');
        salRange.classList.add('disabled');
      }

      if (cbValue === 'employed') {
        companyName.classList.remove('disabled');
        position.classList.remove('disabled');
        salRange.classList.remove('disabled');
      }
    })
  })
</script>

<?php
function editEmploy($pdo, $conn) {
  if (isset($_POST['employ-submit'])) {
    $userID = $_GET['user'];
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

    $employData = [
      'employed' => $employed,
      'company' => $company,
      'position' => $position,
      'salary' => $salaryRange,
      'userID' => $userID
    ];

    $query = "UPDATE employment SET 
          employed = :employed, 
          company = :company, 
          position = :position, 
          salary = :salary 
        WHERE user_id = :userID";
    try {
      $stmt = $pdo->prepare($query);
      if ($stmt->execute($employData)) {
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