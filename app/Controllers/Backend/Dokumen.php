<?php

namespace App\Controllers\Backend;
use App\Controllers\BaseController;
use App\Models\M_dokumen;


class dokumen extends BaseController
{

     function __construct()
	{        
    $this->dokumen = new M_dokumen();       
	}

    public function index(){
        if(session()->get('username')=='')  {
            session()->setFlashdata('massage', '<div class="alert alert-danger" role="alert">
            Silahkan Login </div>');
            return redirect()->to(base_url('Rumahku')); 
        } else {

            $data = [
                'title' => "BEASISWA",
                'sub_title' => "Data Dokumen",
                'dokumen' => $this->dokumen->getdokumen(),
                'isi' => 'admin/dokumen/v_dokumen',
                'validation' => $this->validation
            ];
           return view('Admin/layout_backend/v_wrapper', $data);
        }

    }

    public function create()
    {
            $valid = $this->validate([
                  'file' => [
                      'rules' => 'max_size[file,2048]|ext_in[file,pdf]|mime_in[file,application/pdf]',
                      'errors' => [
                                'max_size' => 'Ukuran file terlalu besar',
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
                        'sub_title' => "Data Dokumen",
                        'dokumen' => $this->dokumen->getdokumen(),
                        'isi' => 'admin/dokumen/v_dokumen',
                        'validation' => $this->validation
            ];
                return view('Admin/layout_backend/v_wrapper', $data);
             } 
             
            else {
                //ambil gambar
                $fileFile = $this->request->getFile('file');

                    //generate nama File
                    $namaFile = $fileFile->getName();
                    //pindahkan file ke public
                    $fileFile->move('file', $namaFile);
                    //ambil nama file
                    //$namaFoto = $fileFoto->getRandomName();
                
                //jika validasi berhasil
                $this->dokumen->save([
                    'judul_dokumen' => $this->request->getPost('judul'),
                    'upload_file' => $namaFile,
                
                    ]);
                    session()->setFlashdata('massage', '<div class="alert alert-success" role="alert">
                    Data Berhasil Di Tambahkan </div>');
                    return redirect()->to(base_url('Backend/dokumen'));

            }
            
        
    }

   

     public function hapus($id_dokumen){
      
        if(isset($_POST['hapus'])){
            //cari gambar berdasarkan id
            $ambilData = $this->dokumen->hapusfileFolder($id_dokumen);    
            unlink('file/' . $ambilData->upload_file );
           
            $delete = $this->dokumen->hapusdokumen($id_dokumen);
                
                if($delete){
                session()->setFlashdata('massage', '<div class="alert alert-success" role="alert">
                        Data Berhasil Di Hapus</div>');
                return redirect()->to(base_url('Backend/dokumen'));
                }

        }else {
            return redirect()->to(base_url('Backend/dokumen'));
        }

        
    }
}