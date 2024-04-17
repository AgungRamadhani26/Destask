<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Kategori Pekerjaan</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="table-responsive">
                  <h5 class="card-title">Daftar Kategori Pekerjaan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                     <!-- <button type="button" class="btn btn-success" title="Klik untuk menambah data kategori pekerjaan" data-bs-toggle="modal" data-bs-target="#modaltambah_kategoripekerjaan">
                        <i class="ri-add-fill"></i>
                     </button> -->
                  </h5>
                  <table class="table table-striped table-bordered" id="myTable">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Kategori Pekerjaan</th>
                           <th>Deskripsi</th>
                           <th>Color</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php $i = 1 ?>
                        <?php foreach ($kategori_pekerjaan as $kp) : ?>
                           <tr>
                              <td><?= $i++ ?></td>
                              <td><?= $kp['nama_kategori_pekerjaan'] ?></td>
                              <td><?= $kp['deskripsi_kategori_pekerjaan'] ?></td>
                              <td style="background-color: <?= $kp['color'] ?>; color:white"><?= $kp['color'] ?></td>
                              <td>
                                 <div class="btn-group" role="group">
                                    <div>
                                       <button type="button" class="btn btn-warning" title="Klik untuk mengedit" data-bs-toggle="modal" data-bs-target="#modaledit_kategoripekerjaan" onclick="edit_kategori_pekerjaan(<?php echo $kp['id_kategori_pekerjaan'] ?>)"><i class="ri-edit-2-line"></i></button>
                                    </div>
                                    <!-- <form action="/kategori_pekerjaan/delete_kategori_pekerjaan/<?= $kp['id_kategori_pekerjaan']; ?>" method="POST" class="d-inline">
                                       <?= csrf_field(); ?>
                                       <input type="hidden" name="_method" value="DELETE">
                                       <button type="submit" class="btn btn-danger" title="Klik untuk menghapus" onclick="return confirm('Apakah anda yakin menghapus data Kategori Pekerjaan ?');"><i class="ri-delete-bin-5-line"></i></button>
                                    </form> -->
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

<!--include Modal untuk menambah kategori pekerjaan baru-->
<?= $this->include('kategori_pekerjaan/modal_add_kategoripekerjaan'); ?>

<!--include Modal untuk mengedit data kategori pekerjaan-->
<?= $this->include('kategori_pekerjaan/modal_edit_kategoripekerjaan'); ?>

<?= $this->endSection(); ?>