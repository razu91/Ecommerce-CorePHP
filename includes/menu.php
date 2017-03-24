<?php
    require 'admin/admin.php';
    $ob_admin=new Admin();
    
   $query_result=$ob_admin->select_all_published_category();

?>
<div class="menu">
    <div class="container">
        <div class="menu_box">
            <ul class="megamenu skyblue">
                <li class="active grid"><a class="color2" href="index.php">Home</a></li>
                <?php while ($category_info=  mysqli_fetch_assoc($query_result)) { ?>
                <li><a class="color4" href="category.php?category_id=<?php echo $category_info['category_id']; ?>"><?php echo $category_info['category_name']; ?></a></li>				
                <?php } ?>
                <li><a class="color4" href="cart.php">My Cart</a></li>
                <div class="clearfix"> </div>
            </ul>
        </div>
    </div>
</div>
