<?php
include('./config/constants.php');
include('./config/db_connect.php');
$id = $_GET['id'];
$deleteQuery = "DELETE FROM users WHERE id = $id";
$stmt = $pdo->prepare($deleteQuery);
$stmt->execute();
header('location: ' . ROOT_URL);
