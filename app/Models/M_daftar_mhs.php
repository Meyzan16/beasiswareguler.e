<?php 

    namespace App\Models;
    use CodeIgniter\Model;

    class M_daftar_mhs extends Model{

        protected $table = 'data_mahasiswa';
        // protected $createdField ='created_at';
        // protected $updatedField ='updated_at';
        protected $primaryKey = 'id_pendaftar';
        protected $allowedFields = [
            'npm' ,
            'nama_mhs',
            'jenkel','tgl_lahir','tempat_lahir','kode_prodi','semester','no_rek_mhs','nama_bank','nama_rekening','no_hp_mhs','alamat_mhs',
            'nama_ayah','nama_ibu','pkj_ayah','pkj_ibu','alamat_ortu','no_hp_ortu','id_ipk','id_sdr_kdg','id_prestasi','id_penghasilan',
            'id_tanggungan',
            'berkas_surat_permohonan','berkas_ktm',
            'berkas_ket_tidakmampu','berkas_tidak_adabeasiswa_lain',
            'berkas_sertifikat_pkk','berkas_kk', 'berkas_ipk' ,'berkas_prestasi','berkas_gaji_hasil_ortu','status_berkas',
            'tahun_pendaftar','status'
        ];

        public function getData()
        {
            $prodi = session()->get('kode_prodi');

            $builder = $this->db->table('data_mahasiswa');
            $builder->join('data_prodi', 'data_prodi.kode_prodi = data_mahasiswa.kode_prodi');
            $builder->join('kriteria_ipk', 'kriteria_ipk.id_ipk = data_mahasiswa.id_ipk');
            $builder->join('kriteria_penghasilan_ortu', 'kriteria_penghasilan_ortu.id_penghasilan = data_mahasiswa.id_penghasilan');
            $builder->join('kriteria_prestasi_nonak', 'kriteria_prestasi_nonak.id_prestasi = data_mahasiswa.id_prestasi');
            $builder->join('kriteria_sdr_kdg', 'kriteria_sdr_kdg.id_sdr_kdg = data_mahasiswa.id_sdr_kdg');
            $builder->join('kriteria_tanggungan_ortu', 'kriteria_tanggungan_ortu.id_tanggungan = data_mahasiswa.id_tanggungan');
            $builder->where(['data_prodi.kode_prodi' => $prodi]);
            $builder->orderBy('tahun_pendaftar', 'desc');
            return $builder->get()->getResultArray();
        }

        public function whereProdi($pilihtahun)
        {
            $prodi = session()->get('kode_prodi');

            $builder = $this->db->table('data_mahasiswa');
            $builder->join('data_prodi', 'data_prodi.kode_prodi = data_mahasiswa.kode_prodi');
            $builder->join('kriteria_ipk', 'kriteria_ipk.id_ipk = data_mahasiswa.id_ipk');
            $builder->join('kriteria_penghasilan_ortu', 'kriteria_penghasilan_ortu.id_penghasilan = data_mahasiswa.id_penghasilan');
            $builder->join('kriteria_prestasi_nonak', 'kriteria_prestasi_nonak.id_prestasi = data_mahasiswa.id_prestasi');
            $builder->join('kriteria_sdr_kdg', 'kriteria_sdr_kdg.id_sdr_kdg = data_mahasiswa.id_sdr_kdg');
            $builder->join('kriteria_tanggungan_ortu', 'kriteria_tanggungan_ortu.id_tanggungan = data_mahasiswa.id_tanggungan');
            $builder->where([
                'data_mahasiswa.tahun_pendaftar' => $pilihtahun,
                'data_prodi.kode_prodi' => $prodi,
                ]);
            return $builder->get()->getResultArray();
        }

        public function whereProdiRangking($pilihtahun)
        {
            $prodi = session()->get('kode_prodi');

            $builder = $this->db->table('data_mahasiswa');
            $builder->join('data_prodi', 'data_prodi.kode_prodi = data_mahasiswa.kode_prodi');
            $builder->join('kriteria_ipk', 'kriteria_ipk.id_ipk = data_mahasiswa.id_ipk');
            $builder->join('kriteria_penghasilan_ortu', 'kriteria_penghasilan_ortu.id_penghasilan = data_mahasiswa.id_penghasilan');
            $builder->join('kriteria_prestasi_nonak', 'kriteria_prestasi_nonak.id_prestasi = data_mahasiswa.id_prestasi');
            $builder->join('kriteria_sdr_kdg', 'kriteria_sdr_kdg.id_sdr_kdg = data_mahasiswa.id_sdr_kdg');
            $builder->join('kriteria_tanggungan_ortu', 'kriteria_tanggungan_ortu.id_tanggungan = data_mahasiswa.id_tanggungan');
            $builder->where([
                'data_mahasiswa.tahun_pendaftar' => $pilihtahun,
                'data_prodi.kode_prodi' => $prodi,
                'data_mahasiswa.status_berkas' => 'Y'
                ]);
            return $builder->get()->getResultArray();
        }

        
        public function getDataBerkas($npm)
        {
            $builder = $this->db->table('data_mahasiswa');
            $builder->where(['npm' => $npm]);
            return $builder->get()->getResultArray();
        }

        public function getEdit($npm)
        {
            $builder = $this->db->table('data_mahasiswa');
            $builder->join('data_prodi', 'data_prodi.kode_prodi = data_mahasiswa.kode_prodi');
            $builder->join('kriteria_ipk', 'kriteria_ipk.id_ipk = data_mahasiswa.id_ipk');
            $builder->join('kriteria_penghasilan_ortu', 'kriteria_penghasilan_ortu.id_penghasilan = data_mahasiswa.id_penghasilan');
            $builder->join('kriteria_prestasi_nonak', 'kriteria_prestasi_nonak.id_prestasi = data_mahasiswa.id_prestasi');
            $builder->join('kriteria_sdr_kdg', 'kriteria_sdr_kdg.id_sdr_kdg = data_mahasiswa.id_sdr_kdg');
            $builder->join('kriteria_tanggungan_ortu', 'kriteria_tanggungan_ortu.id_tanggungan = data_mahasiswa.id_tanggungan');
            $builder->where(['npm' => $npm]);
            return $builder->get()->getResultArray();
        }

        public function update_data( $data, $npm){

            $buider = $this->db->table('data_mahasiswa');
            return $buider->update($data, ['npm' =>  $npm]);
        }

        public function update_sts( $data, $npm){
            $buider = $this->db->table('data_mahasiswa');
            return $buider->update($data, ['npm' =>  $npm]);
        }

        public function hapus_data($npm){
            $builder = $this->db->table('data_mahasiswa');
            return  $builder->delete(['npm' => $npm]);
        }

    }
?>