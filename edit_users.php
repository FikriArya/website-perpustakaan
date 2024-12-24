<?php
include 'koneksi.php';

if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

$id_users = $_POST['id_users'];
$full_name = $_POST['full_name'];
$email = $_POST['email'];
$password = $_POST['password'];
$created_at = $_POST['created_at'];

mysqli_query($conn,"UPDATE users set full_name='$full_name', email='$email', password='$password' where id_users='$id_users'");

header("location: profile.php");
exit();

?>
