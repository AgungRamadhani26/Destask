<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="assets/css/style_login.css">
   <!--Js untuk google recapcha-->
   <script src="https://www.google.com/recaptcha/api.js" async defer></script>
   <title>DesTask</title>
</head>

<body>
   <section class="background-radial-gradient overflow-hidden">
      <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
         <div class="row gx-lg-5 align-items-center mb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
               <img src="assets/img/logo_desnet.png" alt="logo desnet">
               <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                  Selamat Datang<br />
                  <span style="color: hsl(218, 81%, 75%)">di DesTask</span>
               </h1>
               <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                  Aplikasi monitoring pengerjaan task, dan perencanaan target pekerjaan Departemen Aplikasi PT Des Teknologi Informasi (Desnet).
               </p>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
               <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
               <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

               <div class="card bg-glass">
                  <div class="card-body px-4 py-5 px-md-5">
                     <center>
                        <img src="assets/img/logo_destask_login.png" alt="logo destask" height="100px" class="mb-4">
                     </center>
                     <form>
                        <div class="form-outline mb-4">
                           <input type="email" id="form3Example3" class="form-control" placeholder="Email / Username" />
                        </div>
                        <div class="form-outline mb-4">
                           <input type="password" id="form3Example4" class="form-control" placeholder="Password" />
                        </div>
                        <div class="row">
                           <div class="col-md-9 mb-4">
                              <!--Google Recapcha-->
                              <div class="g-recaptcha" data-sitekey="6LfQ0D0kAAAAAL78dOEU7Z_CKv35PgQeAu1xby6K"></div>
                           </div>
                           <div class="col-md-3 mb-4">
                              <button type="submit" class="btn btn-primary btn-block">
                                 Login
                              </button>
                           </div>
                        </div>
                        <div class="text-center">
                           <a href="">Lupa Password?</a>
                        </div>
                     </form>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </section>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>