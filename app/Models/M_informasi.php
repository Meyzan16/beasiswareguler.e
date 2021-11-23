<?php

namespace App\Models;

use CodeIgniter\Model;

class M_informasi extends Model
{
    
    protected $table = 'data_informasi';
    protected $useTimestamps = true; 
    protected $createdField = 'created_at';

    public function getData()
    {
        
        $builder = $this->db->table('data_informasi');
        return $builder->get()->getResultArray();  
    }

    public function getEdit($id_informasi)
    {
        
        $builder = $this->db->table('data_informasi');
        $builder->where(['id_informasi' => $id_informasi]);
        return $builder->get()->getResultArray();
    }

    public function updateinformasi($data, $id_informasi){      
        $builder = $this->db->table('data_informasi');
        return $builder->update($data, ['id_informasi' => $id_informasi]);    
    }

}