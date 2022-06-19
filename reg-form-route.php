<?php
include('./config/constants.php');
include('./config/db_connect.php');
echo 'HELLO<br>';
if (isset($_SESSION['regUsername']) && isset($_SESSION['regPassword'])) {
  $regUsername = $_SESSION['regUsername'];
  $regPassword = $_SESSION['regPassword'];

  try {
    $query = "SELECT id FROM users WHERE username = ? AND password = ? AND category = 1";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$regUsername, $regPassword]);
    $res = $stmt->fetchObject();
    header('location: ' . ROOT_URL . 'index.php?id=' . $res->id);
  } catch (Exception $e) {
    echo $e;
  }
}
