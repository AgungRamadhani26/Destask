//                                   //
// PENGELOLAAN DATA STATUS PEKERJAAN //
//                                   //

//Proses membersikan form add dan edit status pekerjaan jika mengclose modal
$('.tombol-tutup-statuspekerjaan').on('click', function() {
   $('.alert').hide();
   $('#nama_status_pekerjaan').val('');
   $('#deskripsi_status_pekerjaan').val('');
   $('#id_status_pekerjaan_e').val('');
   $('#nama_status_pekerjaan_e').val('');
   $('#deskripsi_status_pekerjaan_e').val('');
});

//Proses edit status pekerjaan
function edit_status_pekerjaan($id){
   $.ajax({
      url: "/status_pekerjaan/edit_status_pekerjaan/" + $id,
      type: "GET",
      success: function(hasil){
         var $obj = $.parseJSON(hasil);
         if ($obj.id_status_pekerjaan != ''){
            $('#id_status_pekerjaan_e').val($obj.id_status_pekerjaan);
            $('#nama_status_pekerjaan_e').val($obj.nama_status_pekerjaan);
            $('#deskripsi_status_pekerjaan_e').val($obj.deskripsi_status_pekerjaan);
         }
      }
   });
}



//                                     //
// PENGELOLAAN DATA KATEGORI PEKERJAAN //
//                                     //

//Proses membersikan form add dan edit kategori pekerjaan jika mengclose modal
$('.tombol-tutup-kategoripekerjaan').on('click', function() {
   $('.alert').hide();
   $('#nama_kategori_pekerjaan').val('');
   $('#deskripsi_kategori_pekerjaan').val('');
   $('#id_kategori_pekerjaan_e').val('');
   $('#nama_kategori_pekerjaan_e').val('');
   $('#deskripsi_kategori_pekerjaan_e').val('');
});

//Proses edit kategori pekerjaan
function edit_kategori_pekerjaan($id){
   $.ajax({
      url: "/kategori_pekerjaan/edit_kategori_pekerjaan/" + $id,
      type: "GET",
      success: function(hasil){
         var $obj = $.parseJSON(hasil);
         if ($obj.id_kategori_pekerjaan != ''){
            $('#id_kategori_pekerjaan_e').val($obj.id_kategori_pekerjaan);
            $('#nama_kategori_pekerjaan_e').val($obj.nama_kategori_pekerjaan);
            $('#deskripsi_kategori_pekerjaan_e').val($obj.deskripsi_kategori_pekerjaan);
         }
      }
   });
}



//                              //
// PENGELOLAAN DATA STATUS TASK //
//                              //

//Proses membersikan form add dan edit status task jika mengclose modal
$('.tombol-tutup-statustask').on('click', function() {
   $('.alert').hide();
   $('#nama_status_task').val('');
   $('#deskripsi_status_task').val('');
   $('#id_status_task_e').val('');
   $('#nama_status_task_e').val('');
   $('#deskripsi_status_task_e').val('');
});

//Proses edit status task
function edit_status_task($id){
   $.ajax({
      url: "/status_task/edit_status_task/" + $id,
      type: "GET",
      success: function(hasil){
         var $obj = $.parseJSON(hasil);
         if ($obj.id_status_task != ''){
            $('#id_status_task_e').val($obj.id_status_task);
            $('#nama_status_task_e').val($obj.nama_status_task);
            $('#deskripsi_status_task_e').val($obj.deskripsi_status_task);
         }
      }
   });
}



//                                //
// PENGELOLAAN DATA KATEGORI TASK //
//                                //

//Proses membersikan form add dan edit kategori task jika mengclose modal
$('.tombol-tutup-kategoritask').on('click', function() {
   $('.alert').hide();
   $('#nama_kategori_task').val('');
   $('#deskripsi_kategori_task').val('');
   $('#id_kategori_task_e').val('');
   $('#nama_kategori_task_e').val('');
   $('#deskripsi_kategori_task_e').val('');
});

//Proses edit kategori task
function edit_kategori_task($id){
   $.ajax({
      url: "/kategori_task/edit_kategori_task/" + $id,
      type: "GET",
      success: function(hasil){
         var $obj = $.parseJSON(hasil);
         if ($obj.id_kategori_task != ''){
            $('#id_kategori_task_e').val($obj.id_kategori_task);
            $('#nama_kategori_task_e').val($obj.nama_kategori_task);
            $('#deskripsi_kategori_task_e').val($obj.deskripsi_kategori_task);
         }
      }
   });
}



//                            //
// PENGELOLAAN DATA USERGROUP //
//                            //

//Proses membersikan form add dan edit usergroup jika mengclose modal
$('.tombol-tutup-usergroup').on('click', function() {
   $('.alert').hide();
   $('#nama_usergroup').val('');
   $('#deskripsi_usergroup').val('');
   $('#id_usergroup_e').val('');
   $('#nama_usergroup_e').val('');
   $('#deskripsi_usergroup_e').val('');
});

// //Proses edit usergroup
function edit_usergroup($id){
   $.ajax({
      url: "/usergroup/edit_usergroup/" + $id,
      type: "GET",
      success: function(hasil){
         var $obj = $.parseJSON(hasil);
         if ($obj.id_usergroup != ''){
            $('#id_usergroup_e').val($obj.id_usergroup);
            $('#nama_usergroup_e').val($obj.nama_usergroup);
            $('#deskripsi_usergroup_e').val($obj.deskripsi_usergroup);
         }
      }
   });
}



//                            //
// PENGELOLAAN DATA USERGROUP //
//                            //

//Proses membersikan form add dan edit user jika mengclose modal
$('.tombol-tutup-user').on('click', function() {
   $('.alert').hide();
   $('#email').val('');
   $('#nama').val('');
   $('#level').val('');
   $("input[name='usergroup']").prop('checked', false);
   $('#foto_profile').val('');
   $('.img-preview').attr('src', '');
});

 // Jika level adalah 'staff' atau 'user', maka tampilkan userGroupContainer, jika tidak, sembunyikan
document.getElementById('level').addEventListener('change', function() {
   var level = this.value;
   var userGroupContainer = document.getElementById('userGroupContainer');
   if (level === 'staff' || level === 'supervisi') {
      userGroupContainer.style.display = 'block';
   } else{
      userGroupContainer.style.display = 'none';
   }
});

//fungsi untuk mempreview gambar sampul komik
function previewImg() {
   const fotoProfil = document.querySelector('#foto_profile');
   const imgPreview = document.querySelector('.img-preview');
   const fileFotoProfile = new FileReader();
   fileFotoProfile.readAsDataURL(fotoProfil.files[0]);
   fileFotoProfile.onload = function(e) {
       imgPreview.src = e.target.result;
   }
}