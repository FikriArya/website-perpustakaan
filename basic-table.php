<?php
session_start();

if (!isset($_SESSION['id_users'])) {
    echo "<script>
        alert('Anda belum login, silahkan login terlebih dahulu');
        window.location.href = 'login.php';
    </script>";
    exit();
}
?>



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
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin6">
            <a class="navbar-brand" href="dashboard.php">
              <b class="logo-icon">
                <img src="plugins/images/2.png" alt="homepage" />
              </b>
            </a>
            <a
              class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>
          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
          >
            <ul class="navbar-nav ms-auto d-flex align-items-center">
              <li>
                <a class="profile-pic" href="#">
                  <span class="text-white font-medium">
                    <?php echo isset($_SESSION['full_name']) ? $_SESSION['full_name'] : 'Guest'; ?>
                  </span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- NAVBAR KIRI -->
      <aside class="left-sidebar" data-sidebarbg="skin6">
        <div class="scroll-sidebar">
          <nav class="sidebar-nav">
            <ul id="sidebarnav">
              <li class="sidebar-item pt-2">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="dashboard.php"
                  aria-expanded="false"
                >
                  <i class="far fa-clock" aria-hidden="true"></i>
                  <span class="hide-menu">Dashboard</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="profile.php"
                  aria-expanded="false"
                >
                  <i class="fa fa-user" aria-hidden="true"></i>
                  <span class="hide-menu">Karyawan</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="basic-table.php"
                  aria-expanded="false"
                >
                  <i class="fa fa-table" aria-hidden="true"></i>
                  <span class="hide-menu">Ubah Data Buku</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="blank.php"
                  aria-expanded="false"
                >
                  <i class="fa fa-columns" aria-hidden="true"></i>
                  <span class="hide-menu">Pinjam Buku</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="Riwayat.php"
                  aria-expanded="false"
                >
                <i class="far fa-clock" aria-hidden="true"></i>
                  <span class="hide-menu">Riwayat</span>
                </a>
              </li>
              <li class="text-center p-20 upgrade-btn">
                <a
                  href="kembalikan.php"
                  class="btn d-grid btn-danger text-white"
                >
                  Kembalikan Buku</a
                >
              </li>
            </ul>
          </nav>
        </div>
      </aside>
      <!-- NAVBAR KIRI END -->

      <!-- NAVBAR 2 -->
      <div class="page-wrapper">
        <div class="page-breadcrumb bg-white">
          <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <h4 class="page-title">Ubah Data </h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
              <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                  <li><a href="dashboard.php" class="fw-normal">Dashboard</a></li>
              </div>
            </div>
          </div>
        </div>
        <!-- NAVBAR 2 END -->
    
        <!-- TABEL -->
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

                <!-- MODAL TAMBAH -->
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- MODAL TAMBAH END -->

                <!-- TABLE DATA -->
                <div class="table-responsive">
                  <table class="table text-nowrap">
                  <thead>
                    <tr>
                      <th class="border-top-0">No</th>
                      <th class="border-top-0">Nama Buku</th>
                      <th class="border-top-0">Unit Tersedia</th>
                      <th class="border-top-0">Status</th>
                      <th class="border-top-0">ID Buku</th>
                      <th class="border-top-0">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    include 'koneksi.php';

                    $conn->query("SET @row = 0");
                    $conn->query("UPDATE buku SET id = (@row := @row + 1)");

                    $result = $conn->query("SELECT * FROM buku ORDER BY id ASC");
                    
                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['nama_buku']; ?></td>
                      <td><?php echo $row['buku_tersisa']; ?></td>
                      <td><?php echo $row['keterangan']; ?></td>
                      <td><?php echo $row['id_buku']; ?></td>
                      <td>
                        <button type="button" class="btn btn-primary" 
                          data-bs-toggle="modal" 
                          data-bs-target="#editModal"
                          data-id="<?php echo $row['id']; ?>"
                          data-nama_buku="<?php echo $row['nama_buku']; ?>"
                          data-buku_tersisa="<?php echo $row['buku_tersisa']; ?>"
                          data-keterangan="<?php echo $row['keterangan']; ?>"
                          data-id_buku="<?php echo $row['id_buku']; ?>">
                        Edit
                       </button>
                       <a href="delete_buku.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                       <button type="button" class="btn btn-danger">Delete</button>
                      </td>
                    </tr>
                    <?php
                      }
                        } else {
                        echo "0 results";
                        }

                        $conn->close();
                        ?>
                  </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
                  <!-- TABEL END -->

                                  
                  <!-- Modal edit -->
                  <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="editModalLabel">Edit Buku</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="edit_buku.php" method="post">
                            <input type="hidden" class="form-control" id="edit-id" name="id">
                            <div class="form-group">
                              <label for="edit-nama_buku">Nama Buku</label>
                              <input type="text" class="form-control" id="edit-nama_buku" name="nama_buku">
                            </div>
                            <div class="form-group">
                              <label for="edit-buku_tersisa">Buku Tersisa</label>
                              <input type="number" class="form-control" id="edit-buku_tersisa" name="buku_tersisa">
                            </div>
                            <div class="form-group">
                              <label for="edit-keterangan">Keterangan</label>
                              <select class="form-control" id="edit-keterangan" name="keterangan">
                                <option value="Tersedia">Tersedia</option>
                                <option value="Kosong">Kosong</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="edit-ID_buku">ID Buku</label>
                              <input type="text" class="form-control" id="edit-ID_buku" name="id_buku">
                            </div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- MODAL EDIT END -->

                    <!-- Delete Modal untuk tiap buku -->
                    <div class="modal fade" id="deleteModal<?php echo $row['id_buku'];?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Hapus Buku</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus buku ini?</p>
                            <form action="delete_buku.php" method="post">
                              <input type="hidden" name="id_buku" value="<?php echo $row['id_buku'];?>">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>


  
          <!-- FOOTER -->
          <footer class="footer text-center">
              2024 © InternHub.ID
            </footer>
          <!-- FOOTER END -->
        </div>

      </div>
    </div>

    <!-- SCRIPT -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/custom.js"></script>
    <script>
    const editModal = document.getElementById('editModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const nama_buku = button.getAttribute('data-nama_buku');
        const buku_tersisa = button.getAttribute('data-buku_tersisa');
        const keterangan = button.getAttribute('data-keterangan');
        const id_buku = button.getAttribute('data-id_buku');

        document.getElementById('edit-id').value = id;
        document.getElementById('edit-nama_buku').value = nama_buku;
        document.getElementById('edit-buku_tersisa').value = buku_tersisa;
        document.getElementById('edit-keterangan').value = keterangan;
        document.getElementById('edit-ID_buku').value = id_buku;
    });
</script>

  </body>
</html>
