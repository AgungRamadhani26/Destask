<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

//Filter ini agar routes hanya bisa diakses oleh HOD dan Direksi
class KhususHODandDireksi implements FilterInterface
{
   public function before(RequestInterface $request, $arguments = null)
   {
      // Do something here
      if (session()->get('user_level') != 'hod' && session()->get('user_level') != 'direksi') {
         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
         //kalo levelnya bukan hod atau Direksi maka akan diarahkan ke halaman 404
      }
   }

   public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
   {
      // Do something here
   }
}
