<?php

namespace App\Models;

use CodeIgniter\Model;

class City extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'city';
    protected $primaryKey       = 'city_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = \App\Entities\CityEntity::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['city_name'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
            'city_name'     => 'required'
            ];
    protected $validationMessages   = [ 'city_name' => [
                    'required'    => 'You must choose a city name.',
                ]
            ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['beforecityinsert'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

     function beforecityinsert(array $data){
         
        $data['data']['city_name']="CITY_".$data['data']['city_name'];
        return $data;
     }


     function getallData(){
            $r=$this->db->query('select * from city');
            return $r->getResultArray();
     }
     function addtrans(){
         $status;
         try{
         $countryModel=new Country();
        $this->db->transBegin();

        $this->insert(['city_name'=>'askjdasf']);
        $countryModel->insert(['name'=>1923]);
        if ($this->db->transStatus() === false) {
            $this->db->transRollback();
            
            
        } else {
            $this->db->transCommit();
            $status=1;
        } 
        }
        catch(\Exception $exception){
            return $exception->getMessage();
        }
        return $status;
     }
     
}
