<?php 

namespace App\Controllers\Backend;
use App\Controllers\BaseController;
use App\Models\M_laporan;

class Cetak_laporan extends BaseController{


    function __construct()
	{        
    $this->laporan = new M_laporan();       
	}

    public function index(){
        if(session()->get('username')=='')  {
            session()->setFlashdata('massage', '<div class="alert alert-danger" role="alert">
            Silahkan Login </div>');
            return redirect()->to(base_url('Rumahku')); 
        } else {
               $pilihtahun = $this->request->getPost('tahun');
               $kategori = $this->request->getPost('kategori');
                $data = [
                'title' => "BEASISWA",
                'sub_title' => "Cetak Data Laporan",
                'pilih_tahun' => $pilihtahun,
                'kategori' => $kategori,
                'lolos' => '',
                'tahunn' => null,
                'validation' => $this->validation,
                'isi' => 'admin/laporan/v_data_cetak'
            ];
    
           return view('Admin/layout_backend/v_wrapper', $data);
        }

    }

    public function pilih_tahun(){
        $pilihtahun = $this->request->getPost('tahun');
        $kategori = $this->request->getPost('kategori');

        if($pilihtahun){
            $tahuntlahdipilih = $this->laporan->where($pilihtahun, $kategori);

            $data = array (
                'title' => "BEASISWA",
                'pilih_tahun' => $pilihtahun,
                'kategori' => $kategori,
                'kategori' => $kategori,
                'lolos' => $tahuntlahdipilih,
                'tahunn' => $this->laporan->getData(),
             ) ;
    
            echo view('Admin/Laporan/v_cetak_laporan', $data);

        }
    }


}

?>