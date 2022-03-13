

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?php echo (isset($page_title)?$page_title:''); ?></h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>title</th>
                                            <th>Text</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>title</th>
                                            <th>Text</th>
                                            
                                        </tr>
                                    </tfoot>
                                   <tbody>
                                       <?php 
                                        if(!empty($newsModel)){
                                            foreach($newsModel as $news){
                                            ?>
                                            <tr>
                                                <td><?php echo $news['title'] ?></td>
                                                <td><?php echo $news['text'] ?></td>
                                            </tr>
                                            <?php
                                            }
                                        }
                                       ?>
                                   </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

           