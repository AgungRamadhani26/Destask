<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Users</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="table-responsive">
                  <h5 class="card-title">Daftar Users&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <button type="button" class="btn btn-success" title="Klik untuk menambah data user" data-bs-toggle="modal" data-bs-target="#modaltambah_user">
                        <i class="ri-add-fill"></i>
                     </button>
                  </h5>
                  <table class="table table-bordered datatable" id="tabel_custom">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Username</th>
                           <th>Email</th>
                           <th>Nama</th>
                           <th>User Level</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1</td>
                           <td>agung2611</td>
                           <td>agungramadhani2611@gmail.com</td>
                           <td>Agung Ramadhani</td>
                           <td>Hod</td>
                           <td>
                              <button type="button" class="btn btn-secondary" title="Klik untuk menonaktifkan"><i class="bx bx-minus-circle"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit" data-bs-toggle="modal" data-bs-target="#modaledit_user"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>ade</td>
                           <td>ade7878@gmail.com</td>
                           <td>Ade Kurniawan</td>
                           <td>Direksi</td>
                           <td>
                              <button type="button" class="btn btn-secondary" title="Klik untuk menonaktifkan"><i class="bx bx-minus-circle"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>3</td>
                           <td>Rijal17</td>
                           <td>rijalanakmama@gmail.com</td>
                           <td>Rijal Kurniawan</td>
                           <td>Supervisi</td>
                           <td>
                              <button type="button" class="btn btn-secondary" title="Klik untuk menonaktifkan"><i class="bx bx-minus-circle"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>4</td>
                           <td>bimadecima</td>
                           <td>bimarahma@gmail.com</td>
                           <td>Bima Satria</td>
                           <td>Staff</td>
                           <td>
                              <button type="button" class="btn btn-secondary" title="Klik untuk menonaktifkan"><i class="bx bx-minus-circle"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>5</td>
                           <td>dafadinda12</td>
                           <td>anakdokterhelmi@gmail.com</td>
                           <td>Dafa Rizkinta Heltansah Sinaga</td>
                           <td>Admin</td>
                           <td>
                              <button type="button" class="btn btn-secondary" title="Klik untuk menonaktifkan"><i class="bx bx-minus-circle"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>6</td>
                           <td>agung2611</td>
                           <td>agungramadhani2611@gmail.com</td>
                           <td>Agung Ramadhani</td>
                           <td>Hod</td>
                           <td>
                              <button type="button" class="btn btn-secondary" title="Klik untuk menonaktifkan"><i class="bx bx-minus-circle"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>7</td>
                           <td>ade</td>
                           <td>ade7878@gmail.com</td>
                           <td>Ade Kurniawan</td>
                           <td>Direksi</td>
                           <td>
                              <button type="button" class="btn btn-secondary" title="Klik untuk menonaktifkan"><i class="bx bx-minus-circle"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>8</td>
                           <td>Rijal17</td>
                           <td>rijalanakmama@gmail.com</td>
                           <td>Rijal Kurniawan</td>
                           <td>Supervisi</td>
                           <td>
                              <button type="button" class="btn btn-secondary" title="Klik untuk menonaktifkan"><i class="bx bx-minus-circle"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>9</td>
                           <td>bimadecima</td>
                           <td>bimarahma@gmail.com</td>
                           <td>Bima Satria</td>
                           <td>Staff</td>
                           <td>
                              <button type="button" class="btn btn-secondary" title="Klik untuk menonaktifkan"><i class="bx bx-minus-circle"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>10</td>
                           <td>dafadinda12</td>
                           <td>anakdokterhelmi@gmail.com</td>
                           <td>Dafa Rizkinta Heltansah Sinaga</td>
                           <td>Admin</td>
                           <td>
                              <button type="button" class="btn btn-secondary" title="Klik untuk menonaktifkan"><i class="bx bx-minus-circle"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>11</td>
                           <td>agung2611</td>
                           <td>agungramadhani2611@gmail.com</td>
                           <td>Agung Ramadhani</td>
                           <td>Hod</td>
                           <td>
                              <button type="button" class="btn btn-secondary" title="Klik untuk menonaktifkan"><i class="bx bx-minus-circle"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>12</td>
                           <td>ade</td>
                           <td>ade7878@gmail.com</td>
                           <td>Ade Kurniawan</td>
                           <td>Direksi</td>
                           <td>
                              <button type="button" class="btn btn-secondary" title="Klik untuk menonaktifkan"><i class="bx bx-minus-circle"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>13</td>
                           <td>Rijal17</td>
                           <td>rijalanakmama@gmail.com</td>
                           <td>Rijal Kurniawan</td>
                           <td>Supervisi</td>
                           <td>
                              <button type="button" class="btn btn-secondary" title="Klik untuk menonaktifkan"><i class="bx bx-minus-circle"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>14</td>
                           <td>bimadecima</td>
                           <td>bimarahma@gmail.com</td>
                           <td>Bima Satria</td>
                           <td>Staff</td>
                           <td>
                              <button type="button" class="btn btn-secondary" title="Klik untuk menonaktifkan"><i class="bx bx-minus-circle"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>15</td>
                           <td>dafadinda12</td>
                           <td>anakdokterhelmi@gmail.com</td>
                           <td>Dafa Rizkinta Heltansah Sinaga</td>
                           <td>Admin</td>
                           <td>
                              <button type="button" class="btn btn-secondary" title="Klik untuk menonaktifkan"><i class="bx bx-minus-circle"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<!--include Modal untuk menambah user baru-->
<?= $this->include('/modal_add_user'); ?>

<!--include Modal untuk mengedit data user-->
<?= $this->include('/modal_edit_user'); ?>

<?= $this->endSection(); ?>