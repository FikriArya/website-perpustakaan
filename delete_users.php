<?php
include 'koneksi.php';

if(isset($_GET['id_users'])) {
    $id_users = $_GET['id_users'];
    
    $result = mysqli_query($conn, "DELETE FROM users WHERE id_users='$id_users'");
    
    if($result) {
        echo "<script>alert('Data Karyawan berhasil dihapus!');</script>";
    } else {
        echo "<script>alert('Gagal menghapus data karyawan!');</script>";
    }
} else {
    echo "<script>alert('Nama Karyawan tidak ditemukan!');</script>";
}

echo "<script>window.location.href='profile.php';</script>";
?>
