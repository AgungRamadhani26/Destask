<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Status Task</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="table-responsive">
                  <h5 class="card-title">Daftar Status Task&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <button type="button" class="btn btn-success" title="Klik untuk menambah data status task" data-bs-toggle="modal" data-bs-target="#modaltambah_statustask">
                        <i class="ri-add-fill"></i>
                     </button>
                  </h5>
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Status Task</th>
                           <th>Deskripsi</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($status_task as $st) : ?>
                           <tr>
                              <td><?= $i++ ?></td>
                              <td><?= $st['nama_status_task'] ?></td>
                              <td><?= $st['deskripsi_status_task'] ?></td>
                              <td>
                                 <button type="button" class="btn btn-warning" title="Klik untuk mengedit" data-bs-toggle="modal" data-bs-target="#modaledit_statustask" onclick="edit_status_task(<?php echo $st['id_status_task'] ?>)"><i class="ri-edit-2-line"></i></button>
                                 <button type="button" class="btn btn-danger" title="Klik untuk menghapus" data-id_status_task="<?= $st['id_status_task'] ?>"><i class="ri-delete-bin-5-line"></i></button>
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

<!--include Modal untuk menambah status task baru-->
<?= $this->include('status_task/modal_add_statustask'); ?>

<!--include Modal untuk mengedit data status task-->
<?= $this->include('status_task/modal_edit_statustask'); ?>

<?= $this->endSection(); ?>