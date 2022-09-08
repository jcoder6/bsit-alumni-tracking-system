  <div class="alumni">
    <h3 class="content-title">Alumni</h3>
  </div>
  <?php
  $alumnies = fetchAlumni($pdo);
  ?>
  <div class="alumni-container">
    <div class="alumnae">

      <?php foreach ($alumnies as $alumni) : ?>
        <div class="alumni">
          <div class="photo-name-container">
            <div class="photo-container">
              <img src="./assets/images/devs/shek.webp" alt="">
            </div>

            <h3 class="alumni-name">
              <?= $alumni['firstname'] ?> <?= $alumni['lastname'] ?>
            </h3>
          </div>

          <div class="basic-info-container">
            <h3 class="basic-info-title">Basic Information:</h3>
            <div class="alumni-info-container">
              <div class="infor">
                <div class="key">Batch:</div>
                <div class="value"><?= $alumni['batch'] ?></div>
              </div>
              <div class="infor">
                <div class="key">Course:</div>
                <div class="value"><?= $alumni['course'] ?></div>
              </div>
              <div class="infor">
                <div class="key">Contact No:</div>
                <div class="value">+63 <?= $alumni['contactno'] ?></div>
              </div>
              <div class="infor">
                <div class="key">Email:</div>
                <div class="value"><?= $alumni['email'] ?></div>
              </div>
              <div class="infor">
                <div class="key">Address:</div>
                <div class="value">
                  <?= $alumni['house'] ?>
                  <?= $alumni['municipal'] ?>
                  <?= $alumni['province'] ?>
                </div>
              </div>
            </div>
          </div>

        </div>
      <?php endforeach; ?>


    </div>
  </div>

  <?php
  function fetchAlumni($pdo) {
    $queryAlumni1 = "SELECT 
                        u.id, b.firstname, b.lastname, e.batch, e.course, b.contactno, b.email, b.house, b.municipal, b.province 
                      FROM users u
                      INNER JOIN bio b ON b.user_id = u.id
                      INNER JOIN educ e ON e.user_id = u.id
                      WHERE category = 1 LIMIT 16";
    $stmtAlumni1 = $pdo->prepare($queryAlumni1);

    if ($stmtAlumni1->execute()) {
      return $stmtAlumni1->fetchAll(PDO::FETCH_ASSOC);
    } else {
      echo 'failed';
    }
  }
  ?>