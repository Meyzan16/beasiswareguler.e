<?php 

    namespace App\Models;
    use CodeIgniter\Model;

    class M_laporan extends Model{

        
        protected $table = 'data_mahasiswa';
        protected $primaryKey = 'npm';

        public function getData()
        {

            $builder = $this->db->table('data_mahasiswa');
            $builder->join('data_prodi', 'data_prodi.kode_prodi = data_mahasiswa.kode_prodi');
            $builder->join('kriteria_ipk', 'kriteria_ipk.id_ipk = data_mahasiswa.id_ipk');
            $builder->join('kriteria_penghasilan_ortu', 'kriteria_penghasilan_ortu.id_penghasilan = data_mahasiswa.id_penghasilan');
            $builder->join('kriteria_prestasi_nonak', 'kriteria_prestasi_nonak.id_prestasi = data_mahasiswa.id_prestasi');
            $builder->join('kriteria_sdr_kdg', 'kriteria_sdr_kdg.id_sdr_kdg = data_mahasiswa.id_sdr_kdg');
            $builder->join('kriteria_tanggungan_ortu', 'kriteria_tanggungan_ortu.id_tanggungan = data_mahasiswa.id_tanggungan');
            $builder->where([
                'data_mahasiswa.status' => 'lolos'
                ]);
            $builder->orderBy('npm', 'desc');
            return $builder->get()->getResultArray();
        }

        public function where($pilihtahun, $kategori)
        {
            //$role_id = session()->get('role_id');

            $builder = $this->db->table('data_mahasiswa');
            $builder->join('data_prodi', 'data_prodi.kode_prodi = data_mahasiswa.kode_prodi');
            $builder->join('kriteria_ipk', 'kriteria_ipk.id_ipk = data_mahasiswa.id_ipk');
            $builder->join('kriteria_penghasilan_ortu', 'kriteria_penghasilan_ortu.id_penghasilan = data_mahasiswa.id_penghasilan');
            $builder->join('kriteria_prestasi_nonak', 'kriteria_prestasi_nonak.id_prestasi = data_mahasiswa.id_prestasi');
            $builder->join('kriteria_sdr_kdg', 'kriteria_sdr_kdg.id_sdr_kdg = data_mahasiswa.id_sdr_kdg');
            $builder->join('kriteria_tanggungan_ortu', 'kriteria_tanggungan_ortu.id_tanggungan = data_mahasiswa.id_tanggungan');
            $builder->where([
                'data_mahasiswa.tahun_pendaftar' => $pilihtahun,
                'data_mahasiswa.status' => $kategori
                ]);
            return $builder->get()->getResultArray();
        }

        

        

        
        

        

    }
?>