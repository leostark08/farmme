<?php
session_start();
include('secret.php');
$_SESSION['random_key'] = generateRandomString(16);
echo $_SESSION['random_key'];