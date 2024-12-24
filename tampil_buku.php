<?php
include 'koneksi.php';

$conn->query("SET @row = 0");
$conn->query("UPDATE buku SET id = (@row := @row + 1)");

$conn->query("UPDATE buku SET keterangan = CASE 
                        WHEN buku_tersisa = 0 THEN 'kosong'
                        WHEN buku_tersisa >= 1 THEN 'Tersedia'
                    END");

// Retrieve the updated data
$result = $conn->query("SELECT * FROM buku");

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['nama_buku'] . "</td>";
    echo "<td>" . $row['buku_tersisa'] . "</td>";
    echo "<td>" . $row['keterangan'] . "</td>";
    echo "<td>" . $row['id_buku'] . "</td>";
    echo "</tr>";
  }
} else {
  echo "0 results";
}

$conn->close();
?>