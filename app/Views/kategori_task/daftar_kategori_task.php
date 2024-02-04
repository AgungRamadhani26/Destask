<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Kategori Task</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="table-responsive">
                  <h5 class="card-title">Daftar Kategori Task&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <button type="button" class="btn btn-success" title="Klik untuk menambah data kategori Task" data-bs-toggle="modal" data-bs-target="#modaltambah_kategoritask">
                        <i class="ri-add-fill"></i>
                     </button>
                  </h5>
                  <table class="table table-striped table-bordered" id="myTable">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Kategori Task</th>
                           <th>Deskripsi</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($kategori_task as $kt) : ?>
                           <tr>
                              <td><?= $i++ ?></td>
                              <td><?= $kt['nama_kategori_task'] ?></td>
                              <td><?= $kt['deskripsi_kategori_task'] ?></td>
                              <td>
                                 <button type="button" class="btn btn-warning" title="Klik untuk mengedit" data-bs-toggle="modal" data-bs-target="#modaledit_kategoritask" onclick="edit_kategori_task(<?php echo $kt['id_kategori_task'] ?>)"><i class="ri-edit-2-line"></i></button>
                                 <form action="/kategori_task/delete_kategori_task/<?= $kt['id_kategori_task']; ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data Kategori Task ?');"><i class="ri-delete-bin-5-line"></i></button>
                                 </form>
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

<!--include Modal untuk menambah kategori task baru-->
<?= $this->include('kategori_task/modal_add_kategoritask'); ?>

<!--include Modal untuk mengedit data kategori task-->
<?= $this->include('kategori_task/modal_edit_kategoritask'); ?>

<?= $this->endSection(); ?>