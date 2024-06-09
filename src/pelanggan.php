<?php
if (is_user_logged_in()) {
    //redirect_to('profil_pelanggan.php');
}

$errors = [];
$inputs = [];
$success_message = '';

if (is_post_request()) {
    $no_ktp = $_POST['no_ktp'] ?? '';

    // Validasi nomor KTP
    if (empty($no_ktp)) {
        $errors[] = 'No KTP is required.';
    }

    if (empty($errors)) {
        // Mendapatkan id_user dari session
        $id_user = $_SESSION['user_id'];
        
        // Menyimpan nomor KTP ke dalam database
        if (addKtp($id_user, $no_ktp)) {
            $success_message = 'No KTP has been added successfully.';
            redirect_to('profil_pelanggan.php');
        } else {
            $errors[] = 'Failed to add No KTP. Please try again.';
        }
    }

    $inputs = [
        'no_ktp' => $no_ktp,
    ];

    redirect_with('current_page.php', [
        'inputs' => $inputs,
        'errors' => $errors,
    ]);
} else if (is_get_request()) {
    [$inputs, $errors, $success_message] = session_flash('inputs', 'errors', 'success_message');
}
