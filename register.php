<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'koneksi.php';

$username = $_POST["username"];
$password = $_POST["password"];
$foto = null;

//enkrip password
$epassword = password_hash($password, PASSWORD_DEFAULT);

//untuk fungsi upload foto 
if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true); // Buat folder jika belum ada
    }
    $target_file = $target_dir . basename($_FILES['foto']['name']);
    $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];

    // Validasi file upload
    if ($_FILES['foto']['size'] > 500000) {
        die("File terlalu besar. Maksimal 500KB.");
    }
    if (!in_array($file_extension, $allowed_extensions)) {
        die("Format file tidak didukung. Hanya JPG, JPEG, PNG, dan GIF yang diperbolehkan.");
    }

    // Pindahkan file
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
        $foto = basename($_FILES['foto']['name']);
    } else {
        die("Gagal mengunggah file.");
    }
}

$query_sql = "INSERT INTO user (username, password, foto)
              VALUES ('$username', '$epassword', '$foto')";

if (mysqli_query($conn, $query_sql)) {
    header("Location: login.html");
} else {
    echo "Pendaftaran Gagal: " . mysqli_error($conn);
}
?>