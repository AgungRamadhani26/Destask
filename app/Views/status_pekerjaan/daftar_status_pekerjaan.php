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
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Status Pekerjaan</th>
                           <th>Deskripsi</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($status_pekerjaan as $sp) : ?>
                           <tr>
                              <td><?= $i++ ?></td>
                              <td><?= $sp['nama_status_pekerjaan'] ?></td>
                              <td><?= $sp['deskripsi_status_pekerjaan'] ?></td>
                              <td>
                                 <button type="button" class="btn btn-warning" title="Klik untuk mengedit" data-bs-toggle="modal" data-bs-target="#modaledit_statuspekerjaan" onclick="edit_status_pekerjaan(<?php echo $sp['id_status_pekerjaan'] ?>)"><i class=" ri-edit-2-line"></i></button>
                                 <button type="button" class="btn btn-danger tombol-hapus-status-pekerjaan" title="Klik untuk menghapus" data-id_status_pekerjaan="<?= $sp['id_status_pekerjaan'] ?>"><i class="ri-delete-bin-5-line"></i></button>
                              </td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<!--include Modal untuk menambah status pekerjaan baru-->
<?= $this->include('status_pekerjaan/modal_add_statuspekerjaan'); ?>

<!--include Modal untuk mengedit data status pekerjaan-->
<?= $this->include('status_pekerjaan/modal_edit_statuspekerjaan'); ?>

<?= $this->endSection(); ?>