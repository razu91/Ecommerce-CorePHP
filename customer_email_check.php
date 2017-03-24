<?php
$en_customer_id=$_GET['id'];
$real_customer_id=base64_decode($en_customer_id);

require './application.php';
$obj_app=new Application();
$obj_app->update_customer_status_by_id($real_customer_id);
header('Location: shipping.php');