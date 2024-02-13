<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Hari Libur</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="table-responsive">
                  <h5 class="card-title">Daftar Hari Libur&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <button type="button" class="btn btn-success" title="Klik untuk menambah data hari libur" data-bs-toggle="modal" data-bs-target="#modaltambah_harilibur">
                        <i class="ri-add-fill"></i>
                     </button>
                  </h5>
                  <table class="table table-striped table-bordered" id="myTable">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Tanggal</th>
                           <th>Keterangan</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($hari_libur as $hl) : ?>
                           <tr>
                              <?php $tanggal_libur = date('d-m-Y', strtotime($hl['tanggal_libur'])) ?>
                              <td><?= $i++ ?></td>
                              <td><?= $tanggal_libur ?></td>
                              <td><?= $hl['keterangan'] ?></td>
                              <td>
                                 <div class="btn-group" role="group">
                                    <div>
                                       <button type="button" class="btn btn-warning" title="Klik untuk mengedit" data-bs-toggle="modal" data-bs-target="#modaledit_harilibur" onclick="edit_hari_libur(<?php echo $hl['id_hari_libur'] ?>)"><i class="ri-edit-2-line"></i></button>
                                    </div>
                                    <form action="/hari_libur/delete_hari_libur/<?= $hl['id_hari_libur']; ?>" method="POST" class="d-inline">
                                       <?= csrf_field(); ?>
                                       <input type="hidden" name="_method" value="DELETE">
                                       <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data hari libur ?');"><i class="ri-delete-bin-5-line"></i></button>
                                    </form>
                                 </div>
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
<?= $this->include('hari_libur/modal_add_hari_libur'); ?>

<!--include Modal untuk mengedit data kategori task-->
<?= $this->include('hari_libur/modal_edit_hari_libur'); ?>

<?= $this->endSection(); ?>