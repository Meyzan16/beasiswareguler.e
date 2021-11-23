<?php

namespace App\Controllers\Backend;
use App\Controllers\BaseController;
use App\Models\M_wakil_dekan;

class WakilDekan extends BaseController
{

    function __construct()
	{        
    $this->wakil_dekan = new M_wakil_dekan();       
	}

    public function index(){
        if(session()->get('username')=='')  {
            session()->setFlashdata('massage', '<div class="alert alert-danger" role="alert">
            Silahkan Login </div>');
            return redirect()->to(base_url('Rumahku')); 
        } else {

            $data = [
                'title' => "BEASISWA",
                'sub_title' => "Data wakil dekan",
                'data1' => $this->wakil_dekan->getData(),
                'isi' => 'admin/wakil_dekan/v_data',
                'validation' => $this->validation
            ];
           return view('Admin/layout_backend/v_wrapper', $data);
        }

    }


    public function update(){
        $nip = $this->request->getPost('nip_hidden');	
        $nip_baru = $this->request->getPost('nip');
        $userLama = $this->db->query("SELECT * FROM data_wd WHERE nip='$nip'")->getRow();


        if($userLama->nip != $nip_baru)
        {
            $rules = 'is_unique[data_wd.nip]|min_length[18]|max_length[18]|numeric';
        }else{
            $rules = 'required';
        }

            $valid = $this->validate([
                'nip' => [
                    'rules' => $rules,
                    'errors' =>  [
                        'is_unique' => 'Nip Sudah Terdaftar',
                        'min_length' => 'Nip minimal 18 karkater',
                        'max_length' => 'Nip maksimal 18 Terdaftar',
                        'numeric' => 'Nip bersifat angka',
                    ]           
                ]  
            ]);

            
            //jika validasi gagal
            if(!$valid) {  
                session()->setFlashdata('gagal', $this->validation->listErrors() );
                $data = [
                    'title' => "BEASISWA",
                    'sub_title' => "Data wakil dekan",
                    'data1' => $this->wakil_dekan->getData(),
                    'isi' => 'admin/wakil_dekan/v_data',
                    'validation' => $this->validation
                ];
               return view('Admin/layout_backend/v_wrapper', $data);
             } 
            
           else {
                
            
                
                $data = array(
                        'nip' => $nip_baru,
                        'nama' => $this->request->getPost('nama'),
                        'status' => $this->request->getPost('status'),
                        'updated_at' => date('Y-m-d  h:i:s')                   
                 
                    );
                    

                  $this->wakil_dekan->updateData($data, $nip);

                    session()->setFlashdata('massage', '<div class="alert alert-success" role="alert">
                    Data Berhasil Di Ubah</div>');
                    return redirect()->to(base_url('Backend/WakilDekan'));
                    
                }        
        
    }

     
}