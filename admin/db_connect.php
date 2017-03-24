<?php
    $host_name='localhost';
    $user_name='root';
    $passowrd='';
    $db_name='db_seip_ecommerce15';

    $db_connect=mysqli_connect($host_name, $user_name, $passowrd);
    if($db_connect) {
        //echo 'Database server connected';
        $db_select=mysqli_select_db($db_connect, $db_name);
        if($db_select) {
            //echo 'Database selected';
        } else {
            die('Selection Fail'.  mysqli_error($db_connect) );
        }
    } else {
        die('Connection Fail'.  mysqli_error($db_connect) );
    }