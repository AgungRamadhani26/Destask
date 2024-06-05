<?php

// Fungsi untuk mengkonversi nilai ke teks yang sesuai
function konversi_nilai_seragam_dan_penampilan($nilai)
{
   switch ($nilai) {
      case 0:
         return "0 - Jarang sesuai standar";
      case 5:
         return "5 - Kadang-kadang sesuai standar";
      case 8:
         return "8 - Sering sesuai standar";
      case 10:
         return "10 - Selalu sesuai standar";
      default:
         return "$nilai - Tidak terdefinisi"; // Default case jika nilai tidak sesuai dengan yang diinginkan
   }
}

function konversi_nilai_general_competency($nilai)
{
   switch ($nilai) {
      case 1:
         return "1 - Develop / Perlu Dikembangkan";
      case 5:
         return "5 - Meets / Sesuai";
      case 10:
         return "10 - Exceeds / Melebihi";
   }
}
