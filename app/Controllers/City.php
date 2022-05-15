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

       // $citySingleRow=$cityModel->find([1,2,3]);  // primary column    // select * from city where city_id=1   // city_id in (1,2,3)
       $cities=$cityModel->onlyDeleted()->findAll();
        echo "<pre>";
        print_r($cities);
        exit;
        
    }
     public function insert(){
        $cityModel = new Cities();
        $data=[
            'city_name'=>'vadodara'
        ];
        $s=$cityModel->insert($data);
        if($s){
           echo $cityModel->insertID();
           echo $cityModel->affectedRows();
        }

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
     function search(){
        $cityModel = new Cities();

        //$data=  $cityModel->where('city_name','Vadodara')->findAll();   // where city_name='vadodara'
        $data=  $cityModel->where(['city_id >'=>5])->orWhere('city_id',1)->getCompiledSelect();   // where city_name='vadodara' and city_id=6
        $data=  $cityModel->where(['city_id >'=>5])->WhereNotIn('city_id',[1])->getCompiledSelect();   // where city_name='vadodara' and city_id=6


        // In whereIn/ orWhereIN
        // Not In whereNotIn/ orWhereNotIN
        // Not In whereNotIn/ orWhereNotIN

        // between
        //echo $cityModel->where('city_id between 1  and 5 ',null,false)->getCompiledSelect();

         // like 
         echo $cityModel->like('city_name','va')->getCompiledSelect();
         echo $cityModel->where('city_name like "%_va%"',null)->getCompiledSelect();
         echo "<pre>";
         /* $db      = \Config\Database::connect();
         $s=$db->query('select * from city');
           print_r($s->getResultArray()); */
           print_r($cityModel->getallData());
     }

     function addtrans(){
          
      $cityModel=new Cities();
      //echo $cityModel->addtrans();
      echo '<pre>';
      //print_r($cityModel->getFieldNames('city'));
      //print_r($cityModel->getFieldData('city'));
      //print_r($cityModel->findAll());
      foreach($cityModel->findAll() as $c ){


         echo ($c->getCityName());
      }

     }
     
   
}
