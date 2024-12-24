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
      rel="canonical"
      href="https://www.wrappixel.com/templates/ample-admin-lite/"
    />
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
              <li class="in">
              </li>
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

      <div class="page-wrapper" style="min-height: 250px">
        <div class="page-breadcrumb bg-white">
          <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <h4 class="page-title">Peminjaman Buku</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
              <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                  <li><a href="dashboard.php" class="fw-normal">Dashboard</a></li>
                </ol>
              </div>
            </div>
          </div>
        </div>

<!-- TABEL PINJAM -->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="white-box">
        <h3 class="box-title">Data Buku</h3>
        <p class="text-muted">Pilih Buku yg ingin dipinjam</p>
        <div class="table-responsive">
          <table class="table text-nowrap">
            <thead>
              <tr>
                <th class="border-top-0">No</th>
                <th class="border-top-0">Nama Buku</th>
                <th class="border-top-0">Buku Tersisa</th>
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
                <button type="button" class="btn btn-primary pinjam-btn"
                        data-id="<?php echo $row['id_buku']; ?>"
                        data-nama="<?php echo $row['nama_buku']; ?>"
                        data-tersisa="<?php echo $row['buku_tersisa']; ?>">
                    +
                </button>

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
</div>
<!-- TABEL PINJAM END -->

<!-- BUKU YANG INGIN DIPINJAM -->
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12">
      <div class="white-box">
        <h3 class="box-title">Buku yg ingin Dipinjam</h3>
        <p class="text-muted">Konfimasi Buku</p>
        <div class="table-responsive">
          <table id="bukuPeminjaman" class="table text-nowrap">
            <thead>
              <tr>
                <th class="border-top-0">No</th>
                <th class="border-top-0">Nama Buku</th>
                <th class="border-top-0">Buku Tersisa</th>
                <th class="border-top-0">Status</th>
                <th class="border-top-0">ID Buku</th>
                <th class="border-top-0">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!-- Buku yang ingin dipinjam akan ditambahkan di sini -->
            </tbody>
          </table>
          <div class="text-right">
            <button id="pinjamBukuButton" class="btn btn-primary">Pinjam Buku</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- BUKU YANG INGIN DIPINJAM END -->


          <!-- FOOTER -->
          <footer class="footer text-center">2024 © InternHub.ID</footer>
          <!-- FOOTER END -->
        </div>
    </div>

    <!-- SCRIPT -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <script src="function.js"></script>

    <script src="js/custom.js"></script>
  </body>
</html>
