<?php
require_once 'auth.php';
// Mendapatkan daftar pengguna
$users = getUsers();

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    if ($action === 'tambah') {
        addUser($_POST);
        header('location: ../public/admin/data_user.php');
    } elseif ($action === 'edit') {
        editUser($_POST);
        header('data_user.php');
    } elseif ($action === 'delete') {
        deleteUser($_POST['id_user']);
        header('data_user.php');
    }
    header('data_user.php');
}