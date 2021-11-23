<?php 

namespace App\Controllers\Backend;
use App\Controllers\BaseController;
use App\Models\M_laporan;

class Laporan extends BaseController{


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
                'sub_title' => "Data Laporan",
                'pilih_tahun' => $pilihtahun,
                'kategori' => $kategori,
                'lolos' => '',
                'tahunn' => null,
                'validation' => $this->validation,
                'isi' => 'admin/laporan/v_data_laporan'
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
                'sub_title' => "Data Laporan",
                'pilih_tahun' => $pilihtahun,
                'kategori' => $kategori,
                'lolos' => $tahuntlahdipilih,
                'tahunn' => $this->laporan->getData(),
                'isi' => 'admin/laporan/v_data_laporan',
             ) ;
    
            return view('Admin/layout_backend/v_wrapper', $data);

        }
    }


}

?>