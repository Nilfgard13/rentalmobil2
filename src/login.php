<?php

if (is_user_logged_in()) {
    //redirect_to('index.php');
}

$inputs = [];
$errors = [];

if (is_post_request()) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        $errors['login'] = 'Username and password are required';
    }

    if (!$errors) {
        // if login fails
        if (!login($username, $password)) {
            $errors['login'] = 'Invalid username or password';
            $inputs = [
                'username' => $username,
                'password' => $password
            ];
        } else {
            
            $user = find_role_by_username($username);
            $getuser = find_all_by_username($username);
            $_SESSION['id_user'] = $getuser['id_user'];
            $getktp = getKtpByIdUser($_SESSION['id_user']);
            // login successfully
             
            if ($user['role'] == 'Admin') {
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $getuser['email'];
                $_SESSION['alamat'] = $getuser['alamat'];
                $_SESSION['no_telepon'] = $getuser['no_telepon'];
                $_SESSION['email'] = $getuser['email'];
                $_SESSION['role'] = $getuser['role'];
                $_SESSION['password'] = $getuser['password'];
                redirect_to('admin/home_admin.php');
            } elseif ($user['role'] == 'Pegawai') {
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $getuser['email'];
                $_SESSION['alamat'] = $getuser['alamat'];
                $_SESSION['no_telepon'] = $getuser['no_telepon'];
                redirect_to('pegawai/home_pegawai.php');
            } elseif ($user['role'] == 'Pelanggan') {
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $getuser['email'];
                $_SESSION['alamat'] = $getuser['alamat'];
                $_SESSION['no_telepon'] = $getuser['no_telepon'];
                $_SESSION['no_ktp'] = $getktp['no_ktp'];
                redirect_to('pelanggan/home_pelanggan.php');
            }else{
                redirect_to('index.php');
            }
        }
    }

    if ($errors) {
        $inputs = [
            'username' => $username,
            'password' => $password
        ];
        redirect_with('login.php', [
            'errors' => $errors,
            'inputs' => $inputs
        ]);
    }

} else if (is_get_request()) {
    [$errors, $inputs] = session_flash('errors', 'inputs');
}