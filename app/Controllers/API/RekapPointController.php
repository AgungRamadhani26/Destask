<?php
namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;

class RekapPointController extends ResourceController {
    use ResponseTrait;
    protected $modelPekerjaan = 'App\Models\PekerjaanModel';
    protected $modelTask = 'App\Models\TaskModel';
    protected $modelKategoriTask = 'App\Models\KategoriTaskModel';
    protected $modelBobotKategoriTask = 'App\Models\BobotKategoriTaskModel';
    protected $format    = 'json';

    public function rekappoint($idUser) {
        $taskModel = new $this->modelTask();
        $kategoriTaskModel = new $this->modelKategoriTask();
        $bobotKategoriTaskModel = new $this->modelBobotKategoriTask();
    
        $tasks = $taskModel->getTaskByUser($idUser);
        $result = [];
        foreach ($tasks as $taskItem) {
            // Check if tgl_selesai is not null and less than tgl_planing
            if (($taskItem['tgl_selesai'] != null && strtotime($taskItem['tgl_selesai']) <= strtotime($taskItem['tgl_planing']))) {
                $kategoriTask = $kategoriTaskModel->getKategoriTaskById($taskItem['id_kategori_task']);
                $bobotKategoriTask = $bobotKategoriTaskModel->getBobotKategoriTaskById($kategoriTask['id_kategori_task']);
                $taskItem['bobot_point'] = $bobotKategoriTask['bobot_poin'];
                $result[] = $taskItem;
            }
        }
        return $this->response->setJSON($result);
    }    
    
}    