<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category ;

class CategoryController extends BaseController
{
    public function index()
    {
        //

        $model = model(Category::class);
        $m=$model->findAll(); 
        $data['categories']=$m;
        $data['page_title']="Category";
        echo view ('layout/header',$data);
        echo view ('category/index',$data);
        echo view('layout/footer');
    }


    public function  create(){

        $data['page_title']="Category";
        echo view ('layout/header',$data);
        echo view ('category/create',$data);
        echo view('layout/footer');
    }
    function save(){    
        $model = model(Category::class);
       
        $name=$this->request->getVar('name');
        $data=['category_name'=>$name];
        $model->save($data);
        return redirect()->to('/categorycontroller/index');
    }
}
