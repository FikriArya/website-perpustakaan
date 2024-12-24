<?php
include 'koneksi.php';

$result = $conn->query("SELECT * FROM buku ORDER BY id ASC");

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