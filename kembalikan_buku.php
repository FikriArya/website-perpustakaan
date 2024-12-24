<?php
include 'koneksi.php';

$id_buku = $_POST['id_buku'];
$jumlah_dikembalikan = $_POST['jumlah_dikembalikan'];

// Update jumlah buku di tabel 'buku'
$sql_update = "UPDATE buku SET buku_tersisa = buku_tersisa + $jumlah_dikembalikan WHERE id_buku = '$id_buku'";
if ($conn->query($sql_update) === TRUE) {
    // Hapus data dari tabel 'buku_yang_dipinjam'
    $sql_delete = "DELETE FROM buku_yang_dipinjam WHERE id_buku = '$id_buku'";
    $conn->query($sql_delete);
    echo "success";
} else {
    echo "error: " . $conn->error;
}

$conn->close();
?>
