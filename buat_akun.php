<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>InternHub Sign Up</title>
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="plugins/images/INTERN.png"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
<section class="bg-light py-3 py-md-5">
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
      <div class="card border border-light-subtle rounded-3 no-shadow">
        <div class="card-body p-3 p-md-4 p-xl-5">
          <div class="text-center mb-3">
            <a href="#!">
              <img src="./plugins/images/2.png" alt="BootstrapBrain Logo" width="175" height="auto">
            </a>
          </div>
          <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Isi Form untuk membuat akun baru</h2>

          <?php
          // Cek apakah ada error message di session
          if (isset($_SESSION['error_message'])) {
              echo '<div class="alert alert-danger text-center">';
              echo $_SESSION['error_message'];
              echo '</div>';
              // Hapus pesan error setelah ditampilkan
              unset($_SESSION['error_message']);
          }
          ?>

          <form action="buat_akun_users.php" method="post">
            <div class="row gy-2 overflow-hidden">
              <div class="col-12">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="full_name" id="full_name" placeholder="John Doe" required>
                  <label for="full_name" class="form-label">Nama Lengkap</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                  <label for="email" class="form-label">Email</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                  <label for="password" class="form-label">Password</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                  <label for="confirm_password" class="form-label">Konfirmasi Password</label>
                </div>
              </div>
              <div class="col-12">
                <div class="d-grid my-3">
                  <button class="btn btn-primary btn-lg" type="submit">Daftar</button>
                </div>
              </div>
              <div class="col-12">
                <p class="m-0 text-secondary text-center">Sudah punya akun? <a href="login.php" class="link-primary text-decoration-none">Masuk Disini</a></p>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
