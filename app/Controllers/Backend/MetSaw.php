<?php 

namespace App\Controllers\Backend;
use App\Controllers\BaseController;
use App\Models\M_daftar_mhs;

class Metsaw extends BaseController{

    function __construct()
    {
        $this->daftar = new M_daftar_mhs;
    }

    public function index(){
        if(session()->get('username')=='')  {
            session()->setFlashdata('massage', '<div class="alert alert-danger" role="alert">
            Silahkan Login </div>');
            return redirect()->to(base_url('Rumahku')); 
        } else{ 
            
            $data = $this->daftar->getData();
            $pilihtahun = $this->request->getPost('tahun');
            $data = [
                'title' => "BEASISWA",
                'sub_title' => "Hasil Rangking Data Beasiswa",
                'pendaftar' => $data,
                'pilih_tahun' => $pilihtahun,
                'tahunn' => null,
                'isi' => 'admin/pendaftar/v_rangking',
            ];
    
            echo view('Admin/layout_backend/v_wrapper', $data);


        }
    }

    
    public function pilih_tahun(){

        // if(!isset($_POST['cari'])) {

        // } else {

        // }
            $pilihtahun = $this->request->getPost('tahun');
           
            //mencari nilai maksimal dahulu
            $max_ipk = $this->db->query("SELECT MAX(bobot_ipk) as ipk from kriteria_ipk JOIN data_mahasiswa 
            ON data_mahasiswa.id_ipk = kriteria_ipk.id_ipk WHERE tahun_pendaftar = '$pilihtahun' AND status_berkas='Y' ")->getrow();
            
            // print_r($max_ipk);
            // die();

            $max_prestasi = $this->db->query("SELECT MAX(bobot_pres) as prestasi from kriteria_prestasi_nonak JOIN 
            data_mahasiswa
            ON data_mahasiswa.id_prestasi = kriteria_prestasi_nonak.id_prestasi WHERE tahun_pendaftar = '$pilihtahun' AND status_berkas='Y' ")->getrow();

            $min_penghasilan = $this->db->query("SELECT MIN(bobot_penghasilan) as penghasilan from kriteria_penghasilan_ortu JOIN data_mahasiswa
            ON data_mahasiswa.id_penghasilan = kriteria_penghasilan_ortu.id_penghasilan WHERE tahun_pendaftar = '$pilihtahun' AND status_berkas='Y' ")->getrow();

            $max_tanggungan = $this->db->query("SELECT MAX(bobot_tanggungan) as tanggungan from kriteria_tanggungan_ortu JOIN data_mahasiswa
            ON data_mahasiswa.id_tanggungan = kriteria_tanggungan_ortu.id_tanggungan WHERE tahun_pendaftar = '$pilihtahun' AND status_berkas='Y' ")->getrow();

            $max_sdr_kdg = $this->db->query("SELECT MAX(bobot_sdr_kdg) as sdr_kdg from kriteria_sdr_kdg JOIN data_mahasiswa
            ON data_mahasiswa.id_sdr_kdg = kriteria_sdr_kdg.id_sdr_kdg WHERE tahun_pendaftar = '$pilihtahun' AND status_berkas='Y'")->getrow();
            $data = array();

            
            // print_r($min_penghasilan);
            // print_r($max_sdr_kdg);
            // print_r($max_ipk);
            // print_r($max_prestasi);
            

            $data = $this->daftar->whereProdiRangking($pilihtahun);
            //Ambil data bobot dari parameter
            $where_bobot = $this->db->query("SELECT * FROM data_parameter")->getResultArray();      
            for($i = 0; $i < sizeof($data); $i++){
                // Mulai perhitungan
                $now_ipk = $data[$i]['bobot_ipk'] / $max_ipk->ipk; //Benefiit
                $now_prestasi = $data[$i]['bobot_pres'] / $max_prestasi->prestasi; //Benefiit
                $now_penghasilan = $min_penghasilan->penghasilan / $data[$i]['bobot_penghasilan'] ; //Cost
                $now_tanggungan = $data[$i]['bobot_tanggungan'] / $max_tanggungan->tanggungan; //Benefiit
                $now_sdr_kdg = $data[$i]['bobot_sdr_kdg'] / $max_sdr_kdg->sdr_kdg; //Benefiit
                

                $preferensi = ($now_ipk * ($where_bobot[0]['bobot_prm'] ) ) + 
                              ($now_prestasi * ($where_bobot[1]['bobot_prm'] ) ) + 
                              ($now_penghasilan * ($where_bobot[2]['bobot_prm'] ) ) +
                              ($now_tanggungan * ($where_bobot[3]['bobot_prm'] ) )+ 
                              ($now_sdr_kdg * ($where_bobot[4]['bobot_prm'] ) );
                
                //perhitungan selesai

                $data[$i]["preferensi"] = number_format((float)$preferensi, 3, '.', '');              
            }
            $data = $this->sort_multi_array($data, "preferensi");       
            for ($i = 0; $i < sizeof($data); $i++) {
            $data[$i]['preferensi'] = "" . ($i + 1) . "(" . $data[$i]['preferensi'] . ")";
            }

             if($pilihtahun){
                $tahuntlahdipilih = $this->daftar->whereProdiRangking($pilihtahun);
                $data = array (
                    'title' => "BEASISWA",
                    'sub_title' => "Hasil Rangking Data Beasiswa",
                    'pendaftar' => $data,
                    'pilih_tahun' => $pilihtahun,
                    'tahunn' => $tahuntlahdipilih,
                    'isi' => 'admin/pendaftar/v_rangking',
                    ) ;
                    
                    echo view('Admin/layout_backend/v_wrapper', $data);           
                }
            }

            
                public function verifikasi($npm){
                                        $data = [
                                            'status' => 'lolos',
                                            'updated_at' => date('Y-m-d  h:i:s')
                                        ];
                                
                                        $this->daftar->update_sts($data, $npm);
                    
                                        session()->setFlashdata('massage', '<div class="alert alert-success" role="alert">
                                        Data Berhasil Diverifikasi </div>');
                                        return redirect()->to(base_url('Backend/MetSaw'));    
                }

                public function tolak($npm){

                    $data = [
                        'status' => 'belum lolos',
                        'updated_at' => date('Y-m-d  h:i:s')
                    ];

                    $this->daftar->update_sts($data, $npm);

                    session()->setFlashdata('massage', '<div class="alert alert-success" role="alert">
                    Status '.$npm.' Berhasil Di Perbarui </div>');
                    return redirect()->to(base_url('Backend/MetSaw'));
            }


    function sort_multi_array($array, $key)
            {
                $keys = array();
                for ($i = 1; $i < func_num_args(); $i++) {
                    $keys[$i - 1] = func_get_arg($i);
                }

                // create a custom search function to pass to usort
                $func = function ($a, $b) use ($keys) {
                    for ($i = 0; $i < count($keys); $i++) {
                        if ($a[$keys[$i]] != $b[$keys[$i]]) {
                            return ($a[$keys[$i]] < $b[$keys[$i]]) ? -1 : 1;
                        }
                    }
                    return 0;
                };

                usort($array, $func);

                return array_reverse($array);
    }

    



}

?>