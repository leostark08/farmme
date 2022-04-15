<?php
session_start();

if ($_POST['hash'] == hash_hmac('sha256', $_POST['diff'], $_SESSION['random_key'])) {
    echo json_encode(['status' => true, 'message' => 'Successfully!']);
} else echo json_encode(['status' => false, 'message' => 'Failure!']);