<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">
   <title>DesTask</title>
   <meta content="" name="description">
   <meta content="" name="keywords">
   <!-- Favicons -->
   <link href="/assets/img/icon_destask.png" rel="icon">
   <link href="/assets/img/icon_destask.png" rel="apple-touch-icon">
   <!-- Google Fonts -->
   <link href="https://fonts.gstatic.com" rel="preconnect">
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <!-- Vendor CSS Files -->
   <link href="/assets/library_fe/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="/assets/library_fe/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
   <link href="/assets/library_fe/boxicons/css/boxicons.min.css" rel="stylesheet">
   <link href="/assets/library_fe/remixicon/remixicon.css" rel="stylesheet">
   <!-- Template Main CSS File -->
   <link href="/assets/css/style.css" rel="stylesheet">
   <link href="/assets/css/tambahan.css" rel="stylesheet">
   <link rel="stylesheet" href="/assets/css/style_login.css">
</head>

<body>
   <section class="background-image-resetpass">
      <div class="container">
         <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center form-login">
                     <div class="card mb-3 bg-glass">
                        <div class="card-body">
                           <div class="d-flex justify-content-center pt-4">
                              <img src="/assets/img/logo_destask_login.png" alt="logo destask" height="80px">
                           </div>
                           <div>
                              <h5 class="card-title text-center pb-0 fs-5">Reset Password</h5>
                              <p class="text-center small">Silahkan input password baru anda</p>
                           </div>
                           <form action="/lupa_password/save_reset_password/<?= $user['id_user'] ?>" method="POST" class="row g-3">
                              <?= csrf_field(); ?>
                              <div class="col-12">
                                 <?php if (session()->getFlashdata('err_pass_Konf')) { ?>
                                    <div class="alert alert-danger">
                                       <?= session()->getFlashdata('err_pass_Konf') ?>
                                    </div>
                                 <?php } ?>
                              </div>
                              <div class="col-12">
                                 <input type="text" name="email_reset_password" class="form-control" id="email_reset_password" placeholder="Email" value="<?= $user['email']; ?>" readonly style="background-color: gainsboro;">
                                 <div class="invalid-feedback">
                                 </div>
                              </div>
                              <div class="col-12">
                                 <input type="password" name="passwordbaru_reset_password" class="form-control <?= (session()->getFlashdata('err_passwordbaru_reset_password')) ? 'is-invalid' : ''; ?>" id="passwordbaru_reset_password" placeholder="Password Baru" value="<?= old('passwordbaru_reset_password'); ?>">
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_passwordbaru_reset_password') ?>
                                 </div>
                              </div>
                              <div class="col-12">
                                 <input type="password" name="konfirmasi_passwordbaru_reset_password" class="form-control <?= (session()->getFlashdata('err_konfirmasi_passwordbaru_reset_password')) ? 'is-invalid' : ''; ?>" id="konfirmasi_passwordbaru_reset_password" placeholder="Konfirmasi Password Baru" value="<?= old('konfirmasi_passwordbaru_reset_password'); ?>">
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_konfirmasi_passwordbaru_reset_password') ?>
                                 </div>
                              </div>
                              <div class="col-12 mt-4">
                                 <button class="btn btn-primary w-100" type="submit">Kirim</button>
                              </div>
                              <div class="col-12 pb-2">
                                 <p class="small mb-0">Kembali ke menu login ? <a href="/">Klik disini</a></p>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </section>
   <!-- Vendor JS Files -->
   <script src="/assets/library_fe/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>