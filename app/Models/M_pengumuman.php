<?php

namespace App\Models;
use CodeIgniter\Model;

class M_pengumuman extends Model
{
    
    protected $primaryKey = 'id_pengumuman';

    public function getData()
    {
        
        $builder = $this->db->table('data_pengumuman');
        $builder->orderBy('id_pengumuman', 'desc');
        return $builder->get()->getResultArray();  
    }

    public function updatedata($data, $id_pengumuman){
       
        $builder = $this->db->table('data_pengumuman');
        return $builder->update($data, ['id_pengumuman' => $id_pengumuman]);
        
    }


}