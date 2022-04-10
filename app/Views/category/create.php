 <!-- Begin Page Content -->
 <?php helper('form'); ?>
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?php echo (isset($page_title)?$page_title:''); ?></h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
    </div>
    <div class="card-body">
    <?php $validation = \Config\Services::validation(); ?>
    <!-- <form class="form"> -->
        
        <?php 
            if(!empty($category)){
                echo form_open('categorycontroller/update',['id'=>"category_create"]);
             }else{
                //echo form_open('category.save',['id'=>"category_create"]);
                echo '<form action="'.route_to('category.save').'" method="post">';
             } ?>
        <div class="form-group">
            <label for="category name">Name</label>
            <?php echo form_input(array('type'=>'text','name'=>'name','id'=>'name',"class"=>'form-control',"placeholder"=>"Category Name",'value'=>(!empty($category) && !empty($category['category_name']))?$category['category_name']:(!empty($_REQUEST['name'])?$_REQUEST['name']:''))) ?>
            <?php if($validation->getError('name')) {?>
            <div class='mt-2' style="color: red;">
              <?= $error = $validation->getError('name'); ?>
            </div>
        <?php }?>
        </div>
        <input type="hidden" value="<?php echo (!empty($category) && !empty($category['id']))?$category['id']:'' ?>" name="id">
        <input type="submit" name="add_category" class="btn btn-primary">
    <!-- </form> -->
    <?php echo form_close(); ?>
      
    </div>
</div>
</div>
<!-- /.container-fluid -->