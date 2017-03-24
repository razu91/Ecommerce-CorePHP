<?php
ob_start();
session_start();
require './application.php';
$ob_app = new Application();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>HOME</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Gifty Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
              Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- Custom Theme files -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/jquery.countdown.css" />
        <!-- Custom Theme files -->
        <!--webfont-->
        <link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
        <!-- dropdown -->
        <script src="js/jquery.easydropdown.js"></script>
        <!-- start menu -->
        <link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
        <script type="text/javascript" src="js/megamenu.js"></script>
        <script>$(document).ready(function () {
                $(".megamenu").megamenu();
            });</script>
        <script src="js/responsiveslides.min.js"></script>
        <script>
            $(function () {
                $("#slider").responsiveSlides({
                    auto: true,
                    nav: false,
                    speed: 500,
                    namespace: "callbacks",
                    pager: true,
                });
            });
        </script>
        <script src="js/jquery.countdown.js"></script>
        <script src="js/script.js"></script>
        <link rel="stylesheet" href="css/etalage.css">
        <script src="js/jquery.etalage.min.js"></script>
        <script>
            jQuery(document).ready(function ($) {

                $('#etalage').etalage({
                    thumb_image_width: 300,
                    thumb_image_height: 400,
                    source_image_width: 900,
                    source_image_height: 1200,
                    show_hint: true,
                    click_callback: function (image_anchor, instance_id) {
                        alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
                    }
                });

            });
        </script>        
    </head>
    <body>
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <?php include './includes/header.php'; ?>
        <?php include './includes/menu.php'; ?>

        <?php
        if (isset($pages)) {
            if ($pages == 'ridoy_khan') {
                include './pages/category_content.php';
            } else if ($pages == 'product_details') {
                include './pages/product_details_content.php';
            } else if ($pages == 'manufacture') {
                include './pages/manufacture_content.php';
            } else if ($pages == 'searchpage') {
                include './pages/search_content.php';
            } else if ($pages == 'cart_page') {
                include './pages/cart_page_content.php';
            } else if ($pages == 'checkout_page') {
                include './pages/checkout_page_content.php';
            } else if ($pages == 'shipping_page') {
                include './pages/shipping_page_content.php';
            } else if ($pages == 'customer_login') {
                include './pages/customer_login_content.php';
            } else if ($pages == 'payment_page') {
                include './pages/payment_page_content.php';
            } else if ($pages == 'cutomer_home_page') {
                include './pages/cutomer_home_page_content.php';
            } else if ($pages == 'wishlist') {
                include './pages/wishlist_content.php';
            }
        } else {
            include './pages/home_content.php';
        }
        ?>
        <?php include './includes/footer.php'; ?>
        <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
        <script defer src="js/jquery.flexslider.js"></script>
        <script type="text/javascript">
    $(function () {
        SyntaxHighlighter.all();
    });
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    });
        </script>
    </body>
</html>		