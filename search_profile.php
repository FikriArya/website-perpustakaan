<?php

include 'koneksi.php'; 

if (isset($_POST['query'])) {
    $query = $_POST['query'];
    $sql = "SELECT * FROM users WHERE full_name LIKE '%$query%' OR id_users LIKE '%$query%'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['id_users']}</td>
                    <td>{$row['full_name']}</td>
                    <td>{$row['email']}</td>
                    <td style='max-width: 150px; overflow-x: auto; white-space: nowrap; display: block;'>{$row['password']}</td>
                    <td>{$row['created_at']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No records found</td></tr>";
    }
}
?>
