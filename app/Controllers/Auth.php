<?php

namespace App\Controllers;
use App\Models\M_login;
use CodeIgniter\HTTP\Response;
use GuzzleHttp\Client;

class Auth extends BaseController
{
    function __construct()
	{      
    $this->login = new M_login();       
	}

    public function cek_login(){

                        $client = new Client();   
                        $res =  $client->post('https://panda.unib.ac.id/api/login', 
                                [
                                    'form_params' => [
                                        'email' => 'beasiswa.fkip@unib.ac.id', 
                                        'password' => 'J0V0vO9YCzB1' 
                                    ],
                                ]);
                        $token = json_decode($res->getBody())->token;

                        $client2 = new Client();
                        $username = $this->request->getVar('username');
                        $password = $this->request->getVar('password'); 

            
                        // $res2 = $client2->get('https://panda.unib.ac.id/panda?token='.$token.'&query={  }');

                            // cek wisuda
                            // $cek_wisuda = $client2->get('https://panda.unib.ac.id/panda?token='.$token.'&query={ 
                            //     cekwisuda(noijzMhsNiu:"G1A018086",noijzNomorSeri:"5c87774e4e99b") 
                            //     { 
                            //         is_access 
                            //     } }');
                            
                            // print_r (json_decode($cek_wisuda->getBody())->data->cekwisuda[0]->is_access);
       

                        //cek username dan password
                        $res2 = $client2->get('https://panda.unib.ac.id/panda?token='.$token.'&query={
                            portallogin(username:"'.$username.'", password: "'.$password.'") 
                            {
                            is_access
                            tusrThakrId
                            }  }');

                        $body = $res2->getBody();
                        $body_array = json_decode($body);    
                        $cek_portal = $body_array->data->portallogin[0]->is_access;

                        
                       
                        //cek jika username dan password 
                        if($cek_portal)
                        { 
                            //get Data mahasiswa
                                    $getDatamhs = $client2->get('https://panda.unib.ac.id/panda?token='.$token.'&query={ 
                                        mahasiswa(mhsNiu:"'.$username.'") {
                                            mhsNiu
                                            mhsNama
                                            mhsJenisKelamin
                                            mhsTanggalLahir
                                            mhsTanggalLulus
                                            mhsProdiKode
                                                prodi {
                                                prodiFakKode
                                                prodiKode
                                                prodiJjarKode
                                                prodiNamaResmi
                                                prodiKodeUniv
                                                    fakultas {
                                                        fakKode
                                                        fakKodeUniv
                                                        fakNamaResmi
                                                    }
                                                }
                                        }
                                }');

                                $body2 = $getDatamhs->getBody();
                                $body_array2 = json_decode($body2);

                                $npm = $body_array2->data->mahasiswa[0]->mhsNiu;  
                                $nama = $body_array2->data->mahasiswa[0]->mhsNama; 
                                $jenkel = $body_array2->data->mahasiswa[0]->mhsJenisKelamin; 
                                $tgl_lahir = $body_array2->data->mahasiswa[0]->mhsTanggalLahir;
                                $tgl_lulus = $body_array2->data->mahasiswa[0]->mhsTanggalLulus;
                                $prodiJjarKode = $body_array2->data->mahasiswa[0]->prodi->prodiJjarKode;    
                                $prodiNamaResmi = $body_array2->data->mahasiswa[0]->prodi->prodiNamaResmi; 
                                $prodiKodeUniv = $body_array2->data->mahasiswa[0]->prodi->prodiKodeUniv;
                                $fakKodeUniv = $body_array2->data->mahasiswa[0]->prodi->fakultas->fakKodeUniv;
                                $fakNamaResmi = $body_array2->data->mahasiswa[0]->prodi->fakultas->fakNamaResmi;
                                                        session()->set('cek_portal', $cek_portal);
                                                        session()->set('npm', $npm);
                                                        session()->set('nama', $nama);
                                                        session()->set('jenkel', $jenkel);
                                                        session()->set('tgl_lahir', $tgl_lahir);
                                                        session()->set('nama_prodi', $prodiNamaResmi);
                                                        session()->set('kode_prodi', $prodiKodeUniv);
                                                        session()->set('kode_fak', $fakKodeUniv);
                                                        session()->set('nama_fak', $fakNamaResmi);

                            //cek wisuda atau belum, kalo null bearti belum
                            if($tgl_lulus == null){
                                // cek strata jika s1 dan d3 dibolehkan
                                if(($prodiJjarKode == 'S1')){
                                    //cek kode fakultas
                                    if($fakKodeUniv == 'G'){

                                        $query = $this->db->query("SELECT * FROM data_mahasiswa WHERE npm='$username' ")->getRow(); 

                                            //cek jika sudah terdaftar jalankan kondisi berikutnya
                                            if($cek_portal == $query){ 
                                                    $date = date('Y'); 
                                                    //jika sudah terdaftar ditahun ini dan status nya lolos tidak bisa login                             
                                                    if(($username == $query->npm) && ($query->status == 'lolos')) {                                        
                                                                session()->setFlashdata('massage', '<div class="alert alert-danger" role="alert">
                                                                MAAF NPM  '.$username.' SUDAH MENDAFATKAN BEASISWA </div>');
                                                                return redirect()->to(base_url('Home'));
                                                    } 
                                                    else if(($username == $query->npm) && ($query->tahun_pendaftar == $date) && ($query->status == 'belum lolos')){
                                                        session()->setFlashdata('massage', '<div class="alert alert-danger" role="alert">
                                                        MOHON MAAF  '.$username.' ANDA BELUM LOLOS, SILAHKAN DAFTAR DI TAHUN DEPAN </div>');
                                                        return redirect()->to(base_url('Home'));
                                                        
                                                    } 
                                                    else if(($username == $query->npm) && ($query->tahun_pendaftar == $date) && ($query->status == 'belum diverifikasi')  && ($query->status_berkas == 'Y')){
                                                        session()->setFlashdata('massage', '<div class="alert alert-danger" role="alert">
                                                        DATA ANDA SUDAH DIVERIFIKASI DAN BENAR MOHON BERSABAR, PENGUMUMAN AKAN DI UMUMKAN DIWEBSITE INI </div>');
                                                        return redirect()->to(base_url('Home'));
                                                    }
                                                    else if(($username == $query->npm) && ($query->tahun_pendaftar == $date) && ($query->status == 'belum diverifikasi')  && ($query->status_berkas == 'N')){
                                                                session()->setFlashdata('message', '<div class="alert alert-success" role="alert">
                                                                MOHON '.session()->get('nama').' SILAHKAN PERBAIKI FILE ANDA, BACA PESAN KESALAHAN  </div>');
                                                                return redirect()->to(base_url('Dashboard'));
                                                                session()->set('status_berkas', 'N');
                                                    }else if(($username == $query->npm) && ($query->tahun_pendaftar == $date) && ($query->status == 'belum diverifikasi')  && ($query->status_berkas == 'B')){
                                                        session()->setFlashdata('massage', '<div class="alert alert-danger" role="alert">
                                                        DATA '.session()->get('npm').' SUDAH TERDAFTAR, MOHON HUBUNGI PRODI UNTUK VERIFIKASI DATA </div>');
                                                        return redirect()->to(base_url('Home'));
                                                    }   
                                                   
                                                    else {                                                                                                               
                                                                session()->setFlashdata('message', '<div class="alert alert-success" role="alert">
                                                                SELAMAT DATANG '.session()->get('nama').'  </div>');
                                                                return redirect()->to(base_url('Dashboard'));
                                                    }
                                                }
                                                    //jika belum terdaftar jalankan script ini
                                                        else{                                                          
                                                            session()->setFlashdata('message', '<div class="alert alert-success" role="alert">
                                                            SELAMAT DATANG '.session()->get('nama').'  </div>');
                                                            return redirect()->to(base_url('Dashboard'));                                                           
                                                        }
                                    }else {
                                        session()->setFlashdata('massage', '<div class="alert alert-danger" role="alert">
                                        PENDAFTARAN BEASISWA KHUSUS MAHASISWA TEKNIK UNIB </div>');
                                        return redirect()->to(base_url('Home'));
                                    }  
    
                                }else{
                                    session()->setFlashdata('massage', '<div class="alert alert-danger" role="alert">
                                        MAAF BEASISWA KHUSUS STRATA S1 DAN D3 </div>');
                                        return redirect()->to(base_url('Home'));
    
                                }

                            }else{
                                    session()->setFlashdata('massage', '<div class="alert alert-danger" role="alert">
                                    MAHASISWA NPM '.$username.' SUDAH LULUS </div>');
                                    return redirect()->to(base_url('Home'));
                            }

                        } else
                            {       
                                    session()->setFlashdata('massage', '<div class="alert alert-danger" role="alert">
                                    USERNAME DAN PASSWORD SALAH </div>');
                                    return redirect()->to(base_url('Home'));
                            }
                    

           
    }
        public function logout(){
           // session()->remove('prodiJjarKode');
           session()->remove('cek_portal');
           session()->remove('status_berkas');
            session()->remove('npm');
            session()->remove('nama');
            session()->remove('jenkel');
            session()->remove('tgl_lahir');
            session()->remove('nama_prodi');
            session()->remove('kode_prodi');
            session()->remove('kode_fak');
            session()->remove('nama_fak');
            session()->setFlashdata('massage', '<div class="alert alert-success" role="alert">
                Anda Berhasil Logout</div>');
            return redirect()->to(base_url('Daftar_beasiswa'));

        }
}

    
    
