<?php
include 'koneksi.php';

$nama_buku = $_POST['nama_buku'];
$buku_tersisa = $_POST['buku_tersisa'];
$keterangan = $_POST['keterangan'];
$id_buku = $_POST['id_buku'];

$sql = "INSERT INTO buku (nama_buku, buku_tersisa, keterangan, id_buku) VALUES ('$nama_buku', '$buku_tersisa', '$keterangan', '$id_buku')";

if ($conn->query($sql) === TRUE) {
  echo "Data buku berhasil disimpan!";
  header("Location: basic-table.php"); 
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
