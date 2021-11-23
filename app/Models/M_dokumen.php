<?php

namespace App\Models;

use CodeIgniter\Model;

class M_dokumen extends Model
{
    
    protected $table = 'data_dokumen';
    protected $primaryKey = 'id_dokumen';
    protected $allowedFields = ['judul_dokumen','upload_file'];


    public function getdokumen()
    {
        
        $builder = $this->db->table('data_dokumen');
        $builder->orderBy('id_dokumen', 'desc');
        return $builder->get()->getResultArray();  
    }

    public function updatedokumen($data, $id_dokumen){
       
        $builder = $this->db->table('data_dokumen');
        return $builder->update($data, ['id_dokumen' => $id_dokumen]);
        
    }

    public function hapusfileFolder($id_dokumen){
        $builder = $this->db->table('data_dokumen');
        $builder->where(['id_dokumen' => $id_dokumen]);
        return $builder->get()->getRow();
    }


    public function hapusdokumen($id_dokumen)
    {
       $builder = $this->db->table('data_dokumen');
       return $builder->delete(['id_dokumen' => $id_dokumen]);
    }


}