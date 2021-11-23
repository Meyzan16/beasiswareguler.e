<?php

namespace App\Controllers\Backend;
use App\Controllers\BaseController;
use App\Models\M_daftar_mhs;
use App\Models\M_jejak_pembukaan;

class pendaftar_mhs extends BaseController
{
    function __construct()
	{        
    $this->pembukaan = new M_jejak_pembukaan();   
    $this->daftar = new M_daftar_mhs();
	}

    public function index(){

        if(session()->get('username')=='')  {
            session()->setFlashdata('massage', '<div class="alert alert-danger" role="alert">
            Silahkan Login </div>');
            return redirect()->to(base_url('Rumahku')); 
        } else{ 
            $pilihtahun = $this->request->getPost('tahun');
            $data = [
                'title' => "BEASISWA",
                'sub_title' => "Data Pendaftar Beasiswa",
                'pilih_tahun' => $pilihtahun,
                'tahunn' => null,
                'pendaftar' => $this->daftar->getData(),
                'isi' => 'admin/pendaftar/v_pendaftar',
            ];
    
            echo view('Admin/layout_backend/v_wrapper', $data);
        }
    }

    public function pilih_tahun(){
        $pilihtahun = $this->request->getPost('tahun');

        if($pilihtahun == null){
            $data = array (
                'title' => "BEASISWA",
                'sub_title' => "Data Pendaftar Beasiswa",
                'pilih_tahun' => $pilihtahun,
                'tahunn' => null,
                'isi' => 'admin/pendaftar/v_pendaftar',
             ) ;
    
            return view('Admin/layout_backend/v_wrapper', $data);
        }else{
            
            $tahuntlahdipilih = $this->daftar->whereProdi($pilihtahun);
            $data = array (
                'title' => "BEASISWA",
                'sub_title' => "Data Pendaftar Beasiswa",
                'pilih_tahun' => $pilihtahun,
                'pendaftar' => $this->daftar->getData(),
                'tahunn' => $tahuntlahdipilih,
                'isi' => 'admin/pendaftar/v_pendaftar',
             ) ;
    
            return view('Admin/layout_backend/v_wrapper', $data);
            
            

        }
    }

   

     public function berkas_mhs($npm){     
             $data = [
                 'title' => "BEASISWA",
                 'pendaftar' => $this->daftar->getDataBerkas($npm),
                 'sub_title' => "Data Berkas " ,
                 'isi' => 'admin/pendaftar/v_berkas_pendaftar',
             ];
            
            if (empty($data['pendaftar'])) {
             throw new \CodeIgniter\Exceptions\PageNotFoundException('Data'.  $npm . ' tidak ditemukan.');
             } 
               
            return view('Admin/layout_backend/v_wrapper', $data); 
        
    }

    public function edit_data($npm){

              $pendaftar = $this->daftar->getEdit($npm);
              $data = [
                  'title' => "BEASISWA",
                  'sub_title' => "Edit Data Pendaftar ",
                  'pendaftar' => $pendaftar,
                  'isi' => 'admin/pendaftar/v_edit_data',
                  'validation' => $this->validation
              ];
      
            //   if (empty($data['pendaftar'])) {
            //   throw new \CodeIgniter\Exceptions\PageNotFoundException('Data'. $npm . ' tidak ditemukan.');
            //   } 
            
              return view('Admin/layout_backend/v_wrapper', $data); 

        

    }

    public function update(){
        $valid = $this->validate([
                'npm' => [
                    'label' => 'Npm',
                     'rules' => 'required',
                     'errors' => [
                            //|min_length[18]|max_length[18]
                            'max_length' => '{field} Maksimal 9 karakter ',
                            'min_length' => '{field} terlalu pendek',
                            'required' => '{field} Tidak Boleh Kosong',
                            'is_unique' => '{field}  Sudah Terdaftar.'
                            ]         
                    ],
                'nama' => [
                    'label' => 'Nama',
                     'rules' => 'trim|alpha_space',
                     'errors' => [
                            'alpha_space' => '{field} Input berupa alfabet',
                            ]         
                    ],    
                'norek' => [
                    'label' => 'No Rekening',
                     'rules' => 'trim|numeric',
                     'errors' => [
                            'numeric' => '{field} Input berupa angka ',
                            ]         
                    ],
                'hp_mhs' => [
                    'label' => 'No Hp Mahasiswa',
                     'rules' => 'trim|numeric|max_length[13]|min_length[9]',
                     'errors' => [
                            'max_length' => '{field} Maksimal 13 karakter ',
                            'min_length' => '{field} Minimal 11 karakter',
                            'numeric' => '{field} Input berupa angka ',
                            ]         
                    ],
                'ayah' => [
                    'label' => 'Nama Ayah',
                     'rules' => 'trim|alpha_space',
                     'errors' => [
                            'alpha_space' => '{field} Input berupa alfabet',
                            ]         
                    ],
                'ibu' => [
                    'label' => 'Nama Ibu',
                     'rules' => 'trim|alpha_space',
                     'errors' => [
                            'alpha_space' => '{field} Input berupa alfabet',
                            ]         
                    ],
                'pkj_ayah' => [
                    'label' => 'Pekerjaan Ayah',
                     'rules' => 'trim|alpha_space',
                     'errors' => [
                            'alpha_space' => '{field} Input berupa alfabet',
                            ]         
                    ],
                'pkj_ibu' => [
                    'label' => 'Pekerjaan ibu',
                     'rules' => 'trim|alpha_space',
                     'errors' => [
                            'alpha_space' => '{field} Input berupa alfabet',
                            ]         
                    ],
                'no_hp_ortu' => [
                    'label' => 'No Hp Ortu',
                     'rules' => 'trim|numeric|max_length[13]|min_length[9]',
                     'errors' => [
                            'max_length' => '{field} Maksimal 13 karakter ',
                            'min_length' => '{field} Minimal 11 karakter',
                            'numeric' => '{field} Input berupa angka ',
                            ]         
                    ],       
        ]);

        //jika tidak valid kembalikan ke halaman seelumnya
        if(!$valid){
             return redirect()->to('/backend/pendaftar_mhs/edit_data/'. $this->request->getVar('npm'))->withInput();
        } else {
        

                    $npm = htmlspecialchars($this->request->getPost('npm'));   

                    $data = array (
                        'tempat_lahir' => htmlspecialchars($this->request->getPost('tempat')),
                        'semester' => htmlspecialchars($this->request->getPost('smt')),
                        'no_rek_mhs' => htmlspecialchars($this->request->getPost('norek')),
                        'no_hp_mhs' => htmlspecialchars($this->request->getPost('hp_mhs')),
                        'alamat_mhs' => htmlspecialchars($this->request->getPost('alamat')),
                        'nama_ayah' => htmlspecialchars($this->request->getPost('ayah')),
                        'nama_ibu' => htmlspecialchars($this->request->getPost('ibu')),
                        'pkj_ayah' => htmlspecialchars($this->request->getPost('pkj_ayah')),
                        'pkj_ibu' => htmlspecialchars($this->request->getPost('pkj_ibu')),
                        'alamat_ortu' =>htmlspecialchars( $this->request->getPost('alamat_ortu')),
                        'no_hp_ortu' => htmlspecialchars($this->request->getPost('no_hp_ortu')),
                        'id_ipk' => htmlspecialchars($this->request->getPost('ipk')),
                        'id_sdr_kdg' => htmlspecialchars($this->request->getPost('sdr_kdg')),
                        'id_prestasi' => htmlspecialchars($this->request->getPost('prestasi')),
                        'id_penghasilan' => htmlspecialchars($this->request->getPost('penghasilan')),
                        'id_tanggungan' => htmlspecialchars($this->request->getPost('tanggungan_ortu')),
                        'updated_at' => date('Y-m-d  h:i:s')
                    );

                     $this->daftar->update_data($data, $npm);
                        session()->setFlashdata('massage', '<div class="alert alert-success" role="alert">
                        Data NPM '.$npm.' Berhasil Di Ubah</div>');
                         return redirect()->to(base_url('Backend/pendaftar_mhs'));     
                

            }
    }

    public function hapus_data($npm){

        if(isset($_POST['hapus'])){
                $this->daftar->hapus_data($npm);
                session()->setFlashdata('massage', '<div class="alert alert-success" role="alert">
                        Data Berhasil Di Hapus</div>');
                return redirect()->to(base_url('Backend/pendaftar_mhs'));
                

        }else {
            return redirect()->to(base_url('Backend/pendaftar_mhs'));
        }

    }

    public function verifikasi($npm){
        $data = [
            'status_berkas' => 'Y',
            'catatan_berkas' => null,
        ];

        $this->daftar->update_sts($data, $npm);

        session()->setFlashdata('massage', '<div class="alert alert-success" role="alert">
        Data Berhasil Diverifikasi </div>');
        return redirect()->to(base_url('Backend/pendaftar_mhs/berkas_mhs/'. $npm));    
    }

    public function tolak($npm){

        $data = [
        'status_berkas' => 'N',
        'catatan_berkas' => $this->request->getPost('catatan')
        ];

        $this->daftar->update_sts($data, $npm);

        session()->setFlashdata('massage', '<div class="alert alert-success" role="alert">
        Status '.$npm.' Berhasil Di Perbarui </div>');
        return redirect()->to(base_url('Backend/pendaftar_mhs/berkas_mhs/'. $npm));
    }

    





}