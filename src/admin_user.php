<?php
require_once 'auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['select_user'])) {
    $user_ids = $_POST['select_user'];
    $result = delete_users($user_ids);

    if ($result) {
        header('location: ../public/admin/data_user.php');
    } else {
        header('location: ../public/admin/data_user.php');
    }
} else {
    header('location: ../public/admin/data_user.php');
}