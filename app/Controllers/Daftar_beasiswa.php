<?php

namespace App\Controllers;

use App\Models\M_daftar_mhs;
use App\Models\M_jejak_pembukaan;



class Daftar_beasiswa extends BaseController
{
    function __construct()
	{        
    $this->pembukaan = new M_jejak_pembukaan();   
    $this->daftar = new M_daftar_mhs();   
	}

    public function index(){
        if(isset($_POST['daftar'])) {
            $data = [
                'title' => "BEASISWA",
                'jadwal' =>  $this->pembukaan->getData(),
                'isi' => 'v_daftar_beasiswa',
                'validation' =>  \Config\Services::validation()
            ];
        
            echo view('layout_frontend/v_wrapper', $data);
        }
        else{
            return redirect()->to(base_url('Home'));
        }
    }
   
}
