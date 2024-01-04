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
                     <button type="button" class="btn btn-success" title="Klik untuk menambah data kategori Task">
                        <i class="ri-add-fill"></i>
                     </button>
                  </h5>
                  <table class="table table-striped datatable">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Kategori Task</th>
                           <th>Keterangan</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1</td>
                           <td>Support</td>
                           <td>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis</td>
                           <td>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>Analisa</td>
                           <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum laborum</td>
                           <td>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>3</td>
                           <td>Coding</td>
                           <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere ipsam</td>
                           <td>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>4</td>
                           <td>Testing</td>
                           <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere ipsam</td>
                           <td>
                              <button type="button" class="btn btn-warning" title="Klik untuk mengedit"><i class="ri-edit-2-line"></i></button>
                              <button type="button" class="btn btn-danger" title="Klik untuk menghapus"><i class="ri-delete-bin-5-line"></i></button>
                           </td>
                        </tr>
                        <tr>
                           <td>5</td>
                           <td>Dokumentasi</td>
                           <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere ipsam</td>
                           <td>
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