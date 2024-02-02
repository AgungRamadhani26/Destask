//                            //
// PENGELOLAAN DATA USERGROUP //
//                            //

//Proses untuk membersihkan form add dan edit usergroup
function bersihkanUsergroup(){
   $('#nama_usergroup').val('');
   $('#deskripsi_usergroup').val('');
   $('#id_usergroup_e').val('');
   $('#nama_usergroup_e').val('');
   $('#deskripsi_usergroup_e').val('');
}

//Proses membersikan form add dan edit usergroup jika mengclose modal
$('.tombol-tutup-usergroup').on('click', function() {
   if ($('.sukses-usergroup').is(":visible")) {
       window.location.href = current_url() + "?" + $_SERVER['QUERY_STRING'];
   }
   $('.alert').hide();
   bersihkanUsergroup();
});

//Proses add usergroup
$('#tombol-simpan-add-usergroup').on('click', function(){
   //Mengambil nilai berdasarkan id pada form
   let $nama_usergroup = $('#nama_usergroup').val();
   let $deskripsi_usergroup = $('#deskripsi_usergroup').val();
   //Menggunakan request ajax
   $.ajax({
      url: "/usergroup/tambah_usergroup",
      type: "POST",
      data: {
         nama_usergroup: $nama_usergroup,
         deskripsi_usergroup: $deskripsi_usergroup
      },
      success: function(hasil){
         var $obj = $.parseJSON(hasil);
         if ($obj.sukses == false){
            $('.sukses-usergroup').hide();
            $('.error-usergroup').show();
            $('.error-usergroup').html($obj.error);
         }else {
            $('.error-usergroup').hide();
            $('.sukses-usergroup').show();
            $('.sukses-usergroup').html($obj.sukses);
            bersihkanUsergroup();
            setTimeout(function(){location.reload();}, 1000);
         }
      }
   })
});
//Untuk mentrigger ketika menekan enter maka akan sama dengan submit form
$('#nama_usergroup').on('keypress', function(e){
   if (e.which === 13){
       e.preventDefault();
       $('#tombol-simpan-add-usergroup').click();
   }
});

//Proses edit usergroup
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
$('#tombol-simpan-edit-usergroup').on('click', function(){
   let $id_usergroup = $('#id_usergroup_e').val();
   let $nama_usergroup = $('#nama_usergroup_e').val();
   let $deskripsi_usergroup = $('#deskripsi_usergroup_e').val();
   $.ajax({
      url: "/usergroup/update_usergroup",
      type: "POST",
      data:{
         id_usergroup: $id_usergroup,
         nama_usergroup: $nama_usergroup,
         deskripsi_usergroup: $deskripsi_usergroup
      },
      success: function(hasil){
         var $obj = $.parseJSON(hasil);
         if ($obj.sukses == false){
            $('.sukses-usergroup_e').hide();
            $('.error-usergroup_e').show();
            $('.error-usergroup_e').html($obj.error);
         }else{
            $('.error-usergroup_e').hide();
            $('.sukses-usergroup_e').show();
            $('.sukses-usergroup_e').html($obj.sukses);
            bersihkanUsergroup();
            setTimeout(function(){location.reload();}, 1000);
         }
      }
   })
});
//Untuk mentrigger ketika menekan enter maka akan sama dengan submit form
$('#nama_usergroup_e').on('keypress', function(e){
   if (e.which === 13){
       e.preventDefault();
       $('#tombol-simpan-edit-usergroup').click();
   }
});

//Proses hapus data usergroup
$('.tombol-hapus-usergroup').on('click', function(e) {
   e.preventDefault();
   var $id_usergroup = $(this).data('id_usergroup');
   // Tampilkan sweet alert konfirmasi
   Swal.fire({
      title: 'Perhatian !',
      text: 'Data usergroup yang dihapus tidak dapat dikembalikan',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya, hapus data!"
   }).then((result) => {
      if (result.isConfirmed) {
         // Mengirimkan permintaan penghapusan dengan AJAX
         $.ajax({
            type: "DELETE",
            url: "/usergroup/delete_usergroup/" + $id_usergroup,
            success: function() {
               // Tampilkan sweet alert setelah penghapusan berhasil
               Swal.fire({
                  title: 'Berhasil :)',
                  text: 'Data usergroup berhasil dihapus',
                  icon: 'success'
               });
               setTimeout(function() {
                  location.reload();
               }, 1000);
            }
         });
      }
   });
});



//                                   //
// PENGELOLAAN DATA STATUS PEKERJAAN //
//                                   //

//Proses untuk membersihkan form add dan edit status pekerjaan
function bersihkanStatusPekerjaan(){
   $('#nama_status_pekerjaan').val('');
   $('#deskripsi_status_pekerjaan').val('');
   $('#id_status_pekerjaan_e').val('');
   $('#nama_status_pekerjaan_e').val('');
   $('#deskripsi_status_pekerjaan_e').val('');
}

//Proses membersikan form add dan edit status pekerjaan jika mengclose modal
$('.tombol-tutup-statuspekerjaan').on('click', function() {
   if ($('.sukses-statuspekerjaan').is(":visible")) {
       window.location.href = current_url() + "?" + $_SERVER['QUERY_STRING'];
   }
   $('.alert').hide();
   bersihkanStatusPekerjaan();
});

//Proses add status pekerjaan
$('#tombol-simpan-add-statuspekerjaan').on('click', function(){
   //Mengambil nilai berdasarkan id pada form
   let $nama_status_pekerjaan = $('#nama_status_pekerjaan').val();
   let $deskripsi_status_pekerjaan = $('#deskripsi_status_pekerjaan').val();
   let $csrf_token_name = $('input[name="csrf_token_name"]').val();
   //Menggunakan request ajax
   $.ajax({
      url: "/status_pekerjaan/tambah_status_pekerjaan",
      type: "POST",
      data: {
         csrf_token_name: $csrf_token_name,
         nama_status_pekerjaan: $nama_status_pekerjaan,
         deskripsi_status_pekerjaan: $deskripsi_status_pekerjaan
      },
      success: function(hasil){
         var $obj = $.parseJSON(hasil);
         if ($obj.sukses == false){
            $('.sukses-statuspekerjaan').hide();
            $('.error-statuspekerjaan').show();
            $('.error-statuspekerjaan').html($obj.error);
            $('input[name="csrf_token_name"]').val(location.reload());
         }else {
            $('.error-statuspekerjaan').hide();
            $('.sukses-statuspekerjaan').show();
            $('.sukses-statuspekerjaan').html($obj.sukses);
            bersihkanStatusPekerjaan();
            setTimeout(function(){location.reload();}, 1000);
         }
      }
   })
});
//Untuk mentrigger ketika menekan enter maka akan sama dengan submit
$('#nama_status_pekerjaan').on('keypress', function(e){
   if (e.which === 13){
       e.preventDefault();
       $('#tombol-simpan-add-statuspekerjaan').click();
   }
});

//Proses edit usergroup
function edit_status_pekerjaan($id){
   $.ajax({
      url: "/status_pekerjaan/edit_status_pekerjaan/" + $id,
      type: "GET",
      success: function(hasil){
         var $obj = $.parseJSON(hasil);
         if ($obj.id_usergroup != ''){
            $('#id_status_pekerjaan_e').val($obj.id_status_pekerjaan);
            $('#nama_status_pekerjaan_e').val($obj.nama_status_pekerjaan);
            $('#deskripsi_status_pekerjaan_e').val($obj.deskripsi_status_pekerjaan);
         }
      }
   });
}
$('#tombol-simpan-edit-statuspekerjaan').on('click', function(){
   let $id_status_pekerjaan = $('#id_status_pekerjaan_e').val();
   let $nama_status_pekerjaan = $('#nama_status_pekerjaan_e').val();
   let $deskripsi_status_pekerjaan = $('#deskripsi_status_pekerjaan_e').val();
   let $csrf_token_name = $('input[name="csrf_token_name"]').val();
   $.ajax({
      url: "/status_pekerjaan/update_status_pekerjaan",
      type: "POST",
      data:{
         csrf_token_name: $csrf_token_name,
         id_status_pekerjaan: $id_status_pekerjaan,
         nama_status_pekerjaan : $nama_status_pekerjaan ,
         deskripsi_status_pekerjaan: $deskripsi_status_pekerjaan
      },
      success: function(hasil){
         var $obj = $.parseJSON(hasil);
         if ($obj.sukses == false){
            $('.sukses-statuspekerjaan_e').hide();
            $('.error-statuspekerjaan_e').show();
            $('.error-statuspekerjaan_e').html($obj.error);
         }else{
            $('.error-statuspekerjaan_e').hide();
            $('.sukses-statuspekerjaan_e').show();
            $('.sukses-statuspekerjaan_e').html($obj.sukses);
            bersihkanStatusPekerjaan();
            setTimeout(function(){location.reload();}, 1000);
         }
      }
   })
});
//Untuk mentrigger ketika menekan enter maka akan sama dengan submit form
$('#nama_status_pekerjaan_e').on('keypress', function(e){
   if (e.which === 13){
       e.preventDefault();
       $('#tombol-simpan-edit-statuspekerjaan').click();
   }
});

//Proses hapus data status pekerjaan
$('.tombol-hapus-status-pekerjaan').on('click', function(e) {
   e.preventDefault();
   var $id_status_pekerjaan = $(this).data('id_status_pekerjaan');
   // Tampilkan sweet alert konfirmasi
   Swal.fire({
      title: 'Perhatian !',
      text: 'Data status pekerjaan yang dihapus tidak dapat dikembalikan',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Ya, hapus data!"
   }).then((result) => {
      if (result.isConfirmed) {
         // Mengirimkan permintaan penghapusan dengan AJAX
         $.ajax({
            type: "DELETE",
            url: "/status_pekerjaan/delete_status_pekerjaan/" + $id_status_pekerjaan,
            success: function() {
               // Tampilkan sweet alert setelah penghapusan berhasil
               Swal.fire({
                  title: 'Berhasil :)',
                  text: 'Data status pekerjaan berhasil dihapus',
                  icon: 'success'
               });
               setTimeout(function() {
                  location.reload();
               }, 1000);
            }
         });
      }
   });
});



//                              //
// PENGELOLAAN DATA STATUS TASK //
//                              //

//Proses untuk membersihkan form add dan edit status task
function bersihkanStatusTask(){
   $('#nama_status_task').val('');
   $('#deskripsi_status_task').val('');
   $('#id_status_task_e').val('');
   $('#nama_status_task_e').val('');
   $('#deskripsi_status_task_e').val('');
}

//Proses membersikan form add dan edit status task jika mengclose modal
$('.tombol-tutup-statustask').on('click', function() {
   if ($('.sukses-statustask').is(":visible")) {
       window.location.href = current_url() + "?" + $_SERVER['QUERY_STRING'];
   }
   $('.alert').hide();
   bersihkanStatusTask();
});

//Proses add status task
// $('#tombol-simpan-add-statustask').on('click', function(){
//    //Mengambil nilai berdasarkan id pada form
//    let $nama_status_task = $('#nama_status_task').val();
//    let $deskripsi_status_task = $('#deskripsi_status_task').val();
//    //Menggunakan request ajax
//    $.ajax({
//       url: "/status_task/tambah_status_task",
//       type: "POST",
//       data: {
//          nama_status_task: $nama_status_task,
//          deskripsi_status_task: $deskripsi_status_task
//       },
//       success: function(hasil){
//          var $obj = $.parseJSON(hasil);
//          if ($obj.sukses == false){
//             $('.sukses-statustask').hide();
//             $('.error-statustask').show();
//             $('.error-statustask').html($obj.error);
//          }else {
//             $('.error-statustask').hide();
//             $('.sukses-statustask').show();
//             $('.sukses-statustask').html($obj.sukses);
//             bersihkanStatusTask();
//             setTimeout(function(){location.reload();}, 1000);
//          }
//       }
//    })
// });
// //Untuk mentrigger ketika menekan enter maka akan sama dengan submit
// $('#nama_status_task').on('keypress', function(e){
//    if (e.which === 13){
//        e.preventDefault();
//        $('#tombol-simpan-add-statustask').click();
//    }
// });