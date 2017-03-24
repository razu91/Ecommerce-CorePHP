<?php
if (isset($_GET['name'])) {
    $id = $_GET['id'];
    $message = $obj_admin->delete_category($id);
}

$query_result = $obj_admin->select_all_order_info();

//while ($order_info=  mysqli_fetch_assoc($query_result)) {
//    echo '<pre>';
//    print_r($order_info);
//}
//
//exit();
?>




<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Order Forms</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
<?php
if (isset($message)) {
    echo $message;
}
?>
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            }
            ?>



            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Order Total</th>
                        <th>Order Status</th>
                        <th>Payment Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
<?php while ($order_info = mysqli_fetch_assoc($query_result)) { ?>
                        <tr>
                            <td> <?php echo $order_info['order_id']; ?></td>
                            <td class="center"> <?php echo $order_info['first_name'] . ' ' . $order_info['last_name']; ?></td>
                            <td class="center"> <?php echo $order_info['order_total']; ?></td>
                            <td class="center"> <?php echo $order_info['order_status']; ?></td>
                            <td class="center"> <?php echo $order_info['payment_status']; ?></td>
                            <td class="center">
                                <a class="btn btn-info" href="view_order.php?order_id=<?php echo $order_info['order_id']; ?>" title="View Order">
                                    <i class="halflings-icon white zoom-in"></i>  
                                </a>
                                <a class="btn btn-info" href="" title="View Invoice">
                                    <i class="halflings-icon white zootool"></i>  
                                </a>
                                <a class="btn btn-info" href="" title="Download Invoice">
                                    <i class="halflings-icon white zootool"></i>  
                                </a>
                                <a class="btn btn-info" href="" title="Edit Order">
                                    <i class="halflings-icon white edit"></i>  
                                </a>
                                <a class="btn btn-danger" href="" onclick=" return checkDelete();">
                                    <i class="halflings-icon white trash"></i> 
                                </a>
                            </td>
                        </tr>
<?php } ?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div><!--/row-->