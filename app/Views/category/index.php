 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?php echo (isset($page_title)?$page_title:''); ?></h1>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Category</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 mb-4 pull-right">
                <!-- <a href=""><button class="btn btn-primary">Add Category</button></a> -->
                <?php echo anchor('categorycontroller/create', 'Add Category', array('title' => '',"class"=>"btn btn-primary")); ?>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Action</th>
                        
                    </tr>
                </tfoot>
               <tbody>
                   <?php 
                    if(!empty($categories)){
                        foreach($categories as $category){
                        ?>
                        <tr>
                            <td><?php echo $category['category_name'] ?></td>
                            <td>
                            <?php echo anchor('categorycontroller/edit/'.$category['id'], 'Edit', array('title' => '',"class"=>"")); ?>
                            <?php echo anchor('categorycontroller/delete/'.$category['id'], 'Delete', array('title' => '',"class"=>"")); ?>
                        </td>
                        </tr>
                        <?php
                        }
                    }else{
                        ?>

                        <tr>
                            <td colspan="2">No record found</td>
                        </tr>
                    <?php
                    }
                   ?>
               </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->