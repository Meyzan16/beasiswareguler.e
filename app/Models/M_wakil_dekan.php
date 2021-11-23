<?php

namespace App\Models;
use CodeIgniter\Model;

class M_wakil_dekan extends Model
{
    
    protected $primaryKey = 'nip';

    public function getData()
    {
        
        $builder = $this->db->table('data_wd');
        return $builder->get()->getResultArray();  
    }

    public function updatedata($data, $nip){
       
        $builder = $this->db->table('data_wd');
        return $builder->update($data, ['nip' => $nip]);
        
    }


}