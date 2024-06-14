<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>DesTask</title>
   <style>
      .border-table {
         font-family: Arial, Helvetica, sans-serif;
         width: 100%;
         border-collapse: collapse;
         font-size: 12px;
      }

      .border-table th {
         border: 1 solid #000;
         font-weight: bold;
         background-color: #e1e1e1;
      }

      .border-table td {
         border: 1 solid #000;
      }
   </style>
</head>

<body>
   <center>
      <h3><?= $judul ?></h3>
      <p>Print at: <?= date('d-m-Y H:i:s') ?></p>
   </center>
   <table class="border-table">
      <thead>
         <tr>
            <th>No</th>
            <th>Status Pekerjaan</th>
            <th>Kategori Pekerjaan</th>
            <th>Nama Pekerjaan</th>
            <th>Pelanggan</th>
            <th>Jenis Pelanggan</th>
            <th>Nama PIC</th>
            <th>Email PIC</th>
            <th>No. WA PIC</th>
            <th>Jenis Layanan</th>
            <th>Nominal Harga</th>
            <th>Deskripsi Pekerjaan</th>
            <th>Target Waktu Selesai</th>
            <th>Waktu Selesai</th>
         </tr>
      </thead>
      <tbody>
         <?php $i = 1 ?>
         <?php foreach ($data_pekerjaan as $p) : ?>
            <tr>
               <td><?= $i++ ?></td>
               <td>
                  <?php foreach ($data_status_pekerjaan as $sp) : ?>
                     <?php if ($sp['id_status_pekerjaan'] == $p['id_status_pekerjaan']) : ?>
                        <?= $sp['nama_status_pekerjaan'] ?>
                     <?php endif; ?>
                  <?php endforeach; ?>
               </td>
               <td>
                  <?php foreach ($data_kategori_pekerjaan as $kp) : ?>
                     <?php if ($kp['id_kategori_pekerjaan'] == $p['id_kategori_pekerjaan']) : ?>
                        <?= $kp['nama_kategori_pekerjaan'] ?>
                     <?php endif; ?>
                  <?php endforeach; ?>
               </td>
               <td><?= $p['nama_pekerjaan'] ?></td>
               <td><?= $p['pelanggan'] ?></td>
               <td><?= $p['jenis_pelanggan'] ?></td>
               <td><?= $p['nama_pic'] ?></td>
               <td><?= $p['email_pic'] ?></td>
               <td><?= $p['nowa_pic'] ?></td>
               <td><?= $p['jenis_layanan'] ?></td>
               <td><?= idr($p['nominal_harga']) ?></td>
               <td><?= $p['deskripsi_pekerjaan'] ?></td>
               <td><?= date('d-m-Y', strtotime($p['target_waktu_selesai'])) ?></td>
               <td>
                  <?php if ($p['waktu_selesai'] != null) : ?>
                     <?= date('d-m-Y', strtotime($p['waktu_selesai'])) ?>
                  <?php else : ?>
                     <?= '' ?>
                  <?php endif; ?>
               </td>
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
   <!--Load script bootstrap 5-->
</body>

</html>