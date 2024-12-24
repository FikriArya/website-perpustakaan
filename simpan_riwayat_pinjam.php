<?php
// simpan_riwayat_pinjam.php

header('Content-Type: application/json');
include 'koneksi.php'; // Ganti dengan nama file koneksi database Anda

$data = json_decode($_POST['buku'], true);

foreach ($data as $buku) {
    $nama_buku = $buku['nama_buku'];
    $buku_tersisa = $buku['buku_tersisa'];
    $keterangan = $buku['keterangan'];
    $id_buku = $buku['id_buku'];

    $tanggal_pinjam = date('Y-m-d'); // Atau sesuaikan dengan format tanggal Anda
    $status = 'Dipinjam'; // Status buku saat dipinjam

    $query = "INSERT INTO riwayat_pinjam (nama_buku, tanggal_pinjam, status, id_buku) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $nama_buku, $tanggal_pinjam, $status, $id_buku);
    $stmt->execute();
}

$conn->close();

echo json_encode(['status' => 'success']);
?>
