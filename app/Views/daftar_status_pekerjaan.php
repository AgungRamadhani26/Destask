<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Status Pekerjaan</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="table-responsive">
                  <h5 class="card-title">Daftar Status Pekerjaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <button type="button" class="btn btn-success" title="Klik untuk menambah data status pekerjaan" data-bs-toggle="modal" data-bs-target="#modaltambah_statuspekerjaan">
                        <i class="ri-add-fill"></i>
                     </button>
                  </h5>
                  <table class="table table-bordered datatable">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Status Pekerjaan</th>
                           <th>Deskripsi</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1</td>
                           <td>On Progres</td>
                           <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis</td>
                           <td>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit" data-bs-toggle="modal" data-bs-target="#modaledit_statuspekerjaan"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>Selesai</td>
                           <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum laborum</td>
                           <td>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>3</td>
                           <td>Pending</td>
                           <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere ipsam</td>
                           <td>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>4</td>
                           <td>Cancle</td>
                           <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem veritatis</td>
                           <td>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>5</td>
                           <td>Support</td>
                           <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem veritatis</td>
                           <td>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>6</td>
                           <td>Bast</td>
                           <td>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Autem veritatis</td>
                           <td>
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

<!--include Modal untuk menambah status pekerjaan baru-->
<?= $this->include('/modal_add_statuspekerjaan'); ?>

<!--include Modal untuk mengedit data status pekerjaan-->
<?= $this->include('/modal_edit_statuspekerjaan'); ?>

<?= $this->endSection(); ?>