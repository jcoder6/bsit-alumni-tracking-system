<?php 
  $dsn = 'mysql:host=' . SERVER . ';dbname=' . DB_NAME;
  $conn = mysqli_connect(SERVER, USERNAME, PASSWORD, DB_NAME);
  $pdo = new PDO($dsn, USERNAME, PASSWORD);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
