<?php 

namespace App\Models;
use CodeIgniter\Model;

class M_parameter extends Model{

    protected $table = 'data_parameter';
    protected $primaryKey = 'id_parameter';

    function __construct()
	{      
	$this->validation = \Config\Services::validation();
    $this->db = db_connect(); 
	}

    public function getData()
    {

        $builder = $this->db->table('data_parameter');
        $builder->orderBy('id_parameter', 'asc');
        return  $builder->get()->getResultArray();
        
    }

     public function updateparam($data, $id_parameter){
       
        $builder = $this->db->table('data_parameter');
        return $builder->update($data, ['id_parameter' => $id_parameter]);
        
    }


}

?>