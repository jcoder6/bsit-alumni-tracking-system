<?php
include('./config/constants.php');
include('./config/db_connect.php');
include('./admin/inc/message.php');
session_destroy();
messageNotif('success', 'Log out successfuly');
header('location: ' . ROOT_URL);
