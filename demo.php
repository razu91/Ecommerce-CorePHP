        <?php
        ob_start();
        session_start();
        require './application.php';
        $ob_app = new Application();
        $query_result = $ob_app->select_cart_product_by_session_id();
        ?>
        <h3>Order Date: 21.04.2016</h3>
        <table border='1' style="width: 80%; border: 1px solid red; ">
            <tr style="text-align: center">
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
                <th>Total Price</th>
            </tr>
            <?php  while ($cart_product=  mysqli_fetch_assoc($query_result)) { ?>
            <tr>
                <td><?php echo $cart_product['product_id']; ?></td>
                <td><?php echo $cart_product['product_name']; ?></td>
                <td><?php echo $cart_product['product_price']; ?></td>
                <td><?php echo $cart_product['product_quantity']; ?></td>
                <td>BDT <?php echo $cart_product['product_quantity']*$cart_product['product_price']; ?></td>
            </tr>
            <?php } ?>
        </table>
    