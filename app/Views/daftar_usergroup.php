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
                     <button type="button" class="btn btn-success" title="Klik untuk menambah data usergroup">
                        <i class="ri-add-fill"></i>
                     </button>
                  </h5>
                  <table class="table table-striped datatable">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Nama</th>
                           <th>Keterangan</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1</td>
                           <td>Mobile</td>
                           <td>Tim mobile memiliki tugas dalam pengembangan aplikasi berbasis mobile</td>
                           <td>
                              <button type="button" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>Mobile Design</td>
                           <td>Tim Mobile Design memiliki tugas dalam pengembangan desain aplikasi berbasis mobile</td>
                           <td>
                              <button type="button" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>3</td>
                           <td>Web</td>
                           <td>Tim Web memiliki tugas dalam pengembangan aplikasi berbasis website</td>
                           <td>
                              <button type="button" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>4</td>
                           <td>Web Design</td>
                           <td>Tim Web Design memiliki tugas dalam pengembangan desain aplikasi berbasis website</td>
                           <td>
                              <button type="button" class="btn btn-info" title="Klik untuk melihat detail"><i class="ri-information-line"></i></button>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<?= $this->endSection(); ?>