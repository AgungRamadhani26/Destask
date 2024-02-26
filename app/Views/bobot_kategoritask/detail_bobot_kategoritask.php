<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Kelola Bobot task</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card_title_firter_poin_harian bg-info">
               <center>
                  <h4 class="card-title" style="color: white;">
                     Detail Bobot Kategori Task
                  </h4>
               </center>
            </div>
            <div class="card-body">
               <div class="row mb-2">
                  <?php foreach ($bobot_kategori_task as $bk) : ?>
                     <div class="col-sm-4">
                        <label for="Tahun" style="font-weight: 600;">Tahun</label>
                        <input type="text" class="form-control" value="<?= $bk['tahun'] < date('Y') ? $bk['tahun'] . ' (Sudah lewat periode)' : $bk['tahun'] ?>" disabled>
                     </div>
                     <div class="col-sm-4">
                        <label for="usergroup" style="font-weight: 600;">User Group</label>
                        <?php foreach ($usergroup as $ug) : ?>
                           <?php if ($bk['id_usergroup'] == $ug['id_usergroup']) : ?>
                              <input type="text" class="form-control" value="<?= $ug['nama_usergroup'] ?>" disabled>
                           <?php endif; ?>
                        <?php endforeach; ?>
                     </div>
                     <div class="col-sm-4">
                        <label for="usergroup" style="font-weight: 600;">Total Bobot Task</label>
                        <input type="text" class="form-control" value="<?= $bk['total_bobot_poin'] . ' poin' ?>" disabled>
                     </div>
                  <?php endforeach; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="row mt-3">
                  <div class="col-sm-6">
                     <label for="Tahun" style="font-weight: 600;">Kategori</label>
                     <?php foreach ($kategori_task_dan_poin as $kt) : ?>
                        <?php foreach ($kategori_task as $k) : ?>
                           <?php if ($kt['id_kategori_task'] == $k['id_kategori_task']) : ?>
                              <input type="text" class="form-control mb-2" value="<?= $k['nama_kategori_task'] ?>" disabled>
                           <?php endif; ?>
                        <?php endforeach; ?>
                     <?php endforeach; ?>
                  </div>
                  <div class="col-sm-6">
                     <label for="usergroup" style="font-weight: 600;">Bobot</label>
                     <?php foreach ($kategori_task_dan_poin as $kt) : ?>
                        <input type="text" class="form-control mb-2" value="<?= $kt['bobot_poin'] . ' poin' ?>" disabled>
                     <?php endforeach; ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<?= $this->endSection(); ?>