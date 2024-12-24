<?php
include 'koneksi.php'; // Pastikan koneksi ke database sudah benar

$sql = "SELECT * FROM buku_yang_dipinjam"; // Ambil data dari tabel buku_yang_dipinjam
$result = $conn->query($sql);

$bukuDipinjam = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bukuDipinjam[] = $row;
    }
}

echo json_encode($bukuDipinjam);

$conn->close();
?>
