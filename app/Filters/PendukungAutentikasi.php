<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

//filter ini agar routes hanya dapat diakses ketika masuk melalui menu login bukan melalui paste url ke browser
class PendukungAutentikasi implements FilterInterface
{
   public function before(RequestInterface $request, $arguments = null)
   {
      // Do something here
      if (!session()->get('id_user')) {
         return redirect()->to('/');
         //kalo gada sessionnya maka diarahkan ke login lagi
      }
   }

   public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
   {
      // Do something here
   }
}

// cara kerjanya yaitu: pengguna >> routing >> filter/middleware >> controller
// jadi pengguna akan diarahkan ke routing, selanjutnya akan diarahkan ke filter
// untuk dilakukan pengecekan sebelum dilanjutkan ke controller, misalnya pengguna
// harus login baru bisa masuk ke web, dan pengguna tidak bisa memaksakan masuk
// melalui browser.