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
                                 <select class="form-control" name="desainer_1" id="desainer_1">
                                    <option value="">-- Pilih Desainer --</option>
                                    <?php foreach ($user_desainer as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('desainer_1')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 desainer" style="display: <?= old('desainer_2') ? 'block' : 'none' ?>;">
                                 <label for="desainer_2" class="form-label" style="font-weight: 600;">Desainer 2</label>
                                 <select class="form-control" name="desainer_2" id="desainer_2">
                                    <option value="">-- Pilih Desainer --</option>
                                    <?php foreach ($user_desainer as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('desainer_2')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 desainer" style="display: <?= old('desainer_3') ? 'block' : 'none' ?>;">
                                 <label for="desainer_3" class="form-label" style="font-weight: 600;">Desainer 3</label>
                                 <select class="form-control" name="desainer_3" id="desainer_3">
                                    <option value="">-- Pilih Desainer --</option>
                                    <?php foreach ($user_desainer as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('desainer_3')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 desainer" style="display: <?= old('desainer_4') ? 'block' : 'none' ?>;">
                                 <label for="desainer_4" class="form-label" style="font-weight: 600;">Desainer 4</label>
                                 <select class="form-control" name="desainer_4" id="desainer_4">
                                    <option value="">-- Pilih Desainer --</option>
                                    <?php foreach ($user_desainer as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('desainer_4')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 desainer" style="display: <?= old('desainer_5') ? 'block' : 'none' ?>;">
                                 <label for="desainer_5" class="form-label" style="font-weight: 600;">Desainer 5</label>
                                 <select class="form-control" name="desainer_5" id="desainer_5">
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
                                 <select class="form-control" name="backend_web_1" id="backend_web_1">
                                    <option value="">-- Pilih Backend Web --</option>
                                    <?php foreach ($user_web as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('backend_web_1')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 backend-web" style="display: <?= old('backend_web_2') ? 'block' : 'none' ?>;">
                                 <label for="backend_web_2" class="form-label" style="font-weight: 600;">Backend Web 2</label>
                                 <select class="form-control" name="backend_web_2" id="backend_web_2">
                                    <option value="">-- Pilih Backend Web --</option>
                                    <?php foreach ($user_web as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('backend_web_2')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 backend-web" style="display: <?= old('backend_web_3') ? 'block' : 'none' ?>;">
                                 <label for="backend_web_3" class="form-label" style="font-weight: 600;">Backend Web 3</label>
                                 <select class="form-control" name="backend_web_3" id="backend_web_3">
                                    <option value="">-- Pilih Backend Web --</option>
                                    <?php foreach ($user_web as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('backend_web_3')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 backend-web" style="display: <?= old('backend_web_4') ? 'block' : 'none' ?>;">
                                 <label for="backend_web_4" class="form-label" style="font-weight: 600;">Backend Web 4</label>
                                 <select class="form-control" name="backend_web_4" id="backend_web_4">
                                    <option value="">-- Pilih Backend Web --</option>
                                    <?php foreach ($user_web as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('backend_web_4')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 backend-web" style="display: <?= old('backend_web_5') ? 'block' : 'none' ?>;">
                                 <label for="backend_web_5" class="form-label" style="font-weight: 600;">Backend Web 5</label>
                                 <select class="form-control" name="backend_web_5" id="backend_web_5">
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
                                 <select class="form-control" name="frontend_web_1" id="frontend_web_1">
                                    <option value="">-- Pilih Frontend Web --</option>
                                    <?php foreach ($user_web as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('frontend_web_1')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 frontend-web" style="display: <?= old('frontend_web_2') ? 'block' : 'none' ?>;">
                                 <label for="frontend_web_2" class="form-label" style="font-weight: 600;">Frontend Web 2</label>
                                 <select class="form-control" name="frontend_web_2" id="frontend_web_2">
                                    <option value="">-- Pilih Frontend Web --</option>
                                    <?php foreach ($user_web as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('frontend_web_2')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 frontend-web" style="display: <?= old('frontend_web_3') ? 'block' : 'none' ?>;">
                                 <label for="frontend_web_3" class="form-label" style="font-weight: 600;">Frontend Web 3</label>
                                 <select class="form-control" name="frontend_web_3" id="frontend_web_3">
                                    <option value="">-- Pilih Frontend Web --</option>
                                    <?php foreach ($user_web as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('frontend_web_3')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 frontend-web" style="display: <?= old('frontend_web_4') ? 'block' : 'none' ?>;">
                                 <label for="frontend_web_4" class="form-label" style="font-weight: 600;">Frontend Web 4</label>
                                 <select class="form-control" name="frontend_web_4" id="frontend_web_4">
                                    <option value="">-- Pilih Frontend Web --</option>
                                    <?php foreach ($user_web as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('frontend_web_4')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 frontend-web" style="display: <?= old('frontend_web_5') ? 'block' : 'none' ?>;">
                                 <label for="frontend_web_5" class="form-label" style="font-weight: 600;">Frontend Web 5</label>
                                 <select class="form-control" name="frontend_web_5" id="frontend_web_5">
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
                                 <select class="form-control" name="backend_mobile_1" id="backend_mobile_1">
                                    <option value="">-- Pilih Backend Mobile --</option>
                                    <?php foreach ($user_mobile as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('backend_mobile_1')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 backend-mobile" style="display: <?= old('backend_mobile_2') ? 'block' : 'none' ?>;">
                                 <label for="backend_mobile_2" class="form-label" style="font-weight: 600;">Backend Mobile 2</label>
                                 <select class="form-control" name="backend_mobile_2" id="backend_mobile_2">
                                    <option value="">-- Pilih Backend Mobile --</option>
                                    <?php foreach ($user_mobile as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('backend_mobile_2')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 backend-mobile" style="display: <?= old('backend_mobile_3') ? 'block' : 'none' ?>;">
                                 <label for="backend_mobile_3" class="form-label" style="font-weight: 600;">Backend Mobile 3</label>
                                 <select class="form-control" name="backend_mobile_3" id="backend_mobile_3">
                                    <option value="">-- Pilih Backend Mobile --</option>
                                    <?php foreach ($user_mobile as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('backend_mobile_3')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 backend-mobile" style="display: <?= old('backend_mobile_4') ? 'block' : 'none' ?>;">
                                 <label for="backend_mobile_4" class="form-label" style="font-weight: 600;">Backend Mobile 4</label>
                                 <select class="form-control" name="backend_mobile_4" id="backend_mobile_4">
                                    <option value="">-- Pilih Backend Mobile --</option>
                                    <?php foreach ($user_mobile as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('backend_mobile_4')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 backend-mobile" style="display: <?= old('backend_mobile_5') ? 'block' : 'none' ?>;">
                                 <label for="backend_mobile_5" class="form-label" style="font-weight: 600;">Backend Mobile 5</label>
                                 <select class="form-control" name="backend_mobile_5" id="backend_mobile_5">
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
                                 <select class="form-control" name="frontend_mobile_1" id="frontend_mobile_1">
                                    <option value="">-- Pilih Frontend Mobile --</option>
                                    <?php foreach ($user_mobile as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('frontend_mobile_1')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 frontend-mobile" style="display: <?= old('frontend_mobile_2') ? 'block' : 'none' ?>;">
                                 <label for="frontend_mobile_2" class="form-label" style="font-weight: 600;">Frontend Mobile 2</label>
                                 <select class="form-control" name="frontend_mobile_2" id="frontend_mobile_2">
                                    <option value="">-- Pilih Frontend Mobile --</option>
                                    <?php foreach ($user_mobile as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('frontend_mobile_2')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 frontend-mobile" style="display: <?= old('frontend_mobile_3') ? 'block' : 'none' ?>;">
                                 <label for="frontend_mobile_3" class="form-label" style="font-weight: 600;">Frontend Mobile 3</label>
                                 <select class="form-control" name="frontend_mobile_3" id="frontend_mobile_3">
                                    <option value="">-- Pilih Frontend Mobile --</option>
                                    <?php foreach ($user_mobile as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('frontend_mobile_3')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 frontend-mobile" style="display: <?= old('frontend_mobile_4') ? 'block' : 'none' ?>;">
                                 <label for="frontend_mobile_4" class="form-label" style="font-weight: 600;">Frontend Mobile 4</label>
                                 <select class="form-control" name="frontend_mobile_4" id="frontend_mobile_4">
                                    <option value="">-- Pilih Frontend Mobile --</option>
                                    <?php foreach ($user_mobile as $usr) : ?>
                                       <option value="<?= $usr['id_user'] ?>" <?= ($usr['id_user'] == old('frontend_mobile_4')) ? 'selected' : '' ?>><?= $usr['nama'] ?></option>
                                    <?php endforeach; ?>
                                 </select>
                              </div>
                              <div class="col-md-12 mt-3 frontend-mobile" style="display: <?= old('frontend_mobile_5') ? 'block' : 'none' ?>;">
                                 <label for="frontend_mobile_5" class="form-label" style="font-weight: 600;">Frontend Mobile 5</label>
                                 <select class="form-control" name="frontend_mobile_5" id="frontend_mobile_5">
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