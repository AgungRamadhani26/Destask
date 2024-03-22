<?= $this->extend('layout/templete'); ?>
<?= $this->section('content'); ?>

<div class="pagetitle">
   <h1>Form Tambah Pekerjaan</h1>
</div>

<section class="section">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <form action="/pekerjaan/tambah_pekerjaan" method="POST">
                  <h5 class="card-title">Data Pekerjaan</h5>
                  <hr style="border-top: 3px solid black;">
                  <div class="row g-3">
                     <?= csrf_field(); ?>
                     <div class="col-md-4 mb-3">
                        <label for="nama_pekerjaan" class="form-label" style="font-weight: 600;">Nama Pekerjaan<span style="color: red;">*</span></label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_nama_pekerjaan')) ? 'is-invalid' : ''; ?>" name="nama_pekerjaan" id="nama_pekerjaan" autofocus value="<?= old('nama_pekerjaan'); ?>">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_nama_pekerjaan') ?>
                        </div>
                     </div>
                     <div class=" col-md-4 mb-3">
                        <label for="pelanggan" class="form-label" style="font-weight: 600;">Pelanggan<span style="color: red;">*</span></label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_pelanggan')) ? 'is-invalid' : ''; ?>" name="pelanggan" id="pelanggan" value="<?= old('pelanggan'); ?>">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_pelanggan') ?>
                        </div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="nominal_harga" class="form-label" style="font-weight: 600;">Nominal Harga (Rp)<span style="color: red;">*</span></label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_nominal_harga')) ? 'is-invalid' : ''; ?>" name="nominal_harga" id="nominal_harga" value="<?= old('nominal_harga'); ?>">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_nominal_harga') ?>
                        </div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="jenis_layanan" class="form-label" style="font-weight: 600;">Jenis Layanan<span style="color: red;">*</span></label>
                        <select class="form-control <?= (session()->getFlashdata('err_jenis_layanan')) ? 'is-invalid' : ''; ?>" name="jenis_layanan" id="jenis_layanan">
                           <option value="">-- Pilih Jenis Layanan --</option>
                           <option value="desain" <?= (old('jenis_layanan') == 'desain') ? 'selected' : ''; ?>>Desain</option>
                           <option value="produk" <?= (old('jenis_layanan') == 'produk') ? 'selected' : ''; ?>>Produk</option>
                           <option value="aplikasi internal" <?= (old('jenis_layanan') == 'aplikasi internal') ? 'selected' : ''; ?>>Aplikasi Internal</option>
                           <option value="boutique" <?= (old('jenis_layanan') == 'boutique') ? 'selected' : ''; ?>>Boutique</option>
                           <option value="sisamson" <?= (old('jenis_layanan') == 'sisamson') ? 'selected' : ''; ?>>Sisamson</option>
                        </select>
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_jenis_layanan') ?>
                        </div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="status_pekerjaan" class="form-label" style="font-weight: 600;">Status Pekerjaan<span style="color: red;">*</span></label>
                        <select class="form-control <?= (session()->getFlashdata('err_status_pekerjaan')) ? 'is-invalid' : ''; ?>" name="status_pekerjaan" id="status_pekerjaan">
                           <option value="">-- Pilih Status Pekerjaan --</option>
                           <?php foreach ($status_pekerjaan as $sp) : ?>
                              <option value="<?= $sp['id_status_pekerjaan'] ?>" <?= ($sp['id_status_pekerjaan'] == old('status_pekerjaan')) ? 'selected' : '' ?>><?= $sp['nama_status_pekerjaan'] ?></option>
                           <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_status_pekerjaan') ?>
                        </div>
                     </div>
                     <div class="col-md-4 mb-3">
                        <label for="kategori_pekerjaan" class="form-label" style="font-weight: 600;">Kategori Pekerjaan<span style="color: red;">*</span></label>
                        <select class="form-control <?= (session()->getFlashdata('err_kategori_pekerjaan')) ? 'is-invalid' : ''; ?>" name="kategori_pekerjaan" id="kategori_pekerjaan">
                           <option value="">-- Pilih Kategori Pekerjaan --</option>
                           <?php foreach ($kategori_pekerjaan as $kp) : ?>
                              <option value="<?= $kp['id_kategori_pekerjaan'] ?>" <?= ($kp['id_kategori_pekerjaan'] == old('kategori_pekerjaan')) ? 'selected' : '' ?>><?= $kp['nama_kategori_pekerjaan'] ?></option>
                           <?php endforeach; ?>
                        </select>
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_kategori_pekerjaan') ?>
                        </div>
                     </div>
                     <div class="col-md-4 mb-4">
                        <label for="target_waktu_selesai" class="form-label" style="font-weight: 600;">Target Waktu Selesai<span style="color: red;">*</span></label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_target_waktu_selesai')) ? 'is-invalid' : ''; ?>" name="target_waktu_selesai" id="target_waktu_selesai" placeholder="dd-mm-yyyy" value="<?= old('target_waktu_selesai'); ?>">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_target_waktu_selesai') ?>
                        </div>
                     </div>
                     <div class="col-md-4 mb-4">
                        <label for="deskripsi_pekerjaan" class="form-label" style="font-weight: 600;">Deskripsi Pekerjaan<span style="color: red;">*</span></label>
                        <textarea class="form-control <?= (session()->getFlashdata('err_deskripsi_pekerjaan')) ? 'is-invalid' : ''; ?>" rows="1" name="deskripsi_pekerjaan" id="deskripsi_pekerjaan"><?= old('deskripsi_pekerjaan'); ?></textarea>
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_deskripsi_pekerjaan') ?>
                        </div>
                     </div>
                     <div class="col-md-4 mb-4">
                        <label for="persentase_selesai" class="form-label" style="font-weight: 600;">Persentase Selesai (%)<span style="color: red;">*</span></label>
                        <input type="text" class="form-control <?= (session()->getFlashdata('err_persentase_selesai')) ? 'is-invalid' : ''; ?>" name="persentase_selesai" id="persentase_selesai" value="<?= old('persentase_selesai'); ?>">
                        <div class="invalid-feedback">
                           <?= session()->getFlashdata('err_persentase_selesai') ?>
                        </div>
                     </div>
                  </div>
                  <hr style="border-top: 3px solid black;">
                  <h5 class="card-title mt-4">Data Personil</h5>
                  <hr style="border-top: 3px solid black;">
                  <div class="row g-3">
                     <div class="col-md-4">
                        <div class="card">
                           <div class="card-body">
                              <div class="col-md-12 mt-3">
                                 <label for="project_manager" class="form-label" style="font-weight: 600;">Project Manager<span style="color: red;">*</span></label>
                                 <select class="form-control <?= (session()->getFlashdata('err_project_manager')) ? 'is-invalid' : ''; ?>" name="project_manager" id="project_manager">
                                    <option value="">-- Pilih Project Manager --</option>
                                    <?php foreach ($user as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('project_manager')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                                 <div class="invalid-feedback">
                                    <?= session()->getFlashdata('err_project_manager') ?>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card">
                           <div class="card-body">
                              <div class="col-md-12 mt-3">
                                 <div class="row">
                                    <div class="col-6">
                                       <i type="button" class="bi bi-plus-square" onclick="tambahKolomDesainer()"> Tambah Kolom</i>
                                    </div>
                                    <div class="col-6">
                                       <i type="button" class="bi bi-dash-square" onclick="hapusKolomDesainer()"> Hapus Kolom</i>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12 mt-3 desainer">
                                 <label for="desainer_1" class="form-label" style="font-weight: 600;">Desainer 1</label>
                                 <select class="form-control" name="desainer_1" id="desainer_1" onchange="checkUniqueSelectionDesainer('desainer_1')">
                                    <option value="">-- Pilih Desainer --</option>
                                    <?php foreach ($user_desainer as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('desainer_1')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 desainer" style="display: <?= old('desainer_2') ? 'block' : 'none' ?>;">
                                 <label for="desainer_2" class="form-label" style="font-weight: 600;">Desainer 2</label>
                                 <select class="form-control" name="desainer_2" id="desainer_2" onchange="checkUniqueSelectionDesainer('desainer_2')">
                                    <option value="">-- Pilih Desainer --</option>
                                    <?php foreach ($user_desainer as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('desainer_2')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 desainer" style="display: <?= old('desainer_3') ? 'block' : 'none' ?>;">
                                 <label for="desainer_3" class="form-label" style="font-weight: 600;">Desainer 3</label>
                                 <select class="form-control" name="desainer_3" id="desainer_3" onchange="checkUniqueSelectionDesainer('desainer_3')">
                                    <option value="">-- Pilih Desainer --</option>
                                    <?php foreach ($user_desainer as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('desainer_3')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 desainer" style="display: <?= old('desainer_4') ? 'block' : 'none' ?>;">
                                 <label for="desainer_4" class="form-label" style="font-weight: 600;">Desainer 4</label>
                                 <select class="form-control" name="desainer_4" id="desainer_4" onchange="checkUniqueSelectionDesainer('desainer_4')">
                                    <option value="">-- Pilih Desainer --</option>
                                    <?php foreach ($user_desainer as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('desainer_4')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 desainer" style="display: <?= old('desainer_5') ? 'block' : 'none' ?>;">
                                 <label for="desainer_5" class="form-label" style="font-weight: 600;">Desainer 5</label>
                                 <select class="form-control" name="desainer_5" id="desainer_5" onchange="checkUniqueSelectionDesainer('desainer_5')">
                                    <option value="">-- Pilih Desainer --</option>
                                    <?php foreach ($user_desainer as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('desainer_5')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card">
                           <div class="card-body">
                              <div class="col-md-12 mt-3">
                                 <div class="row">
                                    <div class="col-6">
                                       <i type="button" class="bi bi-plus-square" onclick="tambahKolomBEWeb()"> Tambah Kolom</i>
                                    </div>
                                    <div class="col-6">
                                       <i type="button" class="bi bi-dash-square" onclick="hapusKolomBEWeb()"> Hapus Kolom</i>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12 mt-3 backend-web">
                                 <label for="backend_web_1" class="form-label" style="font-weight: 600;">Backend Web 1</label>
                                 <select class="form-control" name="backend_web_1" id="backend_web_1" onchange="checkUniqueSelectionBeWeb('backend_web_1')">
                                    <option value="">-- Pilih Backend Web --</option>
                                    <?php foreach ($user_web as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('backend_web_1')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 backend-web" style="display: <?= old('backend_web_2') ? 'block' : 'none' ?>;">
                                 <label for="backend_web_2" class="form-label" style="font-weight: 600;">Backend Web 2</label>
                                 <select class="form-control" name="backend_web_2" id="backend_web_2" onchange="checkUniqueSelectionBeWeb('backend_web_2')">
                                    <option value="">-- Pilih Backend Web --</option>
                                    <?php foreach ($user_web as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('backend_web_2')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 backend-web" style="display: <?= old('backend_web_3') ? 'block' : 'none' ?>;">
                                 <label for="backend_web_3" class="form-label" style="font-weight: 600;">Backend Web 3</label>
                                 <select class="form-control" name="backend_web_3" id="backend_web_3" onchange="checkUniqueSelectionBeWeb('backend_web_3')">
                                    <option value="">-- Pilih Backend Web --</option>
                                    <?php foreach ($user_web as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('backend_web_3')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 backend-web" style="display: <?= old('backend_web_4') ? 'block' : 'none' ?>;">
                                 <label for="backend_web_4" class="form-label" style="font-weight: 600;">Backend Web 4</label>
                                 <select class="form-control" name="backend_web_4" id="backend_web_4" onchange="checkUniqueSelectionBeWeb('backend_web_4')">
                                    <option value="">-- Pilih Backend Web --</option>
                                    <?php foreach ($user_web as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('backend_web_4')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 backend-web" style="display: <?= old('backend_web_5') ? 'block' : 'none' ?>;">
                                 <label for="backend_web_5" class="form-label" style="font-weight: 600;">Backend Web 5</label>
                                 <select class="form-control" name="backend_web_5" id="backend_web_5" onchange="checkUniqueSelectionBeWeb('backend_web_5')">
                                    <option value="">-- Pilih Backend Web --</option>
                                    <?php foreach ($user_web as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('backend_web_5')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card">
                           <div class="card-body">
                              <div class="col-md-12 mt-3">
                                 <div class="row">
                                    <div class="col-6">
                                       <i type="button" class="bi bi-plus-square" onclick="tambahKolomFEWeb()"> Tambah Kolom</i>
                                    </div>
                                    <div class="col-6">
                                       <i type="button" class="bi bi-dash-square" onclick="hapusKolomFEWeb()"> Hapus Kolom</i>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12 mt-3 frontend-web">
                                 <label for="frontend_web_1" class="form-label" style="font-weight: 600;">Frontend Web 1</label>
                                 <select class="form-control" name="frontend_web_1" id="frontend_web_1" onchange="checkUniqueSelectionFeWeb('frontend_web_1')">
                                    <option value="">-- Pilih Frontend Web --</option>
                                    <?php foreach ($user_web as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('frontend_web_1')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 frontend-web" style="display: <?= old('frontend_web_2') ? 'block' : 'none' ?>;">
                                 <label for="frontend_web_2" class="form-label" style="font-weight: 600;">Frontend Web 2</label>
                                 <select class="form-control" name="frontend_web_2" id="frontend_web_2" onchange="checkUniqueSelectionFeWeb('frontend_web_2')">
                                    <option value="">-- Pilih Frontend Web --</option>
                                    <?php foreach ($user_web as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('frontend_web_2')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 frontend-web" style="display: <?= old('frontend_web_3') ? 'block' : 'none' ?>;">
                                 <label for="frontend_web_3" class="form-label" style="font-weight: 600;">Frontend Web 3</label>
                                 <select class="form-control" name="frontend_web_3" id="frontend_web_3" onchange="checkUniqueSelectionFeWeb('frontend_web_3')">
                                    <option value="">-- Pilih Frontend Web --</option>
                                    <?php foreach ($user_web as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('frontend_web_3')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 frontend-web" style="display: <?= old('frontend_web_4') ? 'block' : 'none' ?>;">
                                 <label for="frontend_web_4" class="form-label" style="font-weight: 600;">Frontend Web 4</label>
                                 <select class="form-control" name="frontend_web_4" id="frontend_web_4" onchange="checkUniqueSelectionFeWeb('frontend_web_4')">
                                    <option value="">-- Pilih Frontend Web --</option>
                                    <?php foreach ($user_web as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('frontend_web_4')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 frontend-web" style="display: <?= old('frontend_web_5') ? 'block' : 'none' ?>;">
                                 <label for="frontend_web_5" class="form-label" style="font-weight: 600;">Frontend Web 5</label>
                                 <select class="form-control" name="frontend_web_5" id="frontend_web_5" onchange="checkUniqueSelectionFeWeb('frontend_web_5')">
                                    <option value="">-- Pilih Frontend Web --</option>
                                    <?php foreach ($user_web as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('frontend_web_5')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card">
                           <div class="card-body">
                              <div class="mt-3">
                                 <div class="row">
                                    <div class="col-6">
                                       <i type="button" class="bi bi-plus-square" onclick="tambahKolomBEMobile()"> Tambah Kolom</i>
                                    </div>
                                    <div class="col-6">
                                       <i type="button" class="bi bi-dash-square" onclick="hapusKolomBEMobile()"> Hapus Kolom</i>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12 mt-3 backend-mobile">
                                 <label for="backend_mobile_1" class="form-label" style="font-weight: 600;">Backend Mobile 1</label>
                                 <select class="form-control" name="backend_mobile_1" id="backend_mobile_1" onchange="checkUniqueSelectionBeMobile('backend_mobile_1')">
                                    <option value="">-- Pilih Backend Mobile --</option>
                                    <?php foreach ($user_mobile as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('backend_mobile_1')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 backend-mobile" style="display: <?= old('backend_mobile_2') ? 'block' : 'none' ?>;">
                                 <label for="backend_mobile_2" class="form-label" style="font-weight: 600;">Backend Mobile 2</label>
                                 <select class="form-control" name="backend_mobile_2" id="backend_mobile_2" onchange="checkUniqueSelectionBeMobile('backend_mobile_2')">
                                    <option value="">-- Pilih Backend Mobile --</option>
                                    <?php foreach ($user_mobile as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('backend_mobile_2')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 backend-mobile" style="display: <?= old('backend_mobile_3') ? 'block' : 'none' ?>;">
                                 <label for="backend_mobile_3" class="form-label" style="font-weight: 600;">Backend Mobile 3</label>
                                 <select class="form-control" name="backend_mobile_3" id="backend_mobile_3" onchange="checkUniqueSelectionBeMobile('backend_mobile_3')">
                                    <option value="">-- Pilih Backend Mobile --</option>
                                    <?php foreach ($user_mobile as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('backend_mobile_3')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 backend-mobile" style="display: <?= old('backend_mobile_4') ? 'block' : 'none' ?>;">
                                 <label for="backend_mobile_4" class="form-label" style="font-weight: 600;">Backend Mobile 4</label>
                                 <select class="form-control" name="backend_mobile_4" id="backend_mobile_4" onchange="checkUniqueSelectionBeMobile('backend_mobile_4')">
                                    <option value="">-- Pilih Backend Mobile --</option>
                                    <?php foreach ($user_mobile as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('backend_mobile_4')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 backend-mobile" style="display: <?= old('backend_mobile_5') ? 'block' : 'none' ?>;">
                                 <label for="backend_mobile_5" class="form-label" style="font-weight: 600;">Backend Mobile 5</label>
                                 <select class="form-control" name="backend_mobile_5" id="backend_mobile_5" onchange="checkUniqueSelectionBeMobile('backend_mobile_5')">
                                    <option value="">-- Pilih Backend Mobile --</option>
                                    <?php foreach ($user_mobile as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('backend_mobile_5')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="card">
                           <div class="card-body">
                              <div class="mt-3">
                                 <div class="row">
                                    <div class="col-6">
                                       <i type="button" class="bi bi-plus-square" onclick="tambahKolomFEMobile()"> Tambah Kolom</i>
                                    </div>
                                    <div class="col-6">
                                       <i type="button" class="bi bi-dash-square" onclick="hapusKolomFEMobile()"> Hapus Kolom</i>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12 mt-3 frontend-mobile">
                                 <label for="frontend_mobile_1" class="form-label" style="font-weight: 600;">Frontend Mobile 1</label>
                                 <select class="form-control" name="frontend_mobile_1" id="frontend_mobile_1" onchange="checkUniqueSelectionFeMobile('frontend_mobile_1')">
                                    <option value="">-- Pilih Frontend Mobile --</option>
                                    <?php foreach ($user_mobile as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('frontend_mobile_1')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 frontend-mobile" style="display: <?= old('frontend_mobile_2') ? 'block' : 'none' ?>;">
                                 <label for="frontend_mobile_2" class="form-label" style="font-weight: 600;">Frontend Mobile 2</label>
                                 <select class="form-control" name="frontend_mobile_2" id="frontend_mobile_2" onchange="checkUniqueSelectionFeMobile('frontend_mobile_2')">
                                    <option value="">-- Pilih Frontend Mobile --</option>
                                    <?php foreach ($user_mobile as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('frontend_mobile_2')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 frontend-mobile" style="display: <?= old('frontend_mobile_3') ? 'block' : 'none' ?>;">
                                 <label for="frontend_mobile_3" class="form-label" style="font-weight: 600;">Frontend Mobile 3</label>
                                 <select class="form-control" name="frontend_mobile_3" id="frontend_mobile_3" onchange="checkUniqueSelectionFeMobile('frontend_mobile_3')">
                                    <option value="">-- Pilih Frontend Mobile --</option>
                                    <?php foreach ($user_mobile as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('frontend_mobile_3')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 frontend-mobile" style="display: <?= old('frontend_mobile_4') ? 'block' : 'none' ?>;">
                                 <label for="frontend_mobile_4" class="form-label" style="font-weight: 600;">Frontend Mobile 4</label>
                                 <select class="form-control" name="frontend_mobile_4" id="frontend_mobile_4" onchange="checkUniqueSelectionFeMobile('frontend_mobile_4')">
                                    <option value="">-- Pilih Frontend Mobile --</option>
                                    <?php foreach ($user_mobile as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('frontend_mobile_4')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 frontend-mobile" style="display: <?= old('frontend_mobile_5') ? 'block' : 'none' ?>;">
                                 <label for="frontend_mobile_5" class="form-label" style="font-weight: 600;">Frontend Mobile 5</label>
                                 <select class="form-control" name="frontend_mobile_5" id="frontend_mobile_5" onchange="checkUniqueSelectionFeMobile('frontend_mobile_5')">
                                    <option value="">-- Pilih Frontend Mobile --</option>
                                    <?php foreach ($user_mobile as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('frontend_mobile_5')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <hr style="border-top: 3px solid black;">
                  <div>
                     <p>Keterangan: <span style="color: red;">* Wajib diisi</span></p>
                  </div>
                  <div class="text-center">
                     <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>

<script>
   //        //
   //DESAINER//
   //        //
   //untuk menambah kolom desainer
   function tambahKolomDesainer() {
      var kolom = document.querySelectorAll('.desainer');
      var maxKolom = 5;
      // Cari kolom yang belum ditampilkan
      for (var i = 0; i < kolom.length; i++) {
         if (kolom[i].style.display === 'none') {
            kolom[i].style.display = 'block';
            return; // Hentikan setelah menampilkan satu kolom
         }
      }
      // Jika sudah mencapai batas maksimal, tampilkan pesan peringatan
      if (kolom.length >= maxKolom) {
         alert('Maksimal kolom Desainer yang ditampilkan adalah 5.');
      }
   }
   // Objek untuk menyimpan nilai-nilai kolom input desainer
   var desainer_values = {
      desainer_1: '<?= old('desainer_1') ? old('desainer_1') : '' ?>',
      desainer_2: '<?= old('desainer_2') ? old('desainer_2') : '' ?>',
      desainer_3: '<?= old('desainer_3') ? old('desainer_3') : '' ?>',
      desainer_4: '<?= old('desainer_4') ? old('desainer_4') : '' ?>',
      desainer_5: '<?= old('desainer_5') ? old('desainer_5') : '' ?>'
   };
   //Untuk menghapus kolom desainer
   function hapusKolomDesainer() {
      var kolom = document.querySelectorAll('.desainer');
      var kolomYangDitampilkan = [];
      for (var i = 0; i < kolom.length; i++) {
         if (kolom[i].style.display !== 'none') {
            kolomYangDitampilkan.push(kolom[i]);
         }
      }
      // Sembunyikan kolom terakhir yang ditampilkan
      var lastIndex = kolomYangDitampilkan.length - 1;
      if (lastIndex > 0) {
         // Menghapus nilai dari kolom yang disembunyikan
         var inputFields = kolomYangDitampilkan[lastIndex].querySelectorAll('select');
         inputFields.forEach(function(input) {
            var id = input.getAttribute('id'); // Dapatkan id input
            input.value = ''; // Kosongkan nilai input
            desainer_values[id] = ''; // Kosongkan nilai di objek
         });
         kolomYangDitampilkan[lastIndex].style.display = 'none';
      } else {
         alert('Minimal kolom Desainer yang ditampilkan adalah 1.')
      }
   }
   // Fungsi untuk memeriksa keunikan nilai dan mengatur nilai kembali jika tidak unik
   function checkUniqueSelectionDesainer(id) {
      var selectedValue_desainer = $('#' + id).val();
      if (selectedValue_desainer === '') {
         desainer_values[id] = selectedValue_desainer;
         return;
      }
      for (var key in desainer_values) {
         if (key !== id) {
            if (selectedValue_desainer === desainer_values[key]) {
               $('#' + id).val(desainer_values[id]);
               alert('Nilai yang dipilih harus unik di setiap kolom inputan desainer!');
               return;
            }
         }
      }
      desainer_values[id] = selectedValue_desainer;
   }


   //           //
   //BACKEND WEB//
   //           //
   //Untuk menambah kolom backend web
   function tambahKolomBEWeb() {
      var kolom = document.querySelectorAll('.backend-web');
      var maxKolom = 5;
      // Cari kolom yang belum ditampilkan
      for (var i = 0; i < kolom.length; i++) {
         if (kolom[i].style.display === 'none') {
            kolom[i].style.display = 'block';
            return; // Hentikan setelah menampilkan satu kolom
         }
      }
      // Jika sudah mencapai batas maksimal, tampilkan pesan peringatan
      if (kolom.length >= maxKolom) {
         alert('Maksimal kolom Backend Web yang ditampilkan adalah 5.');
      }
   }
   // Objek untuk menyimpan nilai-nilai kolom input backend web
   var backend_webValues = {
      backend_web_1: '<?= old('backend_web_1') ? old('backend_web_1') : '' ?>',
      backend_web_2: '<?= old('backend_web_2') ? old('backend_web_2') : '' ?>',
      backend_web_3: '<?= old('backend_web_3') ? old('backend_web_3') : '' ?>',
      backend_web_4: '<?= old('backend_web_4') ? old('backend_web_4') : '' ?>',
      backend_web_5: '<?= old('backend_web_5') ? old('backend_web_5') : '' ?>'
   };
   //Untuk menghapus kolom backend web
   function hapusKolomBEWeb() {
      var kolom = document.querySelectorAll('.backend-web');
      var kolomYangDitampilkan = [];
      for (var i = 0; i < kolom.length; i++) {
         if (kolom[i].style.display !== 'none') {
            kolomYangDitampilkan.push(kolom[i]);
         }
      }
      // Sembunyikan kolom terakhir yang ditampilkan
      var lastIndex = kolomYangDitampilkan.length - 1;
      if (lastIndex > 0) {
         // Menghapus nilai dari kolom yang disembunyikan
         var inputFields = kolomYangDitampilkan[lastIndex].querySelectorAll('select');
         inputFields.forEach(function(input) {
            var id = input.getAttribute('id'); // Dapatkan id input
            input.value = ''; // Kosongkan nilai input
            backend_webValues[id] = ''; // Kosongkan nilai di objek backend_webValues
         });
         kolomYangDitampilkan[lastIndex].style.display = 'none';
      } else {
         alert('Minimal kolom Backend Web yang ditampilkan adalah 1.')
      }
   }
   // Fungsi untuk memeriksa keunikan nilai dan mengatur nilai kembali jika tidak unik
   function checkUniqueSelectionBeWeb(id) {
      var selectedValue_web = $('#' + id).val(); // Dapatkan nilai yang dipilih
      // Jika nilai yang dipilih kosong, tidak perlu dilakukan pengecekan keunikan
      if (selectedValue_web === '') {
         backend_webValues[id] = selectedValue_web; // Update nilai di objek backendValues
         return;
      }
      // Loop melalui setiap kolom input backend web
      for (var key in backend_webValues) {
         // Jika id kolom input tidak sama dengan id yang sedang diproses
         if (key !== id) {
            // Jika nilai yang dipilih sama dengan nilai di kolom input lainnya
            if (selectedValue_web === backend_webValues[key]) {
               // Kembalikan nilai kolom input yang sedang diproses ke nilai sebelumnya
               $('#' + id).val(backend_webValues[id]);
               alert('Nilai yang dipilih harus unik di setiap kolom inputan backend web!');
               return;
            }
         }
      }
      // Jika nilai unik atau kosong, update nilai di objek backendValues
      backend_webValues[id] = selectedValue_web;
   }


   //            //
   //FRONTEND WEB//
   //            //
   //Untuk menambah kolom frontend web
   function tambahKolomFEWeb() {
      var kolom = document.querySelectorAll('.frontend-web');
      var maxKolom = 5;
      // Cari kolom yang belum ditampilkan
      for (var i = 0; i < kolom.length; i++) {
         if (kolom[i].style.display === 'none') {
            kolom[i].style.display = 'block';
            return; // Hentikan setelah menampilkan satu kolom
         }
      }
      // Jika sudah mencapai batas maksimal, tampilkan pesan peringatan
      if (kolom.length >= maxKolom) {
         alert('Maksimal kolom Frontend Web yang ditampilkan adalah 5.');
      }
   }
   // Objek untuk menyimpan nilai-nilai kolom input frontend web
   var frontend_webValues = {
      frontend_web_1: '<?= old('frontend_web_1') ? old('frontend_web_1') : '' ?>',
      frontend_web_2: '<?= old('frontend_web_2') ? old('frontend_web_2') : '' ?>',
      frontend_web_3: '<?= old('frontend_web_3') ? old('frontend_web_3') : '' ?>',
      frontend_web_4: '<?= old('frontend_web_4') ? old('frontend_web_4') : '' ?>',
      frontend_web_5: '<?= old('frontend_web_5') ? old('frontend_web_5') : '' ?>'
   };
   //Untuk menghapus kolom frontend web
   function hapusKolomFEWeb() {
      var kolom = document.querySelectorAll('.frontend-web');
      var kolomYangDitampilkan = [];
      for (var i = 0; i < kolom.length; i++) {
         if (kolom[i].style.display !== 'none') {
            kolomYangDitampilkan.push(kolom[i]);
         }
      }
      // Sembunyikan kolom terakhir yang ditampilkan
      var lastIndex = kolomYangDitampilkan.length - 1;
      if (lastIndex > 0) {
         // Menghapus nilai dari kolom yang disembunyikan
         var inputFields = kolomYangDitampilkan[lastIndex].querySelectorAll('select');
         inputFields.forEach(function(input) {
            var id = input.getAttribute('id');
            input.value = '';
            frontend_webValues[id] = ''; // Kosongkan nilai di objek frontend_webValues
         });
         kolomYangDitampilkan[lastIndex].style.display = 'none';
      } else {
         alert('Minimal kolom Frontend Web yang ditampilkan adalah 1.')
      }
   }
   // Fungsi untuk memeriksa keunikan nilai dan mengatur nilai kembali jika tidak unik
   function checkUniqueSelectionFeWeb(id) {
      var selectedValue_feweb = $('#' + id).val(); // Dapatkan nilai yang dipilih
      // Jika nilai yang dipilih kosong, tidak perlu dilakukan pengecekan keunikan
      if (selectedValue_feweb === '') {
         frontend_webValues[id] = selectedValue_feweb; // Update nilai di objek backendValues
         return;
      }
      // Loop melalui setiap kolom input backend web
      for (var key in frontend_webValues) {
         // Jika id kolom input tidak sama dengan id yang sedang diproses
         if (key !== id) {
            // Jika nilai yang dipilih sama dengan nilai di kolom input lainnya
            if (selectedValue_feweb === frontend_webValues[key]) {
               // Kembalikan nilai kolom input yang sedang diproses ke nilai sebelumnya
               $('#' + id).val(frontend_webValues[id]);
               alert('Nilai yang dipilih harus unik di setiap kolom inputan frontend web!');
               return;
            }
         }
      }
      // Jika nilai unik atau kosong, update nilai di objek backendValues
      frontend_webValues[id] = selectedValue_feweb;
   }


   //              //
   //BACKEND MOBILE//
   //              //
   //Untuk menambah kolom backend mobile
   function tambahKolomBEMobile() {
      var kolom = document.querySelectorAll('.backend-mobile');
      var maxKolom = 5;
      // Cari kolom yang belum ditampilkan
      for (var i = 0; i < kolom.length; i++) {
         if (kolom[i].style.display === 'none') {
            kolom[i].style.display = 'block';
            return; // Hentikan setelah menampilkan satu kolom
         }
      }
      // Jika sudah mencapai batas maksimal, tampilkan pesan peringatan
      if (kolom.length >= maxKolom) {
         alert('Maksimal kolom Backend Mobile yang ditampilkan adalah 5.');
      }
   }
   // Objek untuk menyimpan nilai-nilai kolom input backend mobile
   var backend_mobileValues = {
      backend_mobile_1: '<?= old('backend_mobile_1') ? old('backend_mobile_1') : '' ?>',
      backend_mobile_2: '<?= old('backend_mobile_2') ? old('backend_mobile_2') : '' ?>',
      backend_mobile_3: '<?= old('backend_mobile_3') ? old('backend_mobile_3') : '' ?>',
      backend_mobile_4: '<?= old('backend_mobile_4') ? old('backend_mobile_4') : '' ?>',
      backend_mobile_5: '<?= old('backend_mobile_5') ? old('backend_mobile_5') : '' ?>'
   };
   //Untuk menghapus kolom backend mobile
   function hapusKolomBEMobile() {
      var kolom = document.querySelectorAll('.backend-mobile');
      var kolomYangDitampilkan = [];
      for (var i = 0; i < kolom.length; i++) {
         if (kolom[i].style.display !== 'none') {
            kolomYangDitampilkan.push(kolom[i]);
         }
      }
      // Sembunyikan kolom terakhir yang ditampilkan
      var lastIndex = kolomYangDitampilkan.length - 1;
      if (lastIndex > 0) {
         // Menghapus nilai dari kolom yang disembunyikan
         var inputFields = kolomYangDitampilkan[lastIndex].querySelectorAll('select');
         inputFields.forEach(function(input) {
            var id = input.getAttribute('id');
            input.value = '';
            backend_mobileValues[id] = '';
         });
         kolomYangDitampilkan[lastIndex].style.display = 'none';
      } else {
         alert('Minimal kolom Backend Mobile yang ditampilkan adalah 1.')
      }
   }
   // Fungsi untuk memeriksa keunikan nilai dan mengatur nilai kembali jika tidak unik
   function checkUniqueSelectionBeMobile(id) {
      var selectedValue_bemobile = $('#' + id).val();
      if (selectedValue_bemobile === '') {
         backend_mobileValues[id] = selectedValue_bemobile;
         return;
      }
      for (var key in backend_mobileValues) {
         if (key !== id) {
            if (selectedValue_bemobile === backend_mobileValues[key]) {
               $('#' + id).val(backend_mobileValues[id]);
               alert('Nilai yang dipilih harus unik di setiap kolom inputan backend mobile!');
               return;
            }
         }
      }
      backend_mobileValues[id] = selectedValue_bemobile;
   }


   //               //
   //FRONTEND_MOBILE//
   //               //
   //Untuk menambah kolom frontend mobile
   function tambahKolomFEMobile() {
      var kolom = document.querySelectorAll('.frontend-mobile');
      var maxKolom = 5;
      // Cari kolom yang belum ditampilkan
      for (var i = 0; i < kolom.length; i++) {
         if (kolom[i].style.display === 'none') {
            kolom[i].style.display = 'block';
            return; // Hentikan setelah menampilkan satu kolom
         }
      }
      // Jika sudah mencapai batas maksimal, tampilkan pesan peringatan
      if (kolom.length >= maxKolom) {
         alert('Maksimal kolom Frontend Mobile yang ditampilkan adalah 5.');
      }
   }
   // Objek untuk menyimpan nilai-nilai kolom input frontend mobile
   var frontend_mobileValues = {
      frontend_mobile_1: '<?= old('frontend_mobile_1') ? old('frontend_mobile_1') : '' ?>',
      frontend_mobile_2: '<?= old('frontend_mobile_2') ? old('frontend_mobile_2') : '' ?>',
      frontend_mobile_3: '<?= old('frontend_mobile_3') ? old('frontend_mobile_3') : '' ?>',
      frontend_mobile_4: '<?= old('frontend_mobile_4') ? old('frontend_mobile_4') : '' ?>',
      frontend_mobile_5: '<?= old('frontend_mobile_5') ? old('frontend_mobile_5') : '' ?>'
   };
   //Untuk menghapus kolom frontend mobile
   function hapusKolomFEMobile() {
      var kolom = document.querySelectorAll('.frontend-mobile');
      var kolomYangDitampilkan = [];
      for (var i = 0; i < kolom.length; i++) {
         if (kolom[i].style.display !== 'none') {
            kolomYangDitampilkan.push(kolom[i]);
         }
      }
      // Sembunyikan kolom terakhir yang ditampilkan
      var lastIndex = kolomYangDitampilkan.length - 1;
      if (lastIndex > 0) {
         // Menghapus nilai dari kolom yang disembunyikan
         var inputFields = kolomYangDitampilkan[lastIndex].querySelectorAll('select');
         inputFields.forEach(function(input) {
            var id = input.getAttribute('id');
            input.value = '';
            frontend_mobileValues[id] = '';
         });
         kolomYangDitampilkan[lastIndex].style.display = 'none';
      } else {
         alert('Minimal kolom Frontend Mobile yang ditampilkan adalah 1.')
      }
   }
   // Fungsi untuk memeriksa keunikan nilai dan mengatur nilai kembali jika tidak unik
   function checkUniqueSelectionFeMobile(id) {
      var selectedValue_femobile = $('#' + id).val();
      if (selectedValue_femobile === '') {
         frontend_mobileValues[id] = selectedValue_femobile;
         return;
      }
      for (var key in frontend_mobileValues) {
         if (key !== id) {
            if (selectedValue_femobile === frontend_mobileValues[key]) {
               $('#' + id).val(frontend_mobileValues[id]);
               alert('Nilai yang dipilih harus unik di setiap kolom inputan frontend mobile!');
               return;
            }
         }
      }
      frontend_mobileValues[id] = selectedValue_femobile;
   }


   //            //
   //TARGET WAKTU//
   //            //
   config = {
      dateFormat: "Y-m-d",
      altInput: true,
      altFormat: "d-m-Y",
      locale: {
         "firstDayOfWeek": 1 // start week on Monday
      },
      minDate: "today",
      disable: [
         function(date) {
            // Disable weekends
            return (date.getDay() === 0 || date.getDay() === 6);
         },
         <?php foreach ($hari_libur as $libur) : ?> "<?= $libur['tanggal_libur'] ?>",
         <?php endforeach; ?>
      ]
   };
   flatpickr("#target_waktu_selesai", config);
</script>

<?= $this->endSection(); ?>