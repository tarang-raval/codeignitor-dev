<?php

namespace App\Controllers;

use App\Models\NewsModel;

class Page extends BaseController
{
    
    public function index()
    {
       // $this->load->helper('url');

      /* echo base_url();
       echo "<br/>";
       echo site_url();
       exit;*/
       // view page
        
        
        echo view('blank.php');
        //echo view('layout/footer');
         //redirect('/home');
    }
    public function list(){
        $model = model(NewsModel::class);
        $m=$model->findAll();  // select * from news
        $data['newsModel']=$m;
        $data['page_title']="List";
        echo view ('layout/header',$data);
        echo view('page/index',$data);
        echo view('layout/footer');
    }
}


