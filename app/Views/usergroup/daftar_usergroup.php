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
                  <table class="table table-striped table-bordered" id="myTable">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Nama Usergroup</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($usergroup as $u) : ?>
                           <tr>
                              <td><?= $i++ ?></td>
                              <td><?= $u['nama_usergroup'] ?></td>
                              <td>
                                 <button type="button" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></button>
                                 <button type="button" class="btn btn-warning" title="Klik untuk mengedit" data-bs-toggle="modal" data-bs-target="#modaledit_usergroup" onclick="edit_usergroup(<?php echo $u['id_usergroup'] ?>)"><i class="ri-edit-2-line"></i></button>
                                 <form action="/usergroup/delete_usergroup/<?= $u['id_usergroup']; ?>" method="POST" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data Usergroup ?');"><i class="ri-delete-bin-5-line"></i></button>
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
<?= $this->include('usergroup/modal_add_usergroup'); ?>

<!--include Modal untuk mengedit data usergroup-->
<?= $this->include('usergroup/modal_edit_usergroup'); ?>

<?= $this->endSection(); ?>