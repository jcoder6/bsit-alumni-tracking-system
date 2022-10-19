<?php
  $pageData = fetchPageData($pdo);
?>

<footer class="footer">
  <div class="logo-section">
    <div class="logo">
      <img src="./assets/images/Logo Psu.PNG" alt="LOGO">
    </div>
    <span class="project-name"><?= $pageData->page_name ?></span>
  </div>

  <p>Contact Us</p>

  <ul class="contacts">
    <a href="#" class="contact">
      <li><i class="fa-solid fa-square-phone"></i></li>
    </a>
    <a href="#" class="contact">
      <li><i class="fa-brands fa-facebook"></i></li>
    </a>
    <a href="#" class="contact">
      <li><i class="fa-solid fa-envelope"></i></li>
    </a>
    <a href="#" class="contact">
      <li><i class="fa-brands fa-instagram"></i></li>
    </a>
  </ul>

  <p>All Rights Reserve</p>
</footer>

<script src="<?php ROOT_URL ?>script/alumnis.js"></script>
</body>

</html>

<?php
  function fetchPageData($pdo) {
    try {
      $query = "SELECT * FROM page WHERE id = 1";
      $stmt = $pdo->prepare($query);
      if($stmt->execute()) {
        return $stmt->fetch(PDO::FETCH_OBJ);
      } else {
        echo 'database connection failed'; 
      }
    } catch (PDOException $e) {
      echo $e;
    }
  } 
?>