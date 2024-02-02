<?php
namespace App\Controllers\API;
use CodeIgniter\RESTful\ResourceController;
use DateTime;

class TaskController extends ResourceController{
    protected $modelName = 'App\Models\TaskModel';
    protected $format = 'json';

    public function index(){
        $model = new $this->modelName();
        $data = $model->orderBy('id_task', 'ASC')->findAll();
        return $this->respond($data, 200);
    }

    public function show($id = null){
        try {
            $model = new $this->modelName();
            $data = $model->getWhere(['id_task' => $id])->getResult();
    
            if($data){
                return $this->respond($data, 200);
            }else{
                $response = [
                    'status' => 404,
                    'error' => true,
                    'messages' => 'Data tidak ditemukan'
                ];
                return $this->respond($response, 404);
            }
        } catch (\Throwable $th) {
            return $this->failNotFound("Data tidak ditemukan");
        }
    }

    public function create(){
        $model = new $this->modelName();
        $id_pekerjaan = $this->request->getVar('id_pekerjaan');
        $id_user = $this->request->getVar('id_user');
        $id_status_task = $this->request->getVar('id_status_task');
        $id_kategori_task = $this->request->getVar('id_kategori_task');
        $tgl_planing = $this->request->getVar('tgl_planing');
        $deskripsi_task = $this->request->getVar('deskripsi_task');
        $tautan_task = $this->request->getVar('tautan_task');

        //validasi input
        $validation = $this->validate([
            'id_pekerjaan' => 'required',
            'id_user' => 'required',
        ]);

        if(!$validation){
            $response = [
                'status' => 400,
                'error' => true,
                'messages' => 'Data gagal disimpan'
            ];
            return $this->respond($response, 400);
        } else {
            $data = [
                'id_pekerjaan' => $id_pekerjaan,
                'id_user' => $id_user,
                'id_status_task' => $id_status_task,
                'id_kategori_task' => $id_kategori_task,
                'tgl_planing' => $tgl_planing,
                'persentase_selesai' => 0,
                'deskripsi_task' => $deskripsi_task,
                'tautan_task' => $tautan_task,
            ];
            $simpan = $model->insert($data);
            if($simpan){
                $response = [
                    'status' => 200,
                    'error' => null,
                    'messages' => [
                        'success' => 'Data berhasil disimpan'
                    ]
                ];
                return $this->respond($response, 200);
            } else {
                return $this->fail('Data gagal disimpan');
            }
        }
    }

    public function update($id = null){
        $model = new $this->modelName();
        $id_task = $this->request->getVar('id_task');
        $id_pekerjaan = $this->request->getVar('id_pekerjaan');
        $id_user = $this->request->getVar('id_user');
        $id_status_task = $this->request->getVar('id_status_task');
        $id_kategori_task = $this->request->getVar('id_kategori_task');
        $tgl_planing = $this->request->getVar('tgl_planing');
        $deskripsi_task = $this->request->getVar('deskripsi_task');
        $tautan_task = $this->request->getVar('tautan_task');
        $persentase_selesai = $this->request->getVar('persentase_selesai');

        $id = $id_task;
        //validasi
        $validation = $this->validate([
            'id_task' => 'required',
            'id_pekerjaan' => 'required',
            'id_user' => 'required',
        ]);
        if(!$validation){
            $response = [
                'status' => 400,
                'error' => true,
                'messages' => 'Data gagal disimpan'
            ];
            return $this->respond($response, 400);
        } else {
            $data = [
                'id_task' => $id_task,
                'id_pekerjaan' => $id_pekerjaan,
                'id_user' => $id_user,
                'id_status_task' => $id_status_task,
                'id_kategori_task' => $id_kategori_task,
                'tgl_planing' => $tgl_planing,
                'deskripsi_task' => $deskripsi_task,
                'tautan_task' => $tautan_task,
                'persentase_selesai' => $persentase_selesai,
            ];
        }
        $isExist = $model->getWhere(['id_task' => $id])->getRow();
        if($isExist){
            if($model->update($id, $data)){
                $response = [
                    'status' => 200,
                    'error' => null,
                    'messages' => [
                        'success' => 'Data berhasil diupdate'
                    ]
                ];
                return $this->respond($response, 200);
            } else {
                return $this->fail('Data gagal diupdate');
            }
        } else {
            return $this->failNotFound("Data tidak ditemukan");
        }
    }

    //submit
    public function submit($id = null){
        $model = new $this->modelName();
        $id_task = $this->request->getVar('id_task');
        $id_pekerjaan = $this->request->getVar('id_pekerjaan');
        $id_user = $this->request->getVar('id_user');
        $id_status_task = $this->request->getVar('id_status_task');
        $id_kategori_task = $this->request->getVar('id_kategori_task');
        $tgl_planing = $this->request->getVar('tgl_planing');
        $deskripsi_task = $this->request->getVar('deskripsi_task');
        $tautan_task = $this->request->getVar('tautan_task');
        $persentase_selesai = $this->request->getVar('persentase_selesai');
        $bukti_selesai = $this->request->getVar('bukti_selesai');

        $id = $id_task;
        //validasi
        $validation = $this->validate([
            'id_task' => 'required',
            'persentase_selesai' => 'required',
            //file
            'bukti_selesai' => 'uploaded[bukti_selesai]|max_size[bukti_selesai, 4096]|ext_in[bukti_selesai,png,jpg,jpeg,doc,docx,pdf]',
        ]);
        if(!$validation){
            $response = [
                'status' => 400,
                'error' => true,
                'messages' => 'Validasi gagal'
            ];
            return $this->respond($response, 400);
        }
        //upload file
        $bukti_selesai = $this->request->getFile('bukti_selesai');
        $newBuktiSelesai = $bukti_selesai->getRandomName();
        $bukti_selesai->move(ROOTPATH . 'public/file', $newBuktiSelesai);
        //end upload file
        $data = [
            'id_task' => $id_task,
            'id_pekerjaan' => $id_pekerjaan,
            'id_user' => $id_user,
            'id_status_task' => $id_status_task,
            'id_kategori_task' => $id_kategori_task,
            'tgl_planing' => $tgl_planing,
            'deskripsi_task' => $deskripsi_task,
            'tautan_task' => $tautan_task,
            'persentase_selesai' => $persentase_selesai,
            'bukti_selesai' => $newBuktiSelesai,
        ];
        $isExist = $model->getWhere(['id_task' => $id])->getRow();
        if($isExist){
            if($model->update($id, $data)){
                $response = [
                    'status' => 200,
                    'error' => null,
                    'messages' => [
                        'success' => 'Data berhasil diupdate'
                    ]
                ];
                return $this->respond($response, 200);
            } else {
                return $this->fail('Data gagal diupdate');
            }
        } else {
            return $this->failNotFound("Data tidak ditemukan");
        }
    }

    public function delete($id = null){
        $model = new $this->modelName();
        $data = $model->find($id);
    
        if ($data) {
            if ($model->delete($id)) {
                $response = [
                    'status' => 200,
                    'error' => null,
                    'messages' => [
                        'success' => 'Data berhasil dihapus'
                    ]
                ];
                return $this->respond($response, 200);
            } else {
                return $this->fail('Data gagal dihapus');
            }
        } else {
            return $this->failNotFound("Data tidak ditemukan");
        }
    }
    
    
    public function showTaskByPekerjaan($idpekerjaan){
        $model = new $this->modelName();
        $data = $model->getWhere(['id_pekerjaan' => $idpekerjaan])->getResult();
        return $this->respond($data, 200);
    }

    public function showTaskByUser($iduser){
        $model = new $this->modelName();
        $data = $model->getWhere(['id_user' => $iduser])->getResult();
        return $this->respond($data, 200);
    }
}

?>