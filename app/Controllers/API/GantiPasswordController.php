<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class GantiPasswordController extends ResourceController {
    use ResponseTrait;
    protected $modelName = 'App\Models\API\UserModel';
    protected $format    = 'json';

    public function index() {
        try {
            $userId = $this->request->getVar('id_user');
            $oldPassword = $this->request->getVar('old_password');
            $newPassword = $this->request->getVar('new_password');
            
            // Validate user input
            if (empty($userId) || empty($oldPassword) || empty($newPassword)) {
                $response = [
                    'status' => 400,
                    'error' => true,
                    'messages' => 'Data tidak boleh kosong',
                    'id_user' => $userId,
                    'old_password' => $oldPassword,
                    'new_password' => $newPassword,
                ];
                return $this->respond($response, 400);
            }

            // Check if the user exists
            $userModel = new $this->modelName();
            $user = $userModel->find($userId);

            if (!$user) {
            return $this->fail('User not found.');
            }

            // Verify the old password
            if (md5($oldPassword) != $user['password']) {
            return $this->fail('Password Lama Salah.');
            }

            // Update the user's password
            $hashedPassword = md5($newPassword);
            $userModel->update($userId, ['password' => $hashedPassword]);
            $response = [
                'status' => 200,
                'error' => false,
                'messages' => 'Password berhasil diubah'
            ];
            return $this->respond($response, 200);
        } catch (\Exception $e) {
            $response = [
                'status' => 500,
                'error' => true,
                'messages' => 'Password gagal diubah'
            ];
            return $this->respond($response, 500);
        }
    }
}
?>