<?php
session_start();

function validasi_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Inisialisasi array pendaftar jika belum ada
if (!isset($_SESSION['pendaftar'])) {
    $_SESSION['pendaftar'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = validasi_input($_POST['nama']);
    $email = validasi_input($_POST['email']);
    $password = $_POST['password'];
    $konfirmasi = $_POST['konfirmasi'];
    $tanggal = $_POST['tanggal_lahir'];
    $persetujuan = isset($_POST['persetujuan']);

    $errors = [];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email tidak valid.";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password minimal 6 karakter.";
    }

    if ($password !== $konfirmasi) {
        $errors[] = "Konfirmasi password tidak cocok.";
    }

    if (!$persetujuan) {
        $errors[] = "Syarat & ketentuan harus disetujui.";
    }

    if (count($errors) > 0) {
        foreach ($errors as $e) {
            echo "<p style='color:red;'>$e</p>";
        }
        echo "<a href='register.html'>Kembali</a>";
        exit;
    }

    // Simpan data ke dalam session
    $_SESSION['pendaftar'][] = [
        'nama' => $nama,
        'email' => $email,
        'tanggal' => $tanggal
    ];

    // Redirect ke halaman ringkasan
    header("Location: daftar.php");
    exit;
}
?>
