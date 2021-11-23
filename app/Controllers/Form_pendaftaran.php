<?php

namespace App\Controllers;

use App\Models\M_daftar_mhs;



class Form_pendaftaran extends BaseController
{
    function __construct()
	{        
  
     $this->daftar = new M_daftar_mhs();    
	}

    public function index(){
        if(session()->get('cek_portal') =='')  {
            session()->setFlashdata('message', '<div class="alert alert-danger" role="alert">
            Silahkan Login </div>');
            return redirect()->to(base_url('Home')); 
        } else{ 
        $data = [
            'title' => "BEASISWA",
            'posisi' => "Beranda",
            'isi' => 'v_form_pendaftaran',
            'validation' =>  \Config\Services::validation()
        ];

        echo view('layout_mhs/v_wrapper', $data);
    }
    }

     public function simpan_data(){

        $smt = htmlspecialchars($this->request->getPost('smt'));
        
         
        $valid = $this->validate([     
                'smt' => [
                    'label' => 'Semester',
                     'rules' => 'trim|numeric',
                     'errors' => [
                            'numeric' => '{field} Input berupa angka ',
                            ]         
                    ],
                    'ipk' => [
                        'label' => 'Ipk',
                         'rules' => 'required',
                         'errors' => [
                                'required' => 'tidak boleh kosong',
                                ]         
                        ],
                    'nama_bank' => [
                            'label' => 'nama_bank',
                             'rules' => 'required',
                             'errors' => [
                                    'required' => 'tidak boleh kosong',
                                    ]         
                            ],
                    'sdr_kdg' => [
                                'label' => 'Jumlah saudara kandung',
                                 'rules' => 'required',
                                 'errors' => [
                                        'required' => 'tidak boleh kosong',
                                        ]         
                                ],    
                    'pres_nonak' => [
                                    'label' => 'Prestasi',
                                     'rules' => 'required',
                                     'errors' => [
                                            'required' => 'tidak boleh kosong',
                                            ]         
                                    ],
                    'hasil_ortu' => [
                                        'label' => 'Penghasilan Orang Tua',
                                         'rules' => 'required',
                                         'errors' => [
                                                'required' => 'tidak boleh kosong',
                                                ]         
                     ],
                     'tanggungan_ortu' => [
                        'label' => 'tanggungan ortu',
                         'rules' => 'required',
                         'errors' => [
                                'required' => 'tidak boleh kosong',
                                ]         
                    ],

                'rekening' => [
                    'label' => 'No Rekening',
                     'rules' => 'trim|numeric',
                     'errors' => [
                            'numeric' => '{field} Input berupa angka, tanpa karakter ',
                            ]         
                    ],
                'nama_rekening' => [
                        'label' => 'Nama rekening',
                         'rules' => 'trim|alpha_space',
                         'errors' => [
                                'alpha_space' => '{field} Input berupa alfabet',
                                ]         
                        ],
                'hp_mhs' => [
                    'label' => 'No Hp Mahasiswa',
                     'rules' => 'trim|numeric|max_length[13]|min_length[11]',
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
                'hp_ortu' => [
                    'label' => 'No Hp Ortu',
                     'rules' => 'trim|numeric|max_length[13]|min_length[11]',
                     'errors' => [
                            'max_length' => '{field} Maksimal 13 karakter ',
                            'min_length' => '{field} Minimal 11 karakter',
                            'numeric' => '{field} Input berupa angka ',
                            ]         
                    ],    

                  'surat_permohonan' => [
                      'rules' => 'max_size[surat_permohonan,225]|ext_in[surat_permohonan,pdf]|mime_in[surat_permohonan,application/pdf]',
                      'errors' => [
                                'max_size' => 'Ukuran file maksimal 225 KB Silahkan Di Kompress Jika Lebih Dari Ukuran File Yang Ditentukan',
                                'ext_in' => 'Yang anda pilih bukan file pdf',
                                'mime_in' => 'Yang anda pilih bukan file'
                                ]              
                      ],
                
                  'ket_tdk_mampu' => [
                      'rules' => 'max_size[ket_tdk_mampu,225]|ext_in[ket_tdk_mampu,pdf]|mime_in[ket_tdk_mampu,application/pdf]',
                      'errors' => [
                                'max_size' => 'Ukuran file maksimal 225 KB Silahkan Di Kompress Jika Lebih Dari Ukuran File Yang Ditentukan',
                                'ext_in' => 'Yang anda pilih bukan file pdf',
                                'mime_in' => 'Yang anda pilih bukan file'
                      ]              
                  ] ,
                  'file_ktm' => [
                      'rules' => 'max_size[file_ktm,225]|ext_in[file_ktm,pdf]|mime_in[file_ktm,application/pdf]',
                      'errors' => [
                                'max_size' => 'Ukuran file maksimal 225 KB Silahkan Di Kompress Jika Lebih Dari Ukuran File Yang Ditentukan',
                                'ext_in' => 'Yang anda pilih bukan file pdf',
                                'mime_in' => 'Yang anda pilih bukan file'
                      ]              
                  ]  ,
                  
                  'ket_tdk_beasiswa_lain' => [
                      'rules' => 'max_size[ket_tdk_beasiswa_lain,225]|ext_in[ket_tdk_beasiswa_lain,pdf]|mime_in[ket_tdk_beasiswa_lain,application/pdf]',
                      'errors' => [
                                'max_size' => 'Ukuran file maksimal 225 KB Silahkan Di Kompress Jika Lebih Dari Ukuran File Yang Ditentukan',
                                'ext_in' => 'Yang anda pilih bukan file pdf',
                                'mime_in' => 'Yang anda pilih bukan file'
                      ]              
                  ]  ,
                  'sertifikat_pkk' => [
                      'rules' => 'max_size[sertifikat_pkk,225]|ext_in[sertifikat_pkk,pdf]|mime_in[sertifikat_pkk,application/pdf]',
                      'errors' => [
                                'max_size' => 'Ukuran file maksimal 225 KB Silahkan Di Kompress Jika Lebih Dari Ukuran File Yang Ditentukan',
                                'ext_in' => 'Yang anda pilih bukan file pdf',
                                'mime_in' => 'Yang anda pilih bukan file'
                      ]              
                  ]  ,
                  'file_kk' => [
                      'rules' => 'max_size[file_kk,225]|ext_in[file_kk,pdf]|mime_in[file_kk,application/pdf]',
                      'errors' => [
                                'max_size' => 'Ukuran file maksimal 225 KB Silahkan Di Kompress Jika Lebih Dari Ukuran File Yang Ditentukan',
                                'ext_in' => 'Yang anda pilih bukan file pdf',
                                'mime_in' => 'Yang anda pilih bukan file'
                      ]              
                  ]  ,
                  'file_transkip' => [
                      'rules' => 'max_size[file_transkip,225]|ext_in[file_transkip,pdf]|mime_in[file_transkip,application/pdf]',
                      'errors' => [
                                'max_size' => 'Ukuran file maksimal 225 KB Silahkan Di Kompress Jika Lebih Dari Ukuran File Yang Ditentukan',
                                'ext_in' => 'Yang anda pilih bukan file pdf',
                                'mime_in' => 'Yang anda pilih bukan file'
                      ]              
                  ]  ,
                  'file_pres' => [
                      'rules' => 'max_size[file_pres,225]|ext_in[file_pres,pdf]|mime_in[file_pres,application/pdf]',
                      'errors' => [
                                'max_size' => 'Ukuran file maksimal 225 KB Silahkan Di Kompress Jika Lebih Dari Ukuran File Yang Ditentukan',
                                'ext_in' => 'Yang anda pilih bukan file pdf',
                                'mime_in' => 'Yang anda pilih bukan file'
                      ]              
                  ]  ,
                  'berkas_gaji_hasil_ortu' => [
                    'rules' => 'max_size[berkas_gaji_hasil_ortu,225]|ext_in[berkas_gaji_hasil_ortu,pdf]|mime_in[berkas_gaji_hasil_ortu,application/pdf]',
                    'errors' => [
                              'max_size' => 'Ukuran file maksimal 225 KB Silahkan Di Kompress Jika Lebih Dari Ukuran File Yang Ditentukan',
                              'ext_in' => 'Yang anda pilih bukan file pdf',
                              'mime_in' => 'Yang anda pilih bukan file'
                    ]              
                ]  
                   

        ]);

        //jika tidak valid kembalikan ke halamab daftar beasiswa
        if(!$valid){
             return redirect()->to(base_url('Form_pendaftaran/index'))->withInput();
    
        } else {
            //ambil file
                $filepermohonan = $this->request->getFile('surat_permohonan');
                $filetdkmampu = $this->request->getFile('ket_tdk_mampu');
                $filektm = $this->request->getFile('file_ktm');
                $filebeasiswalain = $this->request->getFile('ket_tdk_beasiswa_lain');
                $filepkk = $this->request->getFile('sertifikat_pkk');
                $filekk = $this->request->getFile('file_kk');
                $file_transkip = $this->request->getFile('file_transkip');
                $fileprestasi = $this->request->getFile('file_pres');
                $berkas_gaji_hasil_ortu = $this->request->getFile('berkas_gaji_hasil_ortu');

                //generate nama foto
                    $namapermohonan = mt_rand(100,5000).'_'.$filepermohonan->getName();
                    $namaktm = mt_rand(100,5000).'_'.$filektm->getName();
                    $namatdkmampu = mt_rand(100,5000).'_'.$filetdkmampu->getName();
                    $namabeasiswalain = mt_rand(100,5000).'_'.$filebeasiswalain->getName();
                    $namapkk = mt_rand(100,5000).'_'.$filepkk->getName();
                    $namakk = mt_rand(100,5000).'_'.$filekk->getName();
                    $nama_transkip = mt_rand(100,5000).'_'.$file_transkip->getName();
                    $namaprestasi = mt_rand(100,5000).'_'.$fileprestasi->getName();
                    $berkas_gaji = mt_rand(100,5000).'_'.$berkas_gaji_hasil_ortu->getName();

                   // pindahkan file ke public
                    $filepermohonan->move('berkas_mhs/berkas_permohonan', $namapermohonan);
                    $filektm->move('berkas_mhs/berkas_ktm', $namaktm);
                    $filetdkmampu->move('berkas_mhs/berkas_ket_tdk_mampu', $namatdkmampu);
                    $filebeasiswalain->move('berkas_mhs/berkas_tdk_beasiswa_lain', $namabeasiswalain);
                    $filepkk->move('berkas_mhs/berkas_pkk', $namapkk);
                    $filekk->move('berkas_mhs/berkas_kk', $namakk);
                    $file_transkip->move('berkas_mhs/berkas_ipk', $nama_transkip);
                    $fileprestasi->move('berkas_mhs/berkas_prestasi', $namaprestasi);
                    $berkas_gaji_hasil_ortu->move('berkas_mhs/berkas_gaji', $berkas_gaji);
                
                

            $this->daftar->save([
                'npm' => session()->get('npm'),
                'nama_mhs' => session()->get('nama'),
                'jenkel' => session()->get('jenkel'),
                'tgl_lahir' => session()->get('tgl_lahir'),
                'tempat_lahir' => htmlspecialchars($this->request->getPost('tl')),
                'kode_prodi' => session()->get('kode_prodi'),
                'semester' => $smt,
                'no_rek_mhs' => htmlspecialchars($this->request->getPost('rekening')),
                'nama_bank' => $this->request->getPost('nama_bank'),
                'nama_rekening' => htmlspecialchars($this->request->getPost('nama_rekening')),
                'no_hp_mhs' => htmlspecialchars($this->request->getPost('hp_mhs')),
                'alamat_mhs' => htmlspecialchars($this->request->getPost('alamat_mhs')),
                'nama_ayah' => htmlspecialchars($this->request->getPost('ayah')),
                'nama_ibu' => htmlspecialchars($this->request->getPost('ibu')),
                'pkj_ayah' => htmlspecialchars($this->request->getPost('pkj_ayah')),
                'pkj_ibu' => htmlspecialchars($this->request->getPost('pkj_ibu')),
                'alamat_ortu' =>htmlspecialchars( $this->request->getPost('alamat_ortu')),
                'no_hp_ortu' => htmlspecialchars($this->request->getPost('hp_ortu')),
                'id_ipk' => htmlspecialchars($this->request->getPost('ipk')),
                'id_sdr_kdg' => htmlspecialchars($this->request->getPost('sdr_kdg')),
                'id_prestasi' => htmlspecialchars($this->request->getPost('pres_nonak')),
                'id_penghasilan' => htmlspecialchars($this->request->getPost('hasil_ortu')),
                'id_tanggungan' => htmlspecialchars($this->request->getPost('tanggungan_ortu')),

                'berkas_surat_permohonan' => $namapermohonan,
                'berkas_ktm' => $namaktm,
                'berkas_ket_tidakmampu' => $namatdkmampu,
                'berkas_tidak_adabeasiswa_lain' => $namabeasiswalain,
                'berkas_sertifikat_pkk' => $namapkk,
                'berkas_kk' => $namakk,
                'berkas_ipk' => $nama_transkip,
                'berkas_prestasi' => $namaprestasi,
                'berkas_gaji_hasil_ortu' => $berkas_gaji,
                'status_berkas' => 'B',
                'tahun_pendaftar' => date('Y'),
                'status' => 'belum diverifikasi',
                
            ]);

                    session()->setFlashdata('message_berhasil', '<div class="alert alert-success" role="alert">
                    Selamat '.session()->get('nama').'  Berhasil Mendaftar, Semoga Lulus :)) </div>');
                    return redirect()->to(base_url('Dashboard'));

            }

    }

    


    
}