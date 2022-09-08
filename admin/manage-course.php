<div class="course-list">
  <h1 class="section-name">COURSE LIST</h1>
</div>
<?php $courses = fetchAllCourse($pdo); ?>
<div class="add-course-container">
  <div class="add-course manage-table">
    <div class="table-head">
      <h3 class="table-name">Add Course</h3>
    </div>

    <form action="" method="post" class="add-course-form">
      <div class="form-groups">
        <div class="form-group course-name">
          <label for="course_name" class="label-name">Course Name</label>
          <input type="text" name="course_name" class="input" placeholder="Name of course" required>
        </div>
        <div class="form-group course-code">
          <label for="course_code" class="label-name">Course Code</label>
          <input type="text" name="course_code" class="input" placeholder="Course code" required>
        </div>
      </div>

      <div class="form-submit">
        <input type="submit" value="Save" class="button1 add-form-btn" name="submit_course">
      </div>
    </form>
  </div>
</div>

<div class="manage-table courses">
  <div class="table-head">
    <h3 class="table-name">List of Courses</h3>
  </div>

  <div class="table-content">
    <div class="table-data">
      <div class="column no">no.</div>
      <div class="column title">Course Name</div>
      <div class="column code">Course Code</div>
      <div class="column action head">Action</div>
    </div>
    <?php
    $no = 0;
    foreach ($courses as $course) :
      $no++;
    ?>
      <div class="table-data">
        <div class="column no"><?= $no ?></div>
        <div class="column title"><?= $course->course_name ?></div>
        <div class="column code"><?= $course->course_code ?></div>
        <div class="column action head">
          <a class="alumni-action button-primary" href="#">View</a>
          <a class="alumni-action button-danger" href="#">Delete</a>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php
if (isset($_POST['submit_course'])) {
  $courseName = mysqli_real_escape_string($conn, $_POST['course_name']);
  $corseCode = mysqli_real_escape_string($conn, $_POST['course_code']);

  $courseData = [
    'name' => $courseName,
    'code' => $corseCode
  ];
  $queryCourse = "INSERT INTO course(course_name, course_code) VALUES (:name, :code)";
  $stmtCourse = $pdo->prepare($queryCourse);
  if ($stmtCourse->execute($courseData)) {
    messageNotif('success', 'New course added');
    echo "<script>window.location.href='" . ROOT_URL . "admin/index.php?page=manage-course';</script>";
  } else {
    messageNotif('success', 'New course added');
    header('location: ' . ROOT_URL . 'admin/index.php?page=manage-course');
  }
}

function fetchAllCourse($pdo) {
  $query = "SELECT * FROM course";
  $stmt = $pdo->prepare($query);
  if ($stmt->execute()) {
    return $stmt->fetchAll(PDO::FETCH_OBJ);
  } else {
    echo 'error fetch';
  }
}
?>