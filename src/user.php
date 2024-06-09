<?php

// Mendapatkan daftar pengguna
// $users = getUsers();

if (is_post_request()) {
    $action = $_POST['action'];
    if ($action === 'tambah') {
        addUser($_POST);
        redirect_to('data_user.php');
    } elseif ($action === 'edit') {
        editUser($_POST);
        redirect_to('data_user.php');
    } elseif ($action === 'delete') {
        deleteUser($_POST['id_user']);
        redirect_to('data_user.php');
    }
    redirect_to('data_user.php');
}