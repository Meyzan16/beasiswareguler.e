<?php

namespace App\Controllers;
use App\Models\M_jejak_pembukaan;
use App\Models\M_dokumen;
use App\Models\M_daftar_mhs;


class Dashboard extends BaseController
{
    function __construct()
	{        
    $this->pembukaan = new M_jejak_pembukaan();     
     $this->dokumen = new M_dokumen();   
     $this->daftar = new M_daftar_mhs();  
	}

    public function index(){
        if(session()->get('cek_portal') =='')  {
            session()->setFlashdata('message', '<div class="alert alert-danger" role="alert">
            Silahkan Login </div>');
            return redirect()->to(base_url('Home')); 
        } else{  
            $data = [
                'title' => "BEASISWA",
                'posisi' => "Beranda",
                'isi' => 'v_home_user',
                'validation' =>  \Config\Services::validation()
            ];

            echo view('layout_mhs/v_wrapper', $data);
    }
}

        public function revisi_file(){
            $valid = $this->validate([     

                    'berkas_revisi' => [
                        'rules' => 'max_size[berkas_revisi,225]|ext_in[berkas_revisi,pdf]|mime_in[berkas_revisi,application/pdf]',
                        'errors' => [
                                'max_size' => 'Ukuran file maksimal 225 KB Silahkan Di Kompress Jika Lebih Dari Ukuran File Yang Ditentukan',
                                'ext_in' => 'Yang anda pilih bukan file pdf',
                                'mime_in' => 'Yang anda pilih bukan file'
                        ]              
                    ]  
            ]);

            //jika tidak valid kembalikan ke halaman daftar beasiswa
            if(!$valid){
                return redirect()->to(base_url('/Dashboard'))->withInput();

            } else {
                    //ambil file
                    $berkasRevisi = $this->request->getFile('berkas_revisi');
                    //generate nama foto
                    $namaBerkas = mt_rand(100,5000).'_'.$berkasRevisi->getName();
                    // pindahkan file ke public
                    $berkasRevisi->move('berkas_mhs/berkasRevisi', $namaBerkas);
                    
                    
                        $npm = session()->get('npm');   
                        $data = array (
                            'berkas_revisi' => $namaBerkas,
                        );

                        $this->daftar->update_data($data, $npm);

                        session()->setFlashdata('message_berhasil', '<div class="alert alert-success" role="alert">
                        File berhasil di upload </div>');
                        return redirect()->to(base_url('Dashboard'));

                }

        }


    
}