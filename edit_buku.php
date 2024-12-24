<?php
include 'koneksi.php';

if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

$id = $_POST['id'];
$nama_buku = $_POST['nama_buku'];
$buku_tersisa = $_POST['buku_tersisa'];
$keterangan = $_POST['keterangan'];
$id_buku = $_POST['id_buku'];

mysqli_query($conn,"UPDATE buku set nama_buku='$nama_buku', buku_tersisa='$buku_tersisa', keterangan='$keterangan', id_buku='$id_buku' where id='$id'");

header("location: basic-table.php");
exit();

?>
