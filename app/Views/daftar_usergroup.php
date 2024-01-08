<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Usergroups</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="table-responsive">
                  <h5 class="card-title">Daftar Usergroup&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <button type="button" class="btn btn-success" title="Klik untuk menambah data usergroup" data-bs-toggle="modal" data-bs-target="#modaltambah_usergroup">
                        <i class="ri-add-fill"></i>
                     </button>
                  </h5>
                  <table class="table table-bordered datatable">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Nama</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1</td>
                           <td>Mobile</td>
                           <td>
                              <button type="button" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit" data-bs-toggle="modal" data-bs-target="#modaledit_usergroup"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>Mobile Design</td>
                           <td>
                              <button type="button" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>3</td>
                           <td>Web</td>
                           <td>
                              <button type="button" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>4</td>
                           <td>Web Design</td>
                           <td>
                              <button type="button" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></button>
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
<?= $this->include('/modal_add_usergroup'); ?>

<!--include Modal untuk mengedit data usergroup-->
<?= $this->include('/modal_edit_usergroup'); ?>

<?= $this->endSection(); ?>