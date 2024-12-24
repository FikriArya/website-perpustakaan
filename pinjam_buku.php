<?php
include 'koneksi.php';

// Retrieve posted data
$buku = $_POST['buku'];

// Initialize flag for success
$success = true;
$error_message = '';

foreach ($buku as $book) {
    $nama_buku = $conn->real_escape_string($book['nama_buku']);
    $buku_tersisa = $conn->real_escape_string($book['buku_tersisa']);
    $keterangan = $conn->real_escape_string($book['keterangan']);
    $id_buku = $conn->real_escape_string($book['id_buku']);
    $tanggal_peminjaman = date('Y-m-d'); // Tanggal peminjaman
    $status = 'Dipinjam'; // Status buku saat dipinjam

    // Insert into buku_yang_dipinjam table
    $sql = "INSERT INTO buku_yang_dipinjam (nama_buku, buku_tersisa, keterangan, id_buku, tanggal_peminjaman) VALUES ('$nama_buku', '$buku_tersisa', '$keterangan', '$id_buku', '$tanggal_peminjaman')";
    if (!$conn->query($sql)) {
        $success = false;
        $error_message = "Error inserting into buku_yang_dipinjam: " . $conn->error;
        break;
    }

    // Insert into riwayat_pinjam table
    $sql_riwayat = "INSERT INTO riwayat_pinjam (id_buku, nama_buku, buku_tersisa, tanggal_peminjaman) VALUES ('$id_buku', '$nama_buku', '$buku_tersisa', '$tanggal_peminjaman')";
    if (!$conn->query($sql_riwayat)) {
        $success = false;
        $error_message = "Error inserting into riwayat_pinjam: " . $conn->error;
        break;
    }
}

$conn->close();

// Send JSON response
header('Content-Type: application/json');
if ($success) {
    echo json_encode(['message' => 'Success']);
} else {
    echo json_encode(['message' => $error_message]);
}
?>
