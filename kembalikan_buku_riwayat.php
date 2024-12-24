<?php
include 'koneksi.php';

// Mendapatkan ID dari URL
$id = $_GET['id'];

// Menggunakan prepared statements
$sql_select = $conn->prepare("SELECT * FROM buku_yang_dipinjam WHERE id = ?");
$sql_select->bind_param("i", $id);
$sql_select->execute();
$result = $sql_select->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_buku = $row['id_buku']; // Ini adalah VARCHAR
    $nama_buku = $row['nama_buku'];
    $tanggal_peminjaman = $row['tanggal_peminjaman'];
    $buku_tersisa = $row['buku_tersisa'];
    $tanggal_pengembalian = date('Y-m-d');

    // Cek apakah $id_buku ada di tabel buku
    $sql_check_buku = $conn->prepare("SELECT id_buku FROM buku WHERE id_buku = ?");
    $sql_check_buku->bind_param("s", $id_buku);
    $sql_check_buku->execute();
    $check_result = $sql_check_buku->get_result();

    if ($check_result->num_rows > 0) {
        // Pindahkan data ke tabel riwayat_kembalikan
        $sql_insert = $conn->prepare("INSERT INTO riwayat_kembalikan (id_buku, nama_buku, tanggal_peminjaman, tanggal_pengembalian) 
                                       VALUES (?, ?, ?, ?)");
        $sql_insert->bind_param("ssss", $id_buku, $nama_buku, $tanggal_peminjaman, $tanggal_pengembalian);
        if ($sql_insert->execute()) {
            // Update jumlah buku di tabel buku
            $sql_update_buku = $conn->prepare("UPDATE buku SET buku_tersisa = buku_tersisa + ? WHERE id_buku = ?");
            $sql_update_buku->bind_param("is", $buku_tersisa, $id_buku);
            $sql_update_buku->execute();

            // Hapus data dari tabel buku_yang_dipinjam
            $sql_delete = $conn->prepare("DELETE FROM buku_yang_dipinjam WHERE id = ?");
            $sql_delete->bind_param("i", $id);
            $sql_delete->execute();

            echo "Pengembalian berhasil.";
        } else {
            echo "Error: " . $sql_insert->error;
        }
    } else {
        echo "ID Buku tidak ditemukan di tabel buku.";
    }
} else {
    echo "Data tidak ditemukan.";
}

$conn->close();
header("Location: dashboard.php"); // Redirect ke halaman buku dipinjam setelah pengembalian
exit();
?>
