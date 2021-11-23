<?php 

namespace App\Controllers\Backend;
use App\Controllers\BaseController;
use App\Models\M_verifikator;

class Verifikator extends BaseController{

    function __construct()
    {
        $this->user_role = new M_verifikator();
    }

    public function index(){

        if(session()->get('username') == ''){
            session()->setFlashdata('massage', '<div class="alert alert-danger" role="alert">
            Silahkan Login </div>');
            return redirect()->to(base_url('Rumahku'));
        } else{

            $data = [
                'title' => 'BEASISWA',
                'sub_title' => 'Data Verifikator',
                'user_role' => $this->user_role->getData(),
                'isi' => 'admin/verifikator/v_verifikator',
                'validation' => $this->validation
            ];

            echo view('admin/layout_backend/v_wrapper', $data);

        }

    }

    public function create(){

        $valid = $this->validate([
            'username' => [
                'rules' => 'required|trim|is_unique[user_role.username]',
                'errors' =>  [
                    'is_unique' => 'Username Sudah Terdaftar',
                ]
                ],

             'prodi' => [
                 'rules' => 'required|trim|is_unique[user_role.kode_prodi]',
                 'errors' => [
                     'is_unique' => 'Nama Prodi Sudah Digunakan'
                 ]
             ]   

        ]);

        //jika tidak valid
        if(!$valid){
            session()->setFlashdata('gagal',  $this->validation->listErrors() );
            
            $data = [
                'title' => 'BEASISWA',
                'sub_title' => 'Data Verifikator',
                'user_role' => $this->user_role->getData(),
                'isi' => 'admin/verifikator/v_verifikator',
                'validation' => $this->validation
            ];

            echo view('admin/layout_backend/v_wrapper', $data);

        }else{

            $this->user_role->save(
                [
                    'nama_user' => $this->request->getPost('nama'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'kode_prodi' => $this->request->getPost('prodi'),
                    'role_id' => 2,


                ]   
            );

            session()->setFlashdata('massage', '<div class="alert alert-success" role="alert">
             Data Berhasil Di Tambahkan </div>');
            return redirect()->to(base_url('Backend/verifikator'));

        }   

    }

    public function update(){
        $id_role = $this->request->getPost('id_role');	
	    $kode_prodi = $this->request->getPost('prodi');
        $username_baru = $this->request->getPost('username');

        $userLama = $this->db->query("SELECT * FROM user_role WHERE id_role='$id_role'")->getRow();
	    $prodi = $this->db->query("SELECT * FROM user_role WHERE kode_prodi='$kode_prodi' ")->getRowArray();


        if($userLama->username != $username_baru)
        {
            $rules = 'is_unique[user_role.username]';
        }else if($prodi['kode_prodi'] != $kode_prodi){
            $rules = 'is_unique[user_role.kode_prodi]';
        }else{
            $rules = 'required';
        }

        $valid = $this->validate([
            'username' => [
                'rules' => $rules,
                'errors' =>  [
                    'is_unique' => 'Username Sudah Terdaftar',
                ]
                ],
            'prodi' => [
                    'rules' => $rules,
                    'errors' => [
                        'is_unique' => 'Nama Prodi Sudah Digunakan'
                    ]
                ] 

            ]);

        //jika tidak valid
        if(!$valid){
            session()->setFlashdata('gagal',  $this->validation->listErrors() );
            
            $data = [
                'title' => 'BEASISWA',
                'sub_title' => 'Data Verifikator',
                'user_role' => $this->user_role->getData(),
                'isi' => 'Admin/verifikator/v_verifikator',
                'validation' => $this->validation
            ];

            return view('Admin/layout_backend/v_wrapper', $data);

        }else{

            //jika validasi berhasil
                
                
                $data = array(
                    'nama_user' => $this->request->getPost('nama'),
                    'username' => $username_baru,
                    'password' => $this->request->getPost('password'),
                    'kode_prodi' => $kode_prodi,
                    'updated_at' => date('Y-m-d  h:i:s') 
                    );
                    

                  $this->user_role->updateverifi($data, $id_role);

            session()->setFlashdata('massage', '<div class="alert alert-success" role="alert">
             Data Berhasil Di Tambahkan </div>');
            return redirect()->to(base_url('Backend/verifikator'));

        }   


    }

    public function hapus(){

        $id_role = $this->request->getPost('hapus');
        if(isset($_POST['hapus'])){
            $delete = $this->user_role->hapus($id_role);
                if($delete){
                session()->setFlashdata('massage', '<div class="alert alert-success" role="alert">
                        Data Berhasil Di Hapus</div>');
                return redirect()->to(base_url('Backend/verifikator'));
                }

        }else {
            return redirect()->to(base_url('Backend/verifikator'));
        }

    }


}



?>