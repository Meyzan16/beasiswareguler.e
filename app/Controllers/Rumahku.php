<?php

namespace App\Controllers;
use App\Models\M_login;

class Rumahku extends BaseController
{
    function __construct()
	{      
    $this->login = new M_login();       
	}

    public function index(){

        $data = [
            'title' => "Login",
        ];

        echo view('Login',$data);

    }
    
    public function cek_login(){
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $cek = $this->login->cek_login($username,$password);
                session()->set('nama_user',$cek['nama_user']); 
                session()->set('username',$cek['username']);
                session()->set('password',$cek['password']);  
                session()->set('role_id',$cek['role_id']); 
                session()->set('nama_prodi',$cek['nama_prodi']); 
                session()->set('kode_prodi',$cek['kode_prodi']); 
   
        if($cek){
            if($cek['role_id'] == '1' ){ 
                  session()->set('massage', '<div class="alert alert-success" role="alert">
                  Selamat Datang BIDANG KEMAHASISWAAN </div>');
                  return redirect()->to(base_url('Backend/Home')); 
            } else  {
                session()->set('massage', '<div class="alert alert-success" role="alert">
                Selamat Datang '.session()->get('nama_prodi').' </div>');
                return redirect()->to(base_url('Backend/Home')); 
            }
        }
            else {
                session()->setFlashdata('massage', '<div class="alert alert-danger" role="alert">
                Username dan Passoword Salah </div>');
                return redirect()->to(base_url('Rumahku'));
            }
       
    }

    public function logout(){
         session()->remove('username');
         session()->remove('password');
         session()->remove('role_id');
         session()->remove('kode_prodi');
         session()->setFlashdata('massage', '<div class="alert alert-success" role="alert">
			Anda Berhasil Logout</div>');
         return redirect()->to(base_url('Rumahku'));

    }
}

    
    
