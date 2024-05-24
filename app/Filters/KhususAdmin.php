<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

//Filter ini agar routes hanya bisa diakses oleh admin
class KhususAdmin implements FilterInterface
{
   public function before(RequestInterface $request, $arguments = null)
   {
      // Do something here
      if (session()->get('user_level') != 'admin') {
         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
         //kalo levelnya bukan admin maka akan diarahkan ke halaman 404
      }
   }

   public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
   {
      // Do something here
   }
}
