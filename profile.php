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
    <link rel="stylesheet" href="style_login.css">
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
                    id="search-input-pf"
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

      <div class="page-wrapper">
        <div class="page-breadcrumb bg-white">
          <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <h4 class="page-title">Karyawan</h4>
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

        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <div class="white-box">
                <div class="d-flex justify-content-between" style="padding-bottom: 10px;">
                    <h3 class="box-title">Daftar Karyawan</h3>
                </div>

                <!-- TABLE DATA -->
                <div class="table-responsive">
                  <table class="table text-nowrap">
                  <thead>
                    <tr>
                      <th class="border-top-0">No</th>
                      <th class="border-top-0">Nama Karyawan</th>
                      <th class="border-top-0">Email Karyawan</th>
                      <th class="border-top-0">Password</th>
                      <th class="border-top-0">Dibuat Pada</th>
                      <th class="border-top-0"></th>
                    </tr>
                  </thead>
                  <tbody id="profile-tabel">
                    <?php
                    include 'koneksi.php';

                    $conn->query("SET @row = 0");
                    $conn->query("UPDATE users SET id_users = (@row := @row + 1)");

                    $result = $conn->query("SELECT * FROM users ORDER BY id_users ASC");
                    
                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                      <td><?php echo $row['id_users']; ?></td>
                      <td><?php echo $row['full_name']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td style="max-width: 150px; overflow-x: auto; white-space: nowrap; display: block;"><?php echo $row['password']; ?></td>
                      <td><?php echo $row['created_at']; ?></td>
                      <td>
                        <button type="button" class="btn btn-primary" 
                          data-bs-toggle="modal" 
                          data-bs-target="#editModal"
                          data-id_users="<?php echo $row['id_users']; ?>"
                          data-full_name="<?php echo $row['full_name']; ?>"
                          data-email="<?php echo $row['email']; ?>"
                          data-password="<?php echo $row['password']; ?>"
                          data-created_at="<?php echo $row['created_at']; ?>">
                        Edit
                       </button>
                       <a href="delete_users.php?id_users=<?php echo $row['id_users']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                       <button type="button" class="btn btn-danger">Delete</button>
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
   
          <!-- MODAL EDIT KARYAWAN -->
          <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="editModalLabel">Ubah data karyawan</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form action="edit_users.php" method="post">
                            <input type="hidden" class="form-control" id="edit-id_users" name="id_users">
                            <div class="form-group">
                              <label for="edit-full_name">Nama Karyawan</label>
                              <input type="text" class="form-control" id="edit-full_name" name="full_name">
                            </div>
                            <div class="form-group">
                              <label for="edit-email">Email Karyawan</label>
                              <input type="text" class="form-control" id="edit-email" name="email">
                            </div>
                            <div class="form-group">
                              <label for="edit-password">Password</label>
                              <input type="text" class="form-control" id="edit-password" name="password" readonly>
                            </div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
          <!-- MODAL EDIT KARYAWAN END -->

          
          <!-- Delete Modal untuk tiap buku -->
          <div class="modal fade" id="deleteModal<?php echo $row['full_name'];?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
             <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Hapus data karyawan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah Anda yakin ingin menghapus Data karyawan ini?</p>
                          <form action="delete_buku.php" method="post">
                            <input type="hidden" name="id_buku" value="<?php echo $row['full_name'];?>">
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
            const id_users = button.getAttribute('data-id_users');
            const full_name = button.getAttribute('data-full_name');
            const email = button.getAttribute('data-email');
            const password = button.getAttribute('data-password');
            const created_at = button.getAttribute('data-created_at');

            document.getElementById('edit-id_users').value = id_users;
            document.getElementById('edit-full_name').value = full_name;
            document.getElementById('edit-email').value = email;
            document.getElementById('edit-password').value = password;
            document.getElementById('edit-created_at').value = created_at;
        });
    </script>
    <script>
        $(document).ready(function() {
          $('#search-input-pf').on('keyup', function() {
            var query = $(this).val();
            $.ajax({
              url: 'search_profile.php',
              method: 'POST',
              data: { query: query },
              success: function(data) {
                $('#profile-tabel').html(data);
              }
            });
          });
        });
    </script>
  </body>
</html>
