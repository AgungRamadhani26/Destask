<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

//Filter ini agar routes tidak bisa diakses oleh Admin
class ExceptAdminandStaff implements FilterInterface
{
   public function before(RequestInterface $request, $arguments = null)
   {
      // Do something here
      if (session()->get('user_level') == 'admin' || session()->get('user_level') == 'staff') {
         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
      }
   }

   public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
   {
      // Do something here
   }
}
