<?php
include 'koneksi.php';

if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Cek apakah ada data yang terkait di tabel riwayat_kembalikan
  $check_related = mysqli_query($conn, "SELECT * FROM riwayat_kembalikan WHERE id_buku='$id'");
  
  if (mysqli_num_rows($check_related) > 0) {
    echo "<script>alert('Data ini tidak dapat dihapus karena ada referensi di riwayat_kembalikan.');</script>";
  } else {
    $result = mysqli_query($conn, "DELETE FROM buku WHERE id='$id'");

    if ($result) {
        echo "<script>alert('Data berhasil dihapus!');</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!');</script>";
    }
  }
} else {
  echo "<script>alert('ID Buku tidak ditemukan');</script>";
}

echo "<script>window.location.href='basic-table.php';</script>";
?>
