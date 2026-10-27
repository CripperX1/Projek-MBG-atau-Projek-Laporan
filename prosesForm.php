<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = trim($_POST["nama"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $errorNama = $errorEmail = "";

    // 1. Validasi Nama
    if (empty($nama)) {
        $errorNama = "Nama wajib diisi!";
    } elseif (!preg_match("/^[a-zA-Z ']*$/", $nama)) {
        $errorNama = "Nama hanya boleh berisi huruf dan spasi!";
    }

    // 2. Validasi Email
    if (empty($email)) {
        $errorEmail = "Email wajib diisi!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorEmail = "Format email tidak valid!";
    }

    // 3. Keputusan
    if (empty($errorNama) && empty($errorEmail)) {
        $_SESSION['user_nama'] = htmlspecialchars($nama);
        $_SESSION['user_email'] = htmlspecialchars($email);
        echo "Pendaftaran Berhasil Disimpan!";
        exit;
    } else {
        $_SESSION['err_nama'] = $errorNama;
        $_SESSION['err_email'] = $errorEmail;
        $_SESSION['old_nama'] = $nama;
        $_SESSION['old_email'] = $email;
        header("Location: vForm.php");
        exit;
    }
}