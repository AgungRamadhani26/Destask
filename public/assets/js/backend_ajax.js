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
   if ($('sukses-usergroup').is(":visible")) {
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
            setTimeout(function(){location.reload();}, 1500);
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
            setTimeout(function(){location.reload();}, 1500);
         }
      }
   })
});
//Untuk mentrigger ketika menekan enter maka akan sama dengan submit form modal add user (sama dengan menekan save)
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
               }, 1500);
            }
         });
      }
   });
});