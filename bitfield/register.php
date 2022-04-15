<?php
include('user.php');
session_start();

if ($_POST['hash'] == hash_hmac('sha256', $_POST['diff'], $_SESSION['random_key'])) {
    $user = new Users();

    $user->username = $_POST['body']['username'];
    $user->role = $_POST['body']['role'];
    if ($user->create())
        echo json_encode(['status' => true, 'message' => 'Registered successfully!']);
    else echo json_encode(['status' => false, 'message' => 'Create failed!']);
} else echo json_encode(['status' => false, 'message' => 'Auth Failure!']);