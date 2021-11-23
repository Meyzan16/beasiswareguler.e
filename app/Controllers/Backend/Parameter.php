<?php 

namespace App\Controllers\Backend;
use App\Controllers\BaseController;
use App\Models\M_parameter;

class Parameter extends BaseController{

    function __construct()
    {
        $this->parameter = new M_parameter();
    }

    public function index(){

        if(session()->get('username') == ''){
            session()->setFlashdata('massage', '<div class="alert alert-danger" role="alert">
            Silahkan Login </div>');
            return redirect()->to(base_url('Rumahku'));
        } else{

            $data = [
                'title' => 'BEASISWA',
                'sub_title' => 'Data parameter',
                'parameter' => $this->parameter->getData(),
                'isi' => 'admin/parameter/v_parameter',
                'validation' => $this->validation
            ];

            echo view('admin/layout_backend/v_wrapper', $data);

        }

    }

    public function update(){
        $id_parameter = $this->request->getPost('id_parameter');


        $valid = $this->validate([
            'bobot' => [
                'rules' => 'required|numeric|trim',
                'errors' =>  [
                    'numeric' => 'Data Harus Berupa Angka',
                    'is_unique' => 'Username Sudah Terdaftar',
                ]
                ]

        ]);

        //jika tidak valid
        if(!$valid){
            session()->setFlashdata('gagal',  $this->validation->listErrors() );
            
            $data = [
                'title' => 'BEASISWA',
                'sub_title' => 'Data Verifikator',
                'parameter' => $this->parameter->getData(),
                'isi' => 'admin/parameter/v_parameter',
                'validation' => $this->validation
            ];

            echo view('admin/layout_backend/v_wrapper', $data);

        }else{

            //jika validasi berhasil
                
                
                $data = array(
                    'bobot_prm' => $this->request->getPost('bobot'),
                    );
                    

                  $this->parameter->updateparam($data, $id_parameter);

            session()->setFlashdata('massage', '<div class="alert alert-success" role="alert">
             Data Berhasil Di Ubah </div>');
            return redirect()->to(base_url('Backend/parameter'));

        }   


    }



}



?>