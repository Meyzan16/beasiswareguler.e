<?php

namespace App\Controllers\Backend;
use App\Controllers\BaseController;
use App\Models\M_informasi;


class Informasi extends BaseController
{

     function __construct()
	{        
    $this->informasi = new M_informasi();       
	}

    public function index(){
        if(session()->get('username')=='')  {
            session()->setFlashdata('massage', '<div class="alert alert-danger" role="alert">
            Silahkan Login </div>');
            return redirect()->to(base_url('Rumahku')); 
        } else {

            $data = [
                'title' => "DATA BEASISWA",
                'sub_title' => "Data Informasi",
                'informasi' => $this->informasi->getData(),
                'isi' => 'admin/informasi/v_informasi',
                'validation' => $this->validation
            ];
           return view('Admin/layout_backend/v_wrapper', $data);
        }
    }

    public function edit($id_informasi){

        if(isset($_POST['edit'])) {
            $data = [
                        'title' => "DATA BEASISWA",
                        'sub_title' => "Data Informasi",
                        'informasi' => $this->informasi->getData($id_informasi),
                        'isi' => 'admin/informasi/v_edit_informasi',
                        'validation' => $this->validation
            ];   
           return view('Admin/layout_backend/v_wrapper', $data);
        } 
        else {
         return redirect()->to(base_url('Backend/informasi'));
        }

    }

    public function update(){

         if(isset($_POST['simpan'])){

                    $id_informasi = $this->request->getPost('id_informasi');
                    $konten = $this->request->getPost('konten');
                
                    $data = array(
                            'isi_informasi' => $konten,
                            'updated_at' => date('Y-m-d  h:i:s')   
                        );

                    $this->informasi->updateinformasi($data, $id_informasi);  
                    session()->setFlashdata('massage', '<div class="alert alert-success" role="alert">
                    Data Berhasil Di Ubah</div>');
                    return redirect()->to(base_url('Backend/informasi'));
         

        
            }else {
         return redirect()->to(base_url('Backend/informasi'));
        }



    }
}