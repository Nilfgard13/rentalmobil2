<?php
if (is_user_logged_in()) {
    redirect_to('index.php');
}

$errors = [];
$inputs = [];
$success_message = '';

if (is_post_request()) {
    $username = $_POST['username'] ?? '';
    $alamat = $_POST['alamat'] ?? '';
    $no_telepon = $_POST['no_telepon'] ?? '';
    $email = $_POST['email'] ?? '';
    $role = $_POST['role'] ?? 'Pelanggan';
    $password = $_POST['password'] ?? '';
    $agree = isset($_POST['agree']) ? 'checked' : '';

    if (empty($agree)) {
        $errors[] = 'You need to agree to the term of services to register';
    }

    if (empty($errors)) {
        if (register_user($username, $alamat, $no_telepon, $email, $role, $password)) {
            $success_message = 'Your account has been created successfully. Please login here.';
            redirect_with_message('login.php', $success_message);
        } else {
            $errors[] = 'Failed to register user. Please try again.';
        }
    }

    $inputs = [
        'username' => $username,
        'alamat' => $alamat,
        'no_telepon' => $no_telepon,
        'email' => $email,
        'role' => $role,
        'password' => $password,
        'agree' => $agree
    ];

    redirect_with('register.php', [
        'inputs' => $inputs,
        'errors' => $errors
    ]);
} else if (is_get_request()) {
    [$inputs, $errors, $success_message] = session_flash('inputs', 'errors', 'success_message');
}