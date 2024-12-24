<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>InternHub</title>
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="plugins/images/INTERN.png"
    />
    <link
      href="plugins/bower_components/chartist/dist/chartist.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css"
    />
    <link href="css/style.min.css" rel="stylesheet" />
  </head>

  <body>
    <!-- TABEL -->
    <section class="headervsgap11">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
              <div class="white-box">
                <div class="d-flex justify-content-between" style="padding-bottom: 10px;">
                    <h3 class="box-title">Ubah dan Tambahkan Buku</h3>
                    <button type="button" class="btn btn-primary" id="btn-tambah-buku" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                      Tambah Buku
                    </button>
                </div>
                <!-- MODAL -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambahkan Buku</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <?php
                        include 'koneksi.php';
                      ?>

                      <form action="simpan_buku.php" method="post">
                        <div class="form-group">
                          <label for="nama_buku">Nama Buku:</label>
                          <input type="text" class="form-control" id="nama_buku" name="nama_buku">
                        </div>
                        <div class="form-group">
                          <label for="buku_tersisa">Unit Tersedia:</label>
                          <input type="number" class="form-control" id="buku_tersisa" name="buku_tersisa">
                        </div>
                        <div class="form-group">
                          <label for="keterangan">Status:</label>
                          <select class="form-control" id="keterangan" name="keterangan">
                            <option value="Tersedia">Tersedia</option>
                            <option value="Kosong">Kosong</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="id_buku">ID Buku:</label>
                          <input type="text" class="form-control" id="id_buku" name="id_buku">
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- MODAL END -->

                <div class="table-responsive">
                  <table class="table text-nowrap">
                  <thead>
                    <tr>
                      <th class="border-top-0">No</th>
                      <th class="border-top-0">Nama Buku</th>
                      <th class="border-top-0">Unit Tersedia</th>
                      <th class="border-top-0">Status</th>
                      <th class="border-top-0">ID Buku</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $query = "SELECT * FROM buku";
                    $result = mysqli_query($conn, $query);
                    $no = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                    <tr>
                      <td><?= $no++;?></td>
                      <td><?= isset($row['nama_buku']) ? $row['nama_buku'] : '' ;?></td>
                      <td><?= isset($row['buku_tersisa']) ? $row['buku_tersisa'] : ''; ?></td>
                      <td><?= isset($row['keterangan']) ? $row['keterangan'] : ''; ?></td>
                      <td><?= $row['id_buku'];?></td>
                    </tr>
                    <?php }?>
                  </tbody>
                  </table>
                </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- SCRIPT -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
