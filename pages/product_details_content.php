<?php
$product_id = $_GET['product_id'];
$query_result = $ob_app->select_product_info_by_id($product_id);

$product_info = mysqli_fetch_assoc($query_result);
//        echo '<pre>';
//    print_r($product_info);

$category_id = $product_info['category_id'];
$category_query_result = $ob_app->select_product_by_category_id($category_id);

if (isset($_POST['cart_btn'])) {

    $ob_app->save_cart_product_info($_POST);
}
if (isset($_POST['wish_btn'])) {

    $ob_app->save_wish_info($_POST);
}
?>

<div class="men">
    <div class="container">
        <div class="single_top">
            <div class="col-md-9 single_right">
                <div class="grid images_3_of_2">
                    <ul id="etalage">
                        <li>
                            <a href="optionallink.html">
                                <img class="etalage_thumb_image" src="admin/<?php echo $product_info['product_image']; ?>" class="img-responsive" />
                                <img class="etalage_source_image" src="admin/<?php echo $product_info['product_image']; ?>" class="img-responsive" title="" />
                            </a>
                        </li>
                        <li>
                            <img class="etalage_thumb_image" src="admin/<?php echo $product_info['product_image']; ?>" class="img-responsive" />
                            <img class="etalage_source_image" src="admin/<?php echo $product_info['product_image']; ?>" class="img-responsive" title="" />
                        </li>
                        <li>
                            <img class="etalage_thumb_image" src="admin/<?php echo $product_info['product_image']; ?>" class="img-responsive"  />
                            <img class="etalage_source_image" src="admin/<?php echo $product_info['product_image']; ?>"class="img-responsive"  />
                        </li>
                        <li>
                            <img class="etalage_thumb_image" src="admin/<?php echo $product_info['product_image']; ?>" class="img-responsive"  />
                            <img class="etalage_source_image" src="admin/<?php echo $product_info['product_image']; ?>"class="img-responsive"  />
                        </li>
                    </ul>

                    <div class="clearfix"></div>		
                </div> 
                <div class="desc1 span_3_of_2">
                    <h1><u>Product Name:</u> <?php echo $product_info['product_name']; ?></h1>
                    <p><u>Product Price:</u> BDT <?php echo $product_info['product_price']; ?></p>
                    <p><u>Category Name:</u> <?php echo $product_info['category_name']; ?></p>
                    <p><u>Manufacture Name:</u> <?php echo $product_info['manufacture_name']; ?></p>
                    <p><u>Stock Amount:</u> <?php echo $product_info['product_quantity']; ?></p>
                    <br>
<?php if (isset($_SESSION['customer_id'])) { ?>
                        <form action="" method="post">
                            <input type="hidden" name="product_id" value="<?php echo $product_info['product_id']; ?>"> 
                            <input style="background:green; color:white;" type="submit" name="wish_btn" value="Add Wishlist">
                        </form>
<?php } ?>
                    <div class="btn_form">
                        <form action="" method="post">
                            <input type="number" name="product_quantity" value="1"> 
                            <input type="hidden" name="product_id" value="<?php echo $product_info['product_id']; ?>"> 
                            <input type="submit" name="cart_btn" value="Add To Cart">
                        </form>                
                    </div>

                </div>
                <div class="clearfix"></div>	
            </div>
            <div class="col-md-3">
                <!-- FlexSlider -->

                <!-- FlexSlider -->
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="toogle">
            <h2>Product Short Description</h2>
            <p class="m_text2"><?php echo $product_info['product_short_description']; ?></p>
        </div>
        <div class="toogle">
            <h2>Product Long Description</h2>
            <p class="m_text2"><?php echo $product_info['product_long_description']; ?></p>
        </div>
        <h4 class="head_single">Related Products</h4>
        <div class="span_3">
<?php while ($category_product = mysqli_fetch_assoc($category_query_result)) { ?>
                <div class="col-sm-3 grid_1">
                    <a href="single.html">
                        <img src="admin/<?php echo $category_product['product_image']; ?>" class="img-responsive" alt=""/>
                        <h3><?php echo $category_product['product_name']; ?></h3>
                        <hr/>
                        <h4>BDT <?php echo $category_product['product_price']; ?></h4>
                    </a>  
                </div>
<?php } ?>
            <div class="clearfix"></div>
        </div>
    </div>







</div>  