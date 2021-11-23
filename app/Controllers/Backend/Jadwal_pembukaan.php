<?php

namespace App\Controllers\Backend;
use App\Controllers\BaseController;
use App\Models\M_jejak_pembukaan;
use GuzzleHttp\Client;


class Jadwal_pembukaan extends BaseController
{
    
    function __construct()
	{        
    $this->pembukaan = new M_jejak_pembukaan();       
	}


    public function index(){

        if(session()->get('username')=='')  {
            session()->setFlashdata('massage', '<div class="alert alert-danger" role="alert">
            Silahkan Login </div>');
            return redirect()->to(base_url('Rumahku')); 
        } else {

            $data = [
                'title' => "BEASISWA TEKNIK",
                'sub_title' => "Jadwal Pembukaan",
                'isi' => 'admin/pembukaan/v_pembukaan',
                'jadwal' => $this->pembukaan->getData(),
                'validation' => $this->validation
            ];
    
           return view('Admin/layout_backend/v_wrapper', $data);
        }

    }

    

    public function update(){
         $valid = $this->validate([
                  'foto' => [
                      'label' => 'gambar',
                      'rules' => 'max_size[foto,5160]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                      'errors' => [
                                'max_size' => 'Maksimal Ukuran Gambar 5 Mb',
                                'is_image' => 'Yang anda pilih bukan gambar',
                                'mime_in'  => 'Yang anda pilih bukan gambar'
                      ]              
                  ]  
            ]);

            if(!$valid) {
                session()->setFlashdata('gagal', $this->validation->listErrors() );
                    $data = [
                        'title' => "BEASISWA",
                        'sub_title' => "Jadwal Pembukaan",
                        'isi' => 'admin/pembukaan/v_pembukaan',
                        'jadwal' => $this->pembukaan->getData(),
                        'validation' => $this->validation
                     ];
                     return view('Admin/layout_backend/v_wrapper', $data);

            } else {
                //ambil gambar
                $fileFoto = $this->request->getFile('foto');
                //cek gambar, apakah tetap gambar lama               
                if($fileFoto->getError() == 4)
                {
                    $namaFoto = $this->request->getVar('fotoLama');
                } else {
                    //generate nama foto
                    $namaFoto = $fileFoto->getName();
                    //pindahkan file ke public dan file baru
                    $fileFoto->move('img', $namaFoto);
                    //hapus file yang lama
                    unlink('img/' . $this->request->getVar('fotoLama'));
               
                }

                $nama_foto = $namaFoto;
                $id_jejak = $this->request->getPost('id_jejak');
                
                $data = array(
                        'judul' => $this->request->getPost('judul'),
                        'tanggal_mulai' =>$this->request->getPost('tgl_mulai'),
                        'tanggal_selesai' => $this->request->getPost('tgl_selesai'),
                        'status' => $this->request->getPost('status'),
                        'upload_file' => $nama_foto, 
                    );
                    

                   $ubah =  $this->pembukaan->updateData($data, $id_jejak);
                    
                   if ($ubah) {  
                       session()->setFlashdata('massage', '<div class="alert alert-success" role="alert">
                       Data Berhasil Di DiUbah </div>');
                       return redirect()->to(base_url('Backend/jadwal_pembukaan'));
                   
                }

            }


    }
}