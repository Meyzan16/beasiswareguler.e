<?php 

namespace App\Models;
use CodeIgniter\Model;

class M_verifikator extends Model{

    protected $table = 'user_role';
    protected $primaryKey = 'id_role';
    protected $allowedFields = ['nama_user', 'username' ,'password','kode_prodi','role_id']; 

    function __construct()
	{      
	$this->validation = \Config\Services::validation();
    $this->db = db_connect(); 
	}

    public function getData()
    {

        $builder = $this->db->table('user_role');
        $builder->join('data_prodi', 'data_prodi.kode_prodi = user_role.kode_prodi');
        $builder->orderBy('id_role', 'desc');
        return  $builder->get()->getResultArray();
        
    }

     public function updateverifi($data, $id_role){
       
        $builder = $this->db->table('user_role');
        return $builder->update($data, ['id_role' => $id_role]);
        
    }

    public function hapus($id_role){
        
        $builder = $this->db->table('user_role');
        return $builder->delete(['id_role' => $id_role]);
    }

}

?>