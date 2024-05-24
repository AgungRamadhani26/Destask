<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

//Filter ini agar pengguna tidak bisa mengakses halaman login jika sudah login, jadi kalau mau akses
//halaman login harus menekan tombol logout terlebih dahulu
class KhususPengguna implements FilterInterface
{
   public function before(RequestInterface $request, $arguments = null)
   {
      // Do something here
      if (session()->get('id_user')) {
         return redirect()->to('/dashboard');
         //kalo ada sessionnya maka diarahkan ke dashboard lagi
         //walau pengguna membuka halaman login dari browser
      }
   }

   public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
   {
      // Do something here
   }
}
