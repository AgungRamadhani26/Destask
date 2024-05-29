<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Menu Kinerja Karyawan</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="row">
                  <div class="col-lg-3 mt-3">
                     <ul class="nav nav-tabs">
                        <li class="nav-item">
                           <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#kinerja-supervisi">Supervisi</button>
                        </li>
                        <li class="nav-item">
                           <button class="nav-link" data-bs-toggle="tab" data-bs-target="#kinerja-staff">Staff</button>
                        </li>
                     </ul>
                  </div>
                  <div class="col-lg-6 mt-3">
                     <form action="/kinerja/filter_kinerja_karyawan" method="GET" id=filter_kinerja_karyawan>
                        <div class="row">
                           <div class="col-lg-7">
                              <div class="input-group">
                                 <label class="input-group-text" for="">Usergroup</label>
                                 <select class="form-select" id="filter_kinerja_karyawan_usergroup" name="filter_kinerja_karyawan_usergroup">
                                    <option value="">Semua Usergroup</option>
                                    <?php foreach ($usergroup as $urg) : ?>
                                       <option value="<?= $urg['id_usergroup'] ?>" <?= ($urg['id_usergroup'] == $filter_kinerja_karyawan_usergroup) ? 'selected' : '' ?>><?= $urg['nama_usergroup'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-5">
                              <button type="submit" class="btn btn-primary">
                                 <i class="bi bi-filter"></i> Filter
                              </button>
                              <button type="button" class="btn btn-secondary" onclick="resetFilterKinerja()">
                                 <i class="bx bx-reset"></i> Reset
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="col-lg-3 mt-3">
                     <div class="input-group">
                        <div class="input-group-append">
                           <span class="input-group-text" id="search-pengguna">
                              <i class="bi bi-search"></i>
                           </span>
                        </div>
                        <input type="text" class="form-control form-control-sm" id="searchInput_pengguna" placeholder="Search...">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="tab-content">
      <div class="tab-pane fade show active" id="kinerja-supervisi">
         <div class="row" id="supervisi-container">
            <?php foreach ($user_supervisi as $ursp) : ?>
               <div class="col-lg-6">
                  <div class="card">
                     <div class="card-body mt-3 pt-1 me-3">
                        <div class="row">
                           <div class="col-3">
                              <img src="/assets/file_pengguna/foto_user/<?= $ursp['foto_profil'] ?>" height="125px" class="d-block w-100" style="border-radius: 8px;" alt="...">
                              <center>
                                 <strong><?= $ursp['user_level'] ?></strong>
                              </center>
                           </div>
                           <div class="col-9">
                              <div class="row">
                                 <div class="col-12" style="background-color: #e9ecef; border-radius: 8px;">
                                    <table class="table">
                                       <tr style="border-bottom: 2px solid black;">
                                          <td style="background-color: #e9ecef;"><span class="fw-bold">Nama</span></td>
                                          <td style="background-color: #e9ecef;">:</td>
                                          <td style="background-color: #e9ecef;" class="nama-karyawan"><?= $ursp['nama'] ?></td>
                                       </tr>
                                       <tr style="border-bottom: 2px solid black;">
                                          <td style="background-color: #e9ecef;"><span class="fw-bold">Usergroup</span></td>
                                          <td style="background-color: #e9ecef;">:</td>
                                          <td style="background-color: #e9ecef;">
                                             <?php foreach ($usergroup as $ug) : ?>
                                                <?= $ursp['id_usergroup'] == $ug['id_usergroup'] ? $ug['nama_usergroup'] : ''; ?>
                                             <?php endforeach; ?>
                                          </td>
                                       </tr>
                                    </table>
                                 </div>
                              </div>
                              <div class="row mt-2">
                                 <div class="col-12 d-grid">
                                    <a href="/kinerja/daftar_kinerja_karyawan/<?= $ursp['id_user'] ?>" class="btn btn-primary"><i class="bi bi-bar-chart-steps"></i> Lihat daftar Kinerja</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            <?php endforeach; ?>
         </div>
      </div>

      <div class="tab-pane fade show" id="kinerja-staff">
         <div class="row" id="staff-container">
            <?php foreach ($user_staff as $urs) : ?>
               <div class="col-lg-6">
                  <div class="card">
                     <div class="card-body mt-3 pt-1 me-3">
                        <div class="row">
                           <div class="col-3">
                              <img src="/assets/file_pengguna/foto_user/<?= $urs['foto_profil'] ?>" height="125px" class="d-block w-100" style="border-radius: 8px;" alt="...">
                              <center>
                                 <strong><?= $urs['user_level'] ?></strong>
                              </center>
                           </div>
                           <div class="col-9">
                              <div class="row">
                                 <div class="col-12" style="background-color: #e9ecef; border-radius: 8px;">
                                    <table class="table">
                                       <tr style="border-bottom: 2px solid black;">
                                          <td style="background-color: #e9ecef;"><span class="fw-bold">Nama</span></td>
                                          <td style="background-color: #e9ecef;">:</td>
                                          <td style="background-color: #e9ecef;" class="nama-karyawan"><?= $urs['nama'] ?></td>
                                       </tr>
                                       <tr style="border-bottom: 2px solid black;">
                                          <td style="background-color: #e9ecef;"><span class="fw-bold">Usergroup</span></td>
                                          <td style="background-color: #e9ecef;">:</td>
                                          <td style="background-color: #e9ecef;">
                                             <?php foreach ($usergroup as $ug) : ?>
                                                <?= $urs['id_usergroup'] == $ug['id_usergroup'] ? $ug['nama_usergroup'] : ''; ?>
                                             <?php endforeach; ?>
                                          </td>
                                       </tr>
                                    </table>
                                 </div>
                              </div>
                              <div class="row mt-2">
                                 <div class="col-12 d-grid">
                                    <a href="/kinerja/daftar_kinerja_karyawan/<?= $urs['id_user'] ?>" class="btn btn-primary"><i class="bi bi-bar-chart-steps"></i> Lihat daftar Kinerja</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            <?php endforeach; ?>
         </div>
      </div>
   </div>
</section>

<script>
   document.getElementById('searchInput_pengguna').addEventListener('keyup', function() {
      let filter = this.value.toLowerCase();
      let supervisiContainer = document.getElementById('supervisi-container');
      let staffContainer = document.getElementById('staff-container');

      filterCards(supervisiContainer, filter);
      filterCards(staffContainer, filter);
   });

   function filterCards(container, filter) {
      let cards = container.getElementsByClassName('col-lg-6');
      for (let i = 0; i < cards.length; i++) {
         let card = cards[i];
         let name = card.querySelector('.nama-karyawan').textContent.toLowerCase();
         if (name.includes(filter)) {
            card.style.display = "";
         } else {
            card.style.display = "none";
         }
      }
   }
</script>

<?= $this->endSection(); ?>