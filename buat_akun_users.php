<?php
session_start();
include 'koneksi.php';

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];

$check_email = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($check_email);

if ($result->num_rows > 0) {
    $_SESSION['error_message'] = "Email sudah terdaftar. Silakan gunakan email lain.";
    header("Location: buat_akun.php");
    exit();
} else {
    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (full_name, email, password, created_at) VALUES ('$full_name', '$email', '$hashed_password', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Users berhasil dibuat";
        header("Location: login.php"); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
