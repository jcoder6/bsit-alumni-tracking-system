<?php
include('./db_connect.php');
session_destroy();
header('location: ' . ROOT_URL . 'admin/log-in.php');
