<?php

namespace App\Controllers;
use App\Models\M_jejak_pembukaan;
use App\Models\M_dokumen;
use App\Models\M_informasi;



class Home extends BaseController
{
    

    function __construct()
	{        
    $this->pembukaan = new M_jejak_pembukaan();     
     $this->dokumen = new M_dokumen();   
     $this->informasi = new M_informasi();  
	}

    public function index(){

        $data = [
            'title' => "BEASISWA",
            'posisi' => "Beranda",
            'jadwal' => $this->pembukaan->getData(),
            'dokumen' => $this->dokumen->getdokumen(),
            'informasi' => $this->informasi->getData(),
            'isi' => 'v_home_frontend'
        ];

        echo view('layout_frontend/v_wrapper', $data);
    }
}