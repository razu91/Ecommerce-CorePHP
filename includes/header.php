<?php
if (isset($_GET['cus_status'])) {
    $ob_app->customer_logout();
}
$query_result = $ob_app->select_cart_product_by_session_id();
if (isset($_POST['search_btn'])) {

    $search = $ob_app->search_product_by_search_text($_POST);
}
?>
<div class="header_top">
    <div class="container">
        <div class="header_top-box">
            <div class="header-top-left">
                <div class="box">

                </div>
                <div class="box1">

                </div>
                <div class="clearfix"></div>
            </div>
            <div class="cssmenu">
                <ul>
                    <li class="active"><a href="cart.php">Cart</a></li> 
                    <li><a href="wishlist.php">Wishlist</a></li> 
                        <?php if (isset($_SESSION['customer_id'])) { ?>
                    <li><a href="#">Hi! <?php echo $_SESSION['first_name']; ?></a></li> 
                        <li><a href="?cus_status=logout">Log Out</a></li>                         
                    <?php } else { ?>
                        <li><a href="login.php">Log In</a></li> 
                        <li><a href="login.php">Sign Up</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="header_bottom">
    <div class="container">
        <div class="header_bottom-box">
            <div class="header_bottom_left">
                <div class="logo">
                    <a href="index.php"><img src="images/logo.png" alt=""/></a>
                </div>
                <ul class="clock">
                    <i class="clock_icon"> </i>
                    <li class="clock_desc">Justo 24/h</li>
                </ul>
                <div class="clearfix"> </div>
            </div>
            <div class="header_bottom_right">
                <div class="search">
                    <form action="search.php" method="post">
                        <input type="text" value="Search Products" name="search_text">
                        <input type="submit" value="" name="search_btn" >
                    </form>
                </div>
                <ul class="bag">
                    <a href="#"><i class="bag_left"> </i></a>
                    <a href="cart.php">
                        <li class="bag_right">
                            <p>
<?php
$sum = 0;
while ($cart_product = mysqli_fetch_assoc($query_result)) {
    $total = $cart_product['product_price'] * $cart_product['product_quantity'];
    $sum = $sum + $total;
}
echo $sum . ' tk';
?>
                            </p>
                        </li>
                    </a>
                    <div class="clearfix"> </div>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<?php
if (isset($_SESSION["addcart"])) {   ?>
<h2 style="color:green; text-align: center;"><?php echo $_SESSION["addcart"]; ?> </h2>  
<?php unset($_SESSION["addcart"]); } ?>
<?php if (isset($_SESSION["wishlist"])) {   ?>
<h2 style="color:green; text-align: center;"><?php echo $_SESSION["wishlist"]; ?> </h2>  
<?php unset($_SESSION["wishlist"]); } ?>
<?php if (isset($_SESSION["carterror"])) {   ?>
<h2 style="color:red; text-align: center;"><?php echo $_SESSION["carterror"]; ?> </h2>  
<?php unset($_SESSION["carterror"]); } ?>