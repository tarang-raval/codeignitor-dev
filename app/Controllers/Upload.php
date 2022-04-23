<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Files\File;
use stdClass;

class Upload extends BaseController
{
    public function index()
    {
        //

    }


    public function  create(){

        $data['page_title']="Upload form";
        $data['validation']=new stdClass();
        echo view ('layout/header',$data);
        echo view ('fileupload/create',$data);
        echo view('layout/footer');
    }
    function save(){   
    
        //$model = model(Category::class);
        helper(['form', 'url']);
        $input = $this->validate([
            'image' => [
                'rules'  => 'uploaded[image]|is_image[image]|mime_in[image,image/png,image/jpeg]|max_size[image,10]',
            ],
        ]);
        if (!$input) {
            
            $data['page_title']="Upload form";
            $data['validation']=$this->validator;
            echo view ('layout/header',$data);
            echo view ('fileupload/create',$data);
            echo view('layout/footer');
        }else{
            echo WRITEPATH;
            $file=$this->request->getFile('image');
            if (!empty($file)) {
                echo $file->getSizeByUnit('mb');
                $newName = $file->getRandomName();
                $filepath=$file->move(WRITEPATH . 'uploads/images',$newName);
            //$filepath = WRITEPATH . 'uploads/images/' . $file->store();

            $data = ['uploaded_flleinfo' => new File($filepath)];

             
            }
        }

     


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

        

    }
    function delete($id){

    


    }
}
