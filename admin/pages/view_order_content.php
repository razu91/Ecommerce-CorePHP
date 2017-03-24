<?php
$order_id = $_GET['order_id'];

$query_result = $obj_admin->select_customer_info_by_order_id($order_id);
$customer_info = mysqli_fetch_assoc($query_result);
//    echo '<pre>';
//    print_r($customer_info);
//    exit();
$query_result1 = $obj_admin->select_shipping_info_by_order_id($order_id);
$shipping_info = mysqli_fetch_assoc($query_result1);

$query_result2 = $obj_admin->select_product_info_by_order_id($order_id);
//    while ($product_info=mysqli_fetch_assoc($query_result2) ) { 
//        echo '<pre>';
//        print_r($product_info);
//    }
//    exit();
?>

<div class="row">
    <div class="well">
        <h3>Customer Info</h3>
        <hr/>
        <table class="table table-bordered">
            <tr>
                <th>Customer Name</th>
                <td><?php echo $customer_info['first_name'] . ' ' . $customer_info['last_name']; ?></td>
            </tr>
            <tr>
                <th>Email Address</th>
                <td><?php echo $customer_info['email_address']; ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo $customer_info['address']; ?></td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td><?php echo $customer_info['phone_number']; ?></td>
            </tr>
            <tr>
                <th>City</th>
                <td><?php echo $customer_info['city']; ?></td>
            </tr>
            <tr>
                <th>Country</th>
                <td><?php echo $customer_info['country']; ?></td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="well">
        <h3>Shipping Info</h3>
        <hr/>
        <table class="table table-bordered">
            <tr>
                <th>Customer Name</th>
                <td><?php echo $shipping_info['full_name']; ?></td>
            </tr>
            <tr>
                <th>Email Address</th>
                <td><?php echo $shipping_info['email_address']; ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo $shipping_info['address']; ?></td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td><?php echo $shipping_info['phone_number']; ?></td>
            </tr>
            <tr>
                <th>City</th>
                <td><?php echo $shipping_info['city']; ?></td>
            </tr>
            <tr>
                <th>Country</th>
                <td><?php echo $shipping_info['country']; ?></td>
            </tr>
        </table>
    </div>
</div>
<div class="row">
    <div class="well">
        <h3>Product Info</h3>
        <hr/>
        <table class="table table-bordered">
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Total Price</th>
            </tr>
            <?php $sum = 0;
            while ($product_info = mysqli_fetch_assoc($query_result2)) { ?>
                <tr>
                    <td><?php echo $product_info['product_id']; ?></td>
                    <td><?php echo $product_info['product_name']; ?></td>
                    <td>BDT: <?php echo $product_info['product_price']; ?></td>
                    <td><?php echo $product_info['product_quantity']; ?></td>
                    <td>BDT: 
                        <?php
                        $total = $product_info['product_price'] * $product_info['product_quantity'];
                        echo $total;
                        ?>
                    </td>
                </tr>
                <?php $sum = $sum + $total;
            } ?>
        </table>
        <table class="table table-striped">
            <tr>
                <th>Total</th>
                <td class="pull-right">BDT: <?php echo $sum; ?></td>
            </tr>
            <tr>
                <th>VAT</th>
                <td class="pull-right">
                    <?php
                    $vat = $sum * 0.15;
                    echo 'BDT: ' . $vat;
                    ?>

                </td>
            </tr>
            <tr>
                <th>Grand Total</th>
                <td class="pull-right">
                    <?php
                    $grand_total = $sum + $vat;
                    echo 'BDT: ' . $grand_total;
                    ?>
                </td>
            </tr>
        </table>
    </div>
</div>



