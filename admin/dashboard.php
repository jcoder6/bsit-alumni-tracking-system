<div class="dashboard">
  <h1 class="section-name">DASHBOARD</h1>
</div>
<?php $totalAlumni = getTotalAlumni($pdo); ?>
<?php $unverifiedAlumni = getUnverifiedAlumni($pdo); ?>
<?php $salaryData = getSalaryData($pdo); ?>
<?php $employmentData = getEmploymentData($pdo); ?>
<?php $upComingEvents = getUpComingEvents($pdo); ?>

<?php //var_dump($employmentData) 
?>

<div class="dashboard-content">
  <div class="chart up-events">
    <div class="icon-num">
      <i class="fa-solid fa-users"></i>
      <div class="chart-content">
        <h3><?= $totalAlumni ?></h3>
        <p class="chart-name">Alumnae/Alumnus</p>
      </div>
    </div>

  </div>
  <div class="chart unverified">
    <div class="icon-num">
      <i class="fa-solid fa-user-xmark"></i>
      <div class="chart-content">
        <h3><?= $unverifiedAlumni ?></h3>
        <p class="chart-name">Unverified Alumni</p>
      </div>
    </div>

  </div>
  <div class="chart emplo">
    <div class="data">
      <span class="employ1"><?= $employmentData[0] ?></span>
      <span class="employ2"><?= $employmentData[1] ?></span>
    </div>
    <canvas id="myChart"></canvas>
  </div>
  <div class="chart sala">
    <p>Salary Range of Employed Alumni</p>
    <div class="data">
      <span class="salary1"><?= $salaryData[0] ?></span>
      <span class="salary2"><?= $salaryData[1] ?></span>
      <span class="salary3"><?= $salaryData[2] ?></span>
      <span class="salary4"><?= $salaryData[3] ?></span>
      <span class="salary5"><?= $salaryData[4] ?></span>
    </div>
    <canvas id="myBarGraph"></canvas>
  </div>
  <div class="chart alu">
    <div class="icon-num">
      <i class="fa-solid fa-calendar-check"></i>
      <div class="chart-content">
        <h3><?= $upComingEvents ?></h3>
        <p class="chart-name">Upcoming Events</p>
      </div>
    </div>

    <!-- <div class="chart sala"></div> -->
  </div>
  <?php
  function getTotalAlumni($pdo) {
    $sql = "SELECT count(*) FROM users WHERE category = 1";
    $result = $pdo->prepare($sql);
    $result->execute();
    return $result->fetchColumn();
  }

  function getUnverifiedAlumni($pdo) {
    $sql = "SELECT count(*) FROM users WHERE is_verified = 0";
    $result = $pdo->prepare($sql);
    $result->execute();
    return $result->fetchColumn();
  }

  function getUpComingEvents($pdo) {
    $currDate = Date('Y-m-d');
    $sql = "SELECT count(*) FROM events WHERE date > '$currDate'";
    $result = $pdo->prepare($sql);
    $result->execute();
    return $result->fetchColumn();
  }
  
  function getSalaryData($pdo) {
    $sql = "SELECT salary FROM employment WHERE employed = 'employed'";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $salaries = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $salary1 = 0;
    $salary2 = 0;
    $salary3 = 0;
    $salary4 = 0;
    $salary5 = 0;
    $salary5++;
    foreach ($salaries as $salary) {
      if ($salary['salary'] == '0-10,000') $salary1++;
      if ($salary['salary'] == '10,001-50,000') $salary2++;
      if ($salary['salary'] == '50,001-100,000') $salary3++;
      if ($salary['salary'] == '100,001-200,000') $salary4++;
      if ($salary['salary'] == '200,001 above') $salary5++;
    }

    return [$salary1, $salary2, $salary3, $salary4, $salary5];
  }

  function getEmploymentData($pdo) {
    $sql = "SELECT employed FROM employment";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $employ = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $employed = 0;
    $unemployed = 0;

    foreach ($employ as $emp) {
      if ($emp['employed'] == 'employed') $employed++;
      if ($emp['employed'] == 'unemployed') $unemployed++;
    }

    return [$employed, $unemployed];
  }
  ?>