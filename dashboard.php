<?php
session_start();
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
                <form role="search" class="app-search d-none d-md-block me-3">
                  <input
                    type="text"
                    id="search-input-db"
                    placeholder="Search..."
                    class="form-control mt-0"
                  />
                  <a href="" class="active">
                    <i class="fa fa-search"></i>
                  </a>
                </form>
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

      <!-- NAVBAR SAMPING -->
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
      <!-- END NAVBAR SAMPING -->

      <div class="page-wrapper">

        <!-- NAVBAR ATAS 2 -->
        <div class="page-breadcrumb bg-white">
          <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
              <div class="d-md-flex">
                <ol class="breadcrumb ms-auto">
                <li>
                    <?php if(isset($_SESSION['full_name'])): ?>
                        <a href="javascript:void(0);" onclick="confirmLogout();" class="fw-normal">Keluar</a>
                    <?php else: ?>
                        <a href="login.php" class="fw-normal">Login</a>
                    <?php endif; ?>
                </li>
                </ol>
              </div>
            </div>
          </div>
        </div>

        <div class="container-fluid">
          <!-- TABEL BUKU -->
          <div class="row">
            <div class="col-md-12 col-lg-12 col-sm-12">
              <div class="white-box">
                <div class="d-md-flex mb-3">
                  <h3 class="box-title mb-0">Daftar Buku</h3>
                </div>
                <div class="table-responsive">
                  <table class="table no-wrap">
                    <thead>
                      <tr>
                        <th class="border-top-0">No</th>
                        <th class="border-top-0">Nama Buku</th>
                        <th class="border-top-0">Unit Tersedia</th>
                        <th class="border-top-0">Status</th>
                        <th class="border-top-0">ID Buku</th>
                        <!-- <th class="border-top-0">ID Buku</th> -->
                      </tr>
                    </thead>
                    <tbody id="tabel-buku-body">
                      <?php include "tampil_buku.php"; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- TABEL BUKU END -->

          <!-- TABEL BUKU YG DIPINJAM -->
          <div class="row">
          <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
              <div class="d-md-flex mb-3">
                <h3 class="box-title mb-0">Buku yang Sedang Dipinjam</h3>
              </div>
              <div class="table-responsive">
                <table class="table no-wrap">
                  <thead>
                    <tr>
                      <th class="border-top-0">No</th>
                      <th class="border-top-0">Nama Buku</th>
                      <th class="border-top-0">Tanggal Peminjaman</th>
                      <th class="border-top-0">ID Buku</th>
                      <th class="border-top-0">Jumlah Dipinjam</th>
                      <th class="border-top-0"></th>
                    </tr>
                  </thead>
                  <tbody id="tableBukuDipinjam">
                  <?php
                      include 'koneksi.php';

                      $conn->query("SET @row = 0");
                      $conn->query("UPDATE buku_yang_dipinjam SET id = (@row := @row + 1)");

                      $result = $conn->query("SELECT * FROM buku_yang_dipinjam");

                      if ($result->num_rows > 0) {
                          while($row = $result->fetch_assoc()) {
                            ?>
                          <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['nama_buku']; ?></td>
                            <td><?php echo $row['tanggal_peminjaman']; ?></td>
                            <td><?php echo $row['id_buku']; ?></td>
                            <td><?php echo $row['buku_tersisa']; ?></td>
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

          <!-- FOOTER -->
          <footer class="footer text-center">
            2024 © InternHub.ID
          </footer>
          <!-- FOOTER END -->
           
      </div>
          <!-- TABEL BUKU YG DIPINJAM END -->

 
          <!-- FOOTER -->
        <footer class="footer text-center">
          2024 © InternHub.ID
        </footer>
        <!-- End footer -->

      </div>
    </div>

    <!-- SCRIPT -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/custom.js"></script>
    <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
    <script>
        function confirmLogout() {
          var confirmation = confirm("Apakah kamu yakin ingin keluar?");
          if (confirmation) {
            window.location.href = 'logout.php';
          }
        }
      </script>
      <script>
        $(document).ready(function() {
          $('#search-input-db').on('keyup', function() {
            var query = $(this).val();
            $.ajax({
              url: 'search_bukudb.php',
              method: 'POST',
              data: { query: query },
              success: function(data) {
                $('#tabel-buku-body').html(data);
              }
            });
          });
        });
      </script>
  </body>
</html>
