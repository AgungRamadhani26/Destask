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
                  <table class="table table-striped table-bordered" id="myTable">
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
                        <?php $i = 1 ?>
                        <?php foreach ($user as $ur) : ?>
                           <tr>
                              <td><?= $i++ ?></td>
                              <td><?= $ur['username'] ?></td>
                              <td><?= $ur['email'] ?></td>
                              <td><?= $ur['nama'] ?></td>
                              <td><?= $ur['user_level'] ?></td>
                              <td>
                                 <button type="button" class="btn btn-secondary" title="Klik untuk menonaktifkan"><i class="bx bx-minus-circle"></i></button>
                                 <button type="button" class="btn btn-warning" title="Klik untuk mengedit" data-bs-toggle="modal" data-bs-target="#modaledit_user" onclick="edit_user(<?php echo $ur['id_user'] ?>)"><i class="ri-edit-2-line"></i></button>
                                 <form action="/user/delete_user/<?= $ur['id_user'] ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data user ?');"><i class="ri-delete-bin-5-line"></i></button>
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

<!--include Modal untuk menambah user baru-->
<?= $this->include('user/modal_add_user'); ?>

<!--include Modal untuk mengedit data user-->
<?= $this->include('user/modal_edit_user'); ?>

<?= $this->endSection(); ?>