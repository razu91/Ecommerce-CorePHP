<?php
$given_email=$_GET['email'];
require './application.php';
$obj_app=new Application();


$query_result=$obj_app->customer_email_check($given_email);
$customer_info=mysqli_fetch_assoc($query_result);
if($customer_info) {
    echo 'Already exist';
} else {
    echo 'Avaliable';
}