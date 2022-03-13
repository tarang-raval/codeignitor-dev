<?php
    include 'layout/header.php';
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>
                     <a href="<?php echo base_url('page/list') ?>"><button class="btn btn-success"> Add</button></a>
                     <?php echo anchor('page/list', '<span>Add</span>', array('title' => 'The best news!',"class"=>"btn btn-primary")); ?>
                <?php
                    $atts = array(
                        'width'       => 800,
                        'height'      => 600,
                        'scrollbars'  => 'yes',
                        'status'      => 'yes',
                        'resizable'   => 'yes',
                        'screenx'     => 0,
                        'screeny'     => 0,
                        'window_name' => '_blank'
                );
                
                echo anchor_popup('news/local/123', 'Click Me!', $atts);



                $title = "What's wrong with CSS?";
                echo $url_title = url_title($title,'/',true);
                ?>
                </div>
                <!-- /.container-fluid -->
 <?php
    include 'layout/footer.php';
?>