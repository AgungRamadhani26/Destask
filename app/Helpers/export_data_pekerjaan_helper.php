<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;


function set_dot_export($d)
{
   $whole      = floor($d);
   $fraction   = $d - $whole;

   if ($fraction == 0) {
      return @number_format($d, 0, ',', '.');
   } else {
      return number_format($d, 2, ',', '.');
   }
}

function idr_export($nominal)
{
   return 'Rp ' . set_dot_export($nominal);
}


function export_pekerjaan_excel($pekerjaan_presales, $nama_file, $status_pekerjaan, $kategori_pekerjaan)
{
   $spreadsheet = new Spreadsheet();
   $sheet = $spreadsheet->getActiveSheet();
   $sheet->setCellValue('A1', 'No');
   $sheet->setCellValue('B1', 'Status Pekerjaan');
   $sheet->setCellValue('C1', 'Kategori Pekerjaan');
   $sheet->setCellValue('D1', 'Nama Pekerjaan');
   $sheet->setCellValue('E1', 'Pelanggan');
   $sheet->setCellValue('F1', 'Jenis Pelanggan');
   $sheet->setCellValue('G1', 'Nama PIC');
   $sheet->setCellValue('H1', 'Email PIC');
   $sheet->setCellValue('I1', 'No. WA PIC');
   $sheet->setCellValue('J1', 'Jenis Layanan');
   $sheet->setCellValue('K1', 'Nominal Harga');
   $sheet->setCellValue('L1', 'Deskripsi Pekerjaan');
   $sheet->setCellValue('M1', 'Target Waktu Selesai');
   //index kolom
   $column = 2;
   //Looping untuk memuat data
   foreach ($pekerjaan_presales as $ps) {
      //Untuk status pekerjaan
      foreach ($status_pekerjaan as $sp) {
         if ($sp['id_status_pekerjaan'] == $ps['id_status_pekerjaan']) {
            $status_pekerjaan_excel = $sp['nama_status_pekerjaan'];
         }
      }
      //Untuk kategori pekerjaan
      foreach ($kategori_pekerjaan as $kp) {
         if ($kp['id_kategori_pekerjaan'] == $ps['id_kategori_pekerjaan']) {
            $kategori_pekerjaan_excel = $kp['nama_kategori_pekerjaan'];
         }
      }
      //Untuk target waktu selesai
      $target_waktu_selesai = date('d-m-Y', strtotime($ps['target_waktu_selesai']));
      //Pemuatan data ke excel
      $sheet->setCellValue('A' . $column, ($column - 1));
      $sheet->setCellValue('B' . $column, $status_pekerjaan_excel);
      $sheet->setCellValue('C' . $column, $kategori_pekerjaan_excel);
      $sheet->setCellValue('D' . $column, $ps['nama_pekerjaan']);
      $sheet->setCellValue('E' . $column, $ps['pelanggan']);
      $sheet->setCellValue('F' . $column, $ps['jenis_pelanggan']);
      $sheet->setCellValue('G' . $column, $ps['nama_pic']);
      $sheet->setCellValue('H' . $column, $ps['email_pic']);
      $sheet->setCellValue('I' . $column, $ps['nowa_pic']);
      $sheet->setCellValue('J' . $column, $ps['jenis_layanan']);
      $sheet->setCellValue('K' . $column, idr_export($ps['nominal_harga']));
      $sheet->setCellValue('L' . $column, $ps['deskripsi_pekerjaan']);
      $sheet->setCellValue('M' . $column, $target_waktu_selesai);
      $column++;
   }
   //biar title file excelnya jadi bold
   $sheet->getStyle('A1:M1')->getFont()->setBold(true);
   //Biar title excelnya berwarna kuning
   $sheet->getStyle('A1:M1')->getFill()
      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
      ->getStartColor()->setARGB('FFFFFF00');
   //Biar file excelnya punya border
   $styleArray = [
      'borders' => [
         'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => 'FF000000'],
         ],
      ],
   ];
   $sheet->getStyle('A1:M' . ($column - 1))->applyFromArray($styleArray);
   //Auto size kolom
   foreach (range('A', 'M') as $columnID) {
      $sheet->getColumnDimension($columnID)->setAutoSize(true);
   }
   //Buat file excel
   $writer = new Xlsx($spreadsheet);
   header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
   header('Content-Disposition: attachment;filename=' . $nama_file);
   header('Cache-Control: max-age=0');
   $writer->save('php://output');
   exit();
}
