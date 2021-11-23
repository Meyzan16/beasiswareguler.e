<?php

namespace App\Models;
use CodeIgniter\Model;
use GuzzleHttp\Client;

class M_jejak_pembukaan extends Model
{
    protected $table = 'jejak_pembukaan';
    
    protected $allowedFields = ['judul', 'tanggal_mulai', 'tanggal_selesai', 'status', 'upload_file'];

    public function getData()
    {
        $builder = $this->db->table('jejak_pembukaan');
        $builder->orderBy('id_jejak', 'desc');
        return $builder->get()->getResultArray();
    }

    public function updateData($data, $id_jejak){
       
      return $this->db->table('jejak_pembukaan')->update($data, ['id_jejak' => $id_jejak]);
    }

}
