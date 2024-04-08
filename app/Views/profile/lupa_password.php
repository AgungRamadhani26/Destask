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
   <main class="background-image-lupapass">
      <div class="container">
         <section class="section register min-vh-100 d-flex flex-column justify-content-center">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center form-login">
                     <div class="card mb-3 bg-glass">
                        <div class="card-body">
                           <div class="d-flex justify-content-center pt-4">
                              <img src="/assets/img/logo_destask_login.png" alt="logo destask" height="80px">
                           </div>
                           <div>
                              <h5 class="card-title text-center pb-0 fs-5">Lupa Password</h5>
                              <p class="text-center small">Tolong kirimkan email saudara agar kami dapat mengirim link pembaruan password ke email yang saudara kirimkan</p>
                           </div>
                           <form action="/lupa_password/cek_email" method="POST" class="row g-3">
                              <?= csrf_field(); ?>
                              <div class="col-12">
                                 <?php if (session()->getFlashdata('berhasil_kirim_email')) : ?>
                                    <div class="alert alert-success">
                                       <?= session()->getFlashdata('berhasil_kirim_email') ?>
                                    </div>
                                 <?php elseif (session()->getFlashdata('gagal_kirim_email')) : ?>
                                    <div class="alert alert-danger">
                                       <?= session()->getFlashdata('gagal_kirim_email') ?>
                                    </div>
                                 <?php endif; ?>
                              </div>
                              <div class="col-12">
                                 <label for="email_lupa_password" class="form-label">Email</label>
                                 <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-envelope-at"></i></span>
                                    <input type="email" name="email_lupa_password" class="form-control <?= (session()->getFlashdata('err_email_lupa_password')) ? 'is-invalid' : ''; ?>" id="email_lupa_password" value="<?= old('email_lupa_password'); ?>">
                                    <div class="invalid-feedback">
                                       <?= session()->getFlashdata('err_email_lupa_password') ?>
                                    </div>
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
   </main>
   <!-- Vendor JS Files -->
   <script src="/assets/library_fe/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>