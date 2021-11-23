<?php

namespace App\Controllers\Backend;
use App\Controllers\BaseController;
use App\Models\M_login;

class Home extends BaseController
{

    function __construct()
	{      
    $this->login = new M_login();       
	}

    
    public function index(){

        if(session()->get('username')=='')  {
            session()->setFlashdata('massage', '<div class="alert alert-danger" role="alert">
            Silahkan Login </div>');
            return redirect()->to(base_url('Rumahku')); 
        } else{
            $data = [
                'title' => "BEASISWA TEKNIK",
                'sub_title' => "Dashboard",
                'isi' => 'v_home_backend',
                // 'user' => $this->login->getData()
            ];
    
            echo view('Admin/layout_backend/v_wrapper', $data);
        }
       

    }

    




}