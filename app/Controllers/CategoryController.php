<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category ;
use stdClass;

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
        $data['validation']=new stdClass();
        echo view ('layout/header',$data);
        echo view ('category/create',$data);
        echo view('layout/footer');
    }
    function save(){   
        
        
        $model = model(Category::class);
        helper(['form', 'url']);

      /*   $input = $this->validate([
            'name' => 'required|min_length[3]|is_unique[categories.category_name]',
        ]); */
        $input = $this->validate([
            'name' => [
                'rules'  => 'required|is_unique[categories.category_name]',
                'errors' => [
                    'required' => 'You must be enter category name.',
                    'is_unique'=>"category name is alrady available."
                ],
            ],
        ]);

        if (!$input) {
            $data['page_title']="Category";
            $data['validation']=$this->validator;
            echo view ('layout/header',$data);
            echo view ('category/create',$data);
            echo view('layout/footer');
            
        }else{
            $name=$this->request->getVar('name');
            $data=['category_name'=>$name];
            $model->save($data);
            return redirect()->to('/categorycontroller/index');
        }







        //$validation =  \Config\Services::validation();
        //$request = \Config\Services::request();
       
   // if($request->getMethod()=='post'){
       /*  $validation->setRule('name', 'category Name', 'required|alpha_space|min_length[8]|max_length[8]');

       if($validation->withRequest($request)->run()==FALSE)
        {
            $data['page_title']="Category";
            $data['validation']=$validation;
            echo view ('layout/header',$data);
            echo view ('category/create',$data);
            echo view('layout/footer');
        }else{
        $name=$request->getVar('name');
        $data=['category_name'=>$name];
        $model->save($data);
        //return redirect()->to('/categorycontroller/index');
        }
    }
    else{
        $data['page_title']="Category";
        $data['validation']=$validation;
        echo view ('layout/header',$data);
        echo view ('category/create',$data);
        echo view('layout/footer');
    } */







   // }
    }
    // http://localhost:8080/categorycontroller/edit/{id}? name='sss'
function edit($id){
         
        //echo $id;
         $id=$this->request->uri->getSegment(3);
       // echo $this->request->getVar('name');
       $model = model(Category::class);
       // select * from categoer where id=1
       $data['category']=$model->find($id);
       $data['page_title']="Category";
       $data['validation']=new stdClass();
       echo view ('layout/header',$data);
       echo view ('category/create',$data);
       echo view('layout/footer');




    }
    function update(){

        $model = model(Category::class);
        helper(['form', 'url']);
        // select * from categtory where category_name="abc" and id!="5"
        $id=$this->request->getVar('id');
        $input = $this->validate([
            'name' => [
                'rules'  => 'required|is_unique[categories.category_name,id,'.$id.']',
                'errors' => [
                    'required' => 'You must be enter category name.',
                    'is_unique'=>"category name is alrady available."
                ],
            ],
        ]);

        if (!$input) {
            $data['page_title']="Category";
            $data['validation']=$this->validator;
            echo view ('layout/header',$data);
            echo view ('category/create',$data);
            echo view('layout/footer');
            
        }else{
            $name=$this->request->getVar('name');
            $data2=['category_name'=>$name];
            
            //$this->db->update('mytable', $data);
            $model->update($id,$data2);
            return redirect()->to('/categorycontroller/index');
        }


    }
    function delete($id){

        $category=new Category();
        if($category->find($id)){
            // delete from category where id=
            if($category->where('id',$id)->delete()){
                return redirect()->to('/categorycontroller/index');
            }
        }else{
            return redirect()->to('/categorycontroller/index');
        }
        


    }
}
