<?php
include('./config/constants.php');
include('./config/db_connect.php');
session_destroy();
header('location: ' . ROOT_URL);
