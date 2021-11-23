<?php

namespace App\Controllers\Backend;
use App\Controllers\BaseController;
use App\Models\M_pengumuman;

class Pengumuman extends BaseController
{

    function __construct()
	{        
    $this->pengumuman = new M_pengumuman();       
	}

    public function index(){
        if(session()->get('username')=='')  {
            session()->setFlashdata('massage', '<div class="alert alert-danger" role="alert">
            Silahkan Login </div>');
            return redirect()->to(base_url('Rumahku')); 
        } else {

            $data = [
                'title' => "BEASISWA",
                'sub_title' => "Data pengumuman",
                'pengumuman' => $this->pengumuman->getData(),
                'isi' => 'admin/pengumuman/v_pengumuman',
                'validation' => $this->validation
            ];
           return view('Admin/layout_backend/v_wrapper', $data);
        }

    }


    public function update(){

            $valid = $this->validate([
                'file' => [
                    'rules' => 'max_size[file,2048]|ext_in[file,pdf]|mime_in[file,application/pdf]',
                    'errors' => [
                              'max_size' => 'Ukuran file Maksimal 2 MB ',
                              'ext_in' => 'Yang anda pilih bukan file pdf',
                              'mime_in' => 'Yang anda pilih bukan gambar'
                    ]              
                ]  
            ]);

            
            //jika validasi gagal
            if(!$valid) {  
                session()->setFlashdata('gagal', $this->validation->listErrors() );
                $data = [
                    'title' => "BEASISWA",
                    'sub_title' => "Data pengumuman",
                    'pengumuman' => $this->pengumuman->getData(),
                    'isi' => 'admin/pengumuman/v_pengumuman',
                    'validation' => $this->validation
                ];
               return view('Admin/layout_backend/v_wrapper', $data); 
             } 
            
           else {
                //ambil file
                $filefile = $this->request->getFile('file');
                //cek file, apakah tetap file lama               
                if($filefile->getError() == 4)
                {
                    $namafile = $this->request->getVar('fileLama');
                } else {
                    //generate nama foto
                    $namafile = $filefile->getRandomName();
                    //pindahkan file ke public dan file baru
                    $filefile->move('file_pengumuman/', $namafile);
                    //hapus file yang lama
                    unlink('file_pengumuman/' . $this->request->getVar('fileLama'));
               
                }
                
                //jika validasi berhasil
                
                $id_pengumuman = $this->request->getPost('id_pengumuman');
                $nama_file = $namafile; 
                $data = array(
                        'judul_pengumuman' => $this->request->getVar('judul'),
                        'upload_file' => $nama_file,
                        'status' => $this->request->getPost('status'),
                        'updated_at' => date('Y-m-d  h:i:s')                   
                 
                    );
                    

                  $this->pengumuman->updateData($data, $id_pengumuman);

                    session()->setFlashdata('massage', '<div class="alert alert-success" role="alert">
                    Data Berhasil Di Ubah</div>');
                    return redirect()->to(base_url('Backend/pengumuman'));
                    
                }        
        
    }

     
}