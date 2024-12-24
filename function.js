$(document).ready(function () {
  // Handle click event for the '+' button to move books to "Buku yang ingin Dipinjam"
  $(".btn-primary").click(function () {
    var row = $(this).closest("tr");
    var bookId = row.find("td").eq(4).text(); // ID Buku
    var bookName = row.find("td").eq(1).text(); // Nama Buku
    var bookRemaining = parseInt(row.find("td").eq(2).text()); // Buku Tersisa

    // Check if there are any books left to borrow
    if (bookRemaining > 0) {
      // Prompt user for the number of books to borrow
      var quantityToBorrow = prompt(
        `Masukkan jumlah buku yang ingin dipinjam untuk "${bookName}":`,
        1
      );
      quantityToBorrow = parseInt(quantityToBorrow);

      // Validate the input
      if (
        isNaN(quantityToBorrow) ||
        quantityToBorrow <= 0 ||
        quantityToBorrow > bookRemaining
      ) {
        alert("Jumlah buku tidak valid atau melebihi stok yang tersedia.");
        return;
      }

      // Update the remaining book quantity in the database
      $.ajax({
        url: "update_buku_tersisa.php",
        type: "POST",
        data: {
          id_buku: bookId,
          jumlah_pinjam: quantityToBorrow,
        },
        success: function (response) {
          // Add book data to "Buku yang ingin Dipinjam" table
          $("#bukuPeminjaman tbody").append(
            `<tr>
                <td>${row.find("td").eq(0).text()}</td>
                <td>${row.find("td").eq(1).text()}</td>
                <td>${quantityToBorrow}</td>
                <td>${row.find("td").eq(3).text()}</td>
                <td>${row.find("td").eq(4).text()}</td>
                <td><button class="btn btn-warning remove-book">-</button></td>
              </tr>`
          );

          // Update the remaining book quantity in the Data Buku table
          row
            .find("td")
            .eq(2)
            .text(bookRemaining - quantityToBorrow);
        },
        error: function (xhr, status, error) {
          alert("Terjadi kesalahan: " + error);
        },
      });
    } else {
      alert("Tidak ada buku yang tersisa untuk dipinjam.");
    }
  });

  // Handle click event for the '-' button to remove books from "Buku yang ingin Dipinjam"
  $("#bukuPeminjaman").on("click", ".remove-book", function () {
    var row = $(this).closest("tr");
    var bookId = row.find("td").eq(4).text(); // ID Buku
    var bookQuantity = parseInt(row.find("td").eq(2).text()); // Buku Tersisa

    // Remove the row from "Buku yang ingin Dipinjam" table
    row.remove();

    // Update the quantity of the book back to "Data Buku" table
    $.ajax({
      url: "update_buku_tersisa.php",
      type: "POST",
      data: {
        id_buku: bookId,
        jumlah_pinjam: -bookQuantity,
      },
      success: function (response) {
        alert("Buku berhasil dihapus dari daftar peminjaman.");
      },
      error: function (xhr, status, error) {
        alert("Terjadi kesalahan: " + error);
      },
    });
  });

  $("#pinjamBukuButton").click(function () {
    var bukuData = [];
    $("#bukuPeminjaman tbody tr").each(function () {
      var row = $(this);
      bukuData.push({
        nama_buku: row.find("td").eq(1).text(),
        buku_tersisa: row.find("td").eq(2).text(),
        keterangan: row.find("td").eq(3).text(),
        id_buku: row.find("td").eq(4).text(),
      });
    });

    $.ajax({
      url: "pinjam_buku.php",
      type: "POST",
      data: { buku: bukuData },
      success: function (response) {
        console.log(response);
        alert("Buku berhasil dipinjam!");
        $("#bukuPeminjaman tbody").empty();
      },
      error: function (xhr, status, error) {
        console.error("Terjadi kesalahan: " + error);
      },
    });
  });

  // cancel button
  $("#cancelButton").click(function () {
    $("#editModal").modal("hide");
  });
});
