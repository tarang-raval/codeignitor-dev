<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\City as Cities;

class City extends BaseController
{
    public function index()
    {
        //
        $cityModel = new Cities();

       // $citySingleRow=$cityModel->find([1,2,3]);
       $cities=$cityModel->onlyDeleted()->findAll();
        echo "<pre>";
        print_r($cities);
        exit;
        
    }
     public function insert(){
        $cityModel = new Cities();
        $data=[
            'city'=>'nbame'
        ];
        $s=$cityModel->insert($data);

        var_dump($cityModel->errors());
        
     }
     public function update(){
        $cityModel = new Cities();
        $data=[
            'city_name'=>'sdfsfsdfsdf'
        ];
        $s=$cityModel->update(3,$data);

        var_dump($s);
        
     }

     public function delete(){
        $cityModel = new Cities();
       
        $s=$cityModel->delete(4);

        var_dump($s);
        
     }
     
   
}
