<?php

include 'koneksi.php'; 

if (isset($_POST['query'])) {
    $query = $_POST['query'];
    $sql = "SELECT * FROM buku WHERE nama_buku LIKE '%$query%' OR id_buku LIKE '%$query%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nama_buku']}</td>
                    <td>{$row['buku_tersisa']}</td>
                    <td>{$row['keterangan']}</td>
                    <td>{$row['id_buku']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No records found</td></tr>";
    }
}
?>
