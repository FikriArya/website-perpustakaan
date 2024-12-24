<?php
// Menghubungkan ke database
include 'koneksi.php';

// Mendapatkan data dari permintaan AJAX
$id_buku = $_POST['id_buku'];
$jumlah_pinjam = $_POST['jumlah_pinjam'];

// Memeriksa apakah data yang diterima valid
if (isset($id_buku) && isset($jumlah_pinjam)) {
    // Mengambil data buku berdasarkan id
    $result = $conn->query("SELECT buku_tersisa FROM buku WHERE id_buku = '$id_buku'");
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $buku_tersisa = $row['buku_tersisa'];

        // Mengecek apakah jumlah buku tersisa cukup
        if ($buku_tersisa >= $jumlah_pinjam) {
            // Mengurangi jumlah buku tersisa
            $buku_tersisa_baru = $buku_tersisa - $jumlah_pinjam;
            $conn->query("UPDATE buku SET buku_tersisa = '$buku_tersisa_baru' WHERE id_buku = '$id_buku'");

            // Mengirimkan respons sukses
            echo json_encode(['status' => 'success', 'message' => 'Jumlah buku berhasil diperbarui']);
        } else {
            // Jika jumlah buku tersisa tidak cukup
            echo json_encode(['status' => 'error', 'message' => 'Jumlah buku tersisa tidak cukup']);
        }
    } else {
        // Jika buku tidak ditemukan
        echo json_encode(['status' => 'error', 'message' => 'Buku tidak ditemukan']);
    }
} else {
    // Jika data tidak valid
    echo json_encode(['status' => 'error', 'message' => 'Data tidak valid']);
}

// Menutup koneksi
$conn->close();
?>
