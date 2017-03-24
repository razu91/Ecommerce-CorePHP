<?php
require 'functions.php';
$query_result = select_all_product_info();
//    while ($row=  mysqli_fetch_assoc($query_result) ) {
//        echo '<pre>';
//        print_r($row);
//    }
?>
<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Product Name</th>
                        <th>Category Name</th>
                        <th>Manufacturer Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Product Image</th>
                        <th>Publication Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php $i = 1;
                    while ($product_info = mysqli_fetch_assoc($query_result)) { ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $product_info['product_name']; ?></td>
                            <td><?php echo $product_info['category_name']; ?></td>
                            <td><?php echo $product_info['manufacture_name']; ?></td>
                            <td><?php echo $product_info['product_price']; ?></td>
                            <td class="center"><?php echo $product_info['product_quantity']; ?></td>
                            <td class="center">
                                <img src="<?php echo $product_info['product_image']; ?>" alt="name" height="50" width="50"> 
                            </td>
                            <td class="center">
                                <?php
                                if ($product_info['publication_status'] == 1) {
                                    echo 'Published';
                                } else {
                                    echo "Unpublished";
                                }
                                ?>
                            </td>
                            <td class="center">
                                <a class="btn btn-success" href="#" title="View Product">
                                    <i class="halflings-icon white zoom-in"></i>  
                                </a>
                                <a class="btn btn-success" href="#" title="Published Product">
                                    <i class="halflings-icon white arrow-up"></i>  
                                </a>
                                <a class="btn btn-info" href="#" title="Edit Product">
                                    <i class="halflings-icon white edit"></i>  
                                </a>
                                <a class="btn btn-danger" href="#" title="Delete Product">
                                    <i class="halflings-icon white trash"></i> 
                                </a>
                            </td>
                        </tr>
    <?php $i++;
} ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div>