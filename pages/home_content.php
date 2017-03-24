<?php
$query_result = $ob_app->select_all_published_product();
$top_sell_query = $ob_app->select_top_sell_product();
if (isset($_POST['cart_btn'])) {

    $ob_app->save_cart_product_info($_POST);
}
?>
<div class="index_slider">
    <div class="container">
        <div class="callbacks_container">
            <ul class="rslides" id="slider">
                <li><a href="http://localhost/ecommercephp/product_details.php?product_id=19"><img src="images/Cameras.jpg" class="img-responsive" alt=""/></a></li>
                <li><a href="http://localhost/ecommercephp/category.php?category_id=12"><img src="images/slider.png" class="img-responsive" alt=""/></a></li>
                <li><a href="http://localhost/ecommercephp/category.php?category_id=11"><img src="images/h4-slide7.png" class="img-responsive" alt=""/></a</li>
            </ul>
        </div>
    </div> 
</div>
<div class="content_top">
    <div class="container">
        <div class="grid_1">
            <div class="col-md-3">
                <div class="box2">
                    <ul class="list1">
                        <i class="lock"> </i>
                        <li class="list1_right"><p>Upto 5% Reward on your shipping</p></li>
                        <div class="clearfix"> </div>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box3">
                    <ul class="list1">
                        <i class="clock1"> </i>
                        <li class="list1_right"><p>Easy Extended Returned</p></li>
                        <div class="clearfix"> </div>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box4">
                    <ul class="list1">
                        <i class="vehicle"> </i>
                        <li class="list1_right"><p>Free Shipping on order over 99 $</p></li>
                        <div class="clearfix"> </div>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box5">
                    <ul class="list1">
                        <i class="dollar"> </i>
                        <li class="list1_right"><p>Delivery Schedule Spread Cheer Time</p></li>
                        <div class="clearfix"> </div>
                    </ul>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>

        <div class="sellers_grid">
            <ul class="sellers">
                <i class="star"> </i>
                <li class="sellers_desc"><h2>Most Popular</h2></li>
                <div class="clearfix"> </div>
            </ul>
        </div>

        <div class="grid_2">

            <?php While ($top_sell_info = mysqli_fetch_assoc($top_sell_query)) { ?>
                <div class="col-md-3 span_6">
                    <div class="box_inner">
                        <img src="admin/<?php echo $top_sell_info['product_image']; ?>" alt="" height="200" width="200"/>
                        <div class="sale-box"> </div>
                        <div class="desc">
                            <h3><?php echo $top_sell_info['product_name']; ?></h3>
                            <h4>BDT <?php echo $top_sell_info['product_price']; ?></h4>
                            <ul class="list2">
                                <li class="list2_left">
                                    <form action="" method="post">
                                        <input type="hidden" name="product_quantity" value="1"> 
                                        <input type="hidden" name="product_id" value="<?php echo $top_sell_info['product_id']; ?>"> 
                                        <input  type="submit" class="btn btn-success" name="cart_btn" value="Add To Cart">
                                    </form>
                                </li>
                                <li class="list2_right"><span  class="m_2"><a href="product_details.php?product_id=<?php echo $top_sell_info['product_id']; ?>" class="link1"> Details </a></span></li>
                                <div class="clearfix"> </div>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="content_middle">
    <div class="container">
        <ul class="promote">
            <i class="promote_icon"> </i>
            <li class="promote_head"><h3>Latest Product</h3></li>
        </ul>
        <ul id="flexiselDemo3">
            <?php While ($product_info = mysqli_fetch_assoc($query_result)) { ?>
                <li ><img style="height:200px;" src="admin/<?php echo $product_info['product_image']; ?>"  class="img-responsive" /><div class="grid-flex"><h4><?php echo $product_info['product_name']; ?> </h4><p><?php echo $product_info['product_price']; ?></p>
                        <div class="m_3">
                            <form action="" method="post">
                                <input type="hidden" name="product_quantity" value="1"> 
                                <input type="hidden" name="product_id" value="<?php echo $product_info['product_id']; ?>"> 
                                <input  type="submit" class="btn btn-success" name="cart_btn" value="Add To Cart">
                            </form>
                        </div>
                        <div class="ticket"> </div>
                    </div>
                </li>
            <?php } ?>           
        </ul>
        <script type="text/javascript">
            $(window).load(function () {
                $("#flexiselDemo3").flexisel({
                    visibleItems: 6,
                    animationSpeed: 1000,
                    autoPlay: true,
                    autoPlaySpeed: 3000,
                    pauseOnHover: true,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint: 480,
                            visibleItems: 1
                        },
                        landscape: {
                            changePoint: 640,
                            visibleItems: 2
                        },
                        tablet: {
                            changePoint: 768,
                            visibleItems: 3
                        }
                    }
                });

            });
        </script>
        <script type="text/javascript" src="js/jquery.flexisel.js"></script>
    </div>
</div>
<div class="container">
    <div class="content_middle_bottom">
        <div class="col-md-4">                      
        </div>

        <div class="clearfix"></div>
    </div>
    <div class="content_bottom">      
        <div class="col-md-4 span_1">
            <ul class="spinner">
                <i class="bubble"> </i>
                <li class="spinner_head"><h3>About Us</h3></li>
                <div class="clearfix"> </div>
            </ul>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat</p>
        </div>
        <div class="col-md-4 span_1">
            <ul class="spinner">
                <i class="mail"> </i>
                <li class="spinner_head"><h3>Contact Us</h3></li>
                <div class="clearfix"> </div>
            </ul>
            <ul class="social">
                <li>
                    <div class="fb-share-button" data-href="http://localhost/ecommercephp/index.php" data-layout="box_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Fecommercephp%2Findex.php&amp;src=sdkpreparse">Share</a></div>
                </li>
                <li><a href=""><i class="tw"> </i> </a></li>
                <li><a href=""><i class="google"> </i> </a></li>
                <li><a href=""><i class="linkedin"> </i> </a></li>
                <li><a href=""><i class="skype"> </i> </a></li>
            </ul>
        </div>
        <div class="col-md-4 span_1">
            <ul class="spinner">
                <i class="mail"> </i>
                <li class="spinner_head"><h3>Contact Us</h3></li>
                <div class="clearfix"> </div>
            </ul>
            <p>500 Lorem Ipsum Dolor Sit,</p>
            <p>22-56-2-9 Sit Amet, Lorem,</p>
            <p>Phone:(00) 222 666 444</p>
            <p><a href="mailto:info@demo.com"> info(at)gifty.com</a></p>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>