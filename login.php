<?php
//memulai session atau melanjutkan session yang sudah ada
session_start();

//menyatakan code dari file koneksi
include 'koneksi.php';

//check jika sudah ada user yang login arahkan ke halaman admin
if (isset($_SESSION['username'])){
    header("location:admin.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['user'];
    $password = $_POST['pass'];
    //menggunakan fungsi enkripsi md5 supaya sama dengan password  yang tersimpan di database
    //$password = md5($_POST['pass']);

    //prepared statement
    $stmt = $conn->prepare("SELECT username, password FROM user WHERE username = ?");
    $stmt->bind_param("s", $username); //"ss" -> username string dan password string (2 string)

    //database executes the statement
    $stmt->execute();

    //menampung hasil eksekusi
    $hasil = $stmt->get_result();
    
    // Cek apakah username ditemukan
    if ($hasil->num_rows > 0) {
        $row = $hasil->fetch_assoc();
        $hashed_password = $row['password'];

        // Verifikasi password
        if (password_verify($password, $hashed_password)) {
            // Jika berhasil, simpan username di session
            $_SESSION['username'] = $row['username'];

            header("Location: home.php");
            exit();
        } else {
            // Jika password salah
            echo "Password salah. Silakan coba lagi.";
        }
    } else {
        // Jika username tidak ditemukan
        echo "Username tidak ditemukan.";
    }

    //menutup koneksi database
    $stmt->close();
    $conn->close();
}