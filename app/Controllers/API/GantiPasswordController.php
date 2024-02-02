<?php

namespace App\Controllers\API;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class GantiPasswordController extends ResourceController {
    use ResponseTrait;
    protected $modelName = 'App\Models\UserModel';
    protected $format    = 'json';

    public function index() {
        try {
            $userId = $this->request->getVar('id_user');
            $oldPassword = $this->request->getVar('old_password');
            $newPassword = $this->request->getVar('new_password');

            // Validate user input
            if (empty($userId) || empty($oldPassword) || empty($newPassword)) {
            return $this->fail('Invalid input. Please provide user ID, old password, and new password.');
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