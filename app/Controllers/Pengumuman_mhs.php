<?php

namespace App\Controllers;

use App\Models\M_pengumuman;
use App\Models\M_jejak_pembukaan;

class Pengumuman_mhs extends BaseController
{
    function __construct()
	{        
    $this->pembukaan = new M_jejak_pembukaan();   
    $this->pengumuman = new M_pengumuman();   
	}

    public function index(){
    if(isset($_POST['pengumuman'])) {
         $data = [
             'title' => "BEASISWA",
             'jadwal' =>  $this->pembukaan->getData(),
             'pengumuman' =>  $this->pengumuman->getData(),
             'isi' => 'v_pengumuman',
             'validation' =>  \Config\Services::validation()
         ];
    
         echo view('layout_frontend/v_wrapper', $data);
     }
     else{
        return redirect()->to(base_url('Home'));
     }
    }



   
}
