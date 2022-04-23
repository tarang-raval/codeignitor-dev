 <!-- Begin Page Content -->
 <?php helper('form'); ?>
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?php echo (isset($page_title)?$page_title:''); ?></h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Upload File</h6>
    </div>
    <div class="card-body">
    <?php $validation = \Config\Services::validation(); ?>
    <!-- <form class="form"> -->
        
        <?php 
                echo form_open_multipart('upload/save')
            ?>
        <div class="form-group">
            <label for="category name">file</label>
           <input type="file" name="image" accept=".png,.jpg" >
            <?php if($validation->getError('image')) {?>
            <div class='mt-2' style="color: red;">
              <?= $error = $validation->getError('image'); ?>
            </div>
        <?php }?>
        </div>
        
        <input type="submit" name="add_category" class="btn btn-primary">
    <!-- </form> -->
    <?php echo form_close(); ?>
      
    </div>
</div>
</div>
<!-- /.container-fluid -->