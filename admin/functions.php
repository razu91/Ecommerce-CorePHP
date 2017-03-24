<?php

//  ----- Start Connection string -------

function admin_login_check($data) {
     require_once 'db_connect.php';
     $password=  md5($data['password']);
     $sql="SELECT * FROM tbl_admin WHERE email_address='$data[email_address]' AND password='$password' ";
     if( mysqli_query($db_connect, $sql) ) {
         $query_result=  mysqli_query($db_connect, $sql);
         $admin_info=mysqli_fetch_assoc($query_result);
//         echo '<pre>';
//         print_r($admin_info);
         if($admin_info) {
             $_SESSION['admin_id']=$admin_info['admin_id'];
             $_SESSION['admin_name']=$admin_info['admin_name'];
             header('Location: admin_master.php');
         } else {
             $ex_message="Please use valid email address and password";
             return $ex_message;
         }
         
     } else {
         die('Query problem'.  mysqli_error($db_connect) );
     }
}

//  ----- End Connection string -------





//  ----- Start Admin User Add, Manage, Update and delete -------

function save_admin_user_info($data) {
    require 'db_connect.php';
    $password=md5($data['password']);
    $sql="INSERT INTO tbl_admin (admin_name, email_address, password, access_level) VALUES ('$data[admin_name]', '$data[email_address]', '$password', '$data[access_level]')";    
    if (mysqli_query($db_connect, $sql) ) {
        $message="Admin user info save successfully";
        return $message;
    } else {
        die('Query problem'.  mysqli_error($db_connect) );
    }
}

function select_all_user_info() {
    require 'db_connect.php';
   $sql="SELECT * FROM tbl_admin WHERE deletion_status=1";
    if(mysqli_query($db_connect, $sql)) {
       $query_result=mysqli_query($db_connect, $sql);
       return $query_result;
    } else {
        die('Query problem'.  mysqli_error($db_connect) );
    }
}

function show_admin_user_info($admin_id) {
    require 'db_connect.php';
    $sql="SELECT * FROM tbl_admin WHERE admin_id='$admin_id' ";
    if(mysqli_query($db_connect, $sql)) {
       $query_result=mysqli_query($db_connect, $sql);
       return $query_result;
    } else {
        die('Query problem'.  mysqli_error($db_connect) );
    }
}

function update_admin_user_info($dat) {
    include 'db_connect.php';    
    $password=md5($dat['password']);
    $sql="UPDATE tbl_admin SET admin_name='$dat[admin_name]',email_address='$dat[email_address]', password='$password', access_level='$dat[access_level]]' WHERE admin_id='$dat[admin_id]'";
    if(mysqli_query($db_connect, $sql)) {
        $_SESSION['message']="Admin user info update successfully";
        header('Location: manage_admin_user.php');
    } else {
        die('Query Problem'.  mysqli_error($db_connect));
    }
}


    function delete_data($id) {
        include 'db_connect.php';
//        $sql = "DELETE FROM tbl_admin WHERE admin_id='$id'";
        $sql="UPDATE tbl_admin SET deletion_status=0 WHERE admin_id='$id' ";
        if (mysqli_query($db_connect, $sql)) {
            $message = "Delete Successfully";
            return $message;
        } else {
            die('Query Problem' . mysqli_error($db_connect));
        }
    }



 //  ----- End Admin User Add, Manage, Update and delete -------   
    
    
    

    
    //  ----- Start Category Add, Manage, Update and delete -------
    
function save_category_info($data){
    require 'db_connect.php';
    $sql="INSERT INTO tbl_category (category_name, category_description, publication_status) VALUES ('$data[category_name]', '$data[category_description]', '$data[publication_status]')";    
    if (mysqli_query($db_connect, $sql) ) {
        $message="Category Info Save Successfully";
        return $message;
    } else {
        die('Query problem'.  mysqli_error($db_connect) );
    }
    
    
    
}

  

function select_all_category_info() {
    require 'db_connect.php';
   $sql="SELECT * FROM tbl_category WHERE deletion_status=1";
    if(mysqli_query($db_connect, $sql)) {
       $query_result=mysqli_query($db_connect, $sql);
       return $query_result;
    } else {
        die('Query problem'.  mysqli_error($db_connect) );
    }
}
    


function update_category_info($data) {
    include 'db_connect.php';    
    
    $sql="UPDATE tbl_category SET category_name='$data[category_name]',category_description='$data[category_description]', publication_status='$data[publication_status]]' WHERE category_id='$data[category_id]'";
    if(mysqli_query($db_connect, $sql)) {
        $_SESSION['message']="Category info update successfully";
        header('Location: manage_category.php');
    } else {
        die('Query Problem'.  mysqli_error($db_connect));
    }
}

function show_category_info($category_id) {
    require 'db_connect.php';
    $sql="SELECT * FROM tbl_category WHERE category_id='$category_id' ";
    if(mysqli_query($db_connect, $sql)) {
       $query_result=mysqli_query($db_connect, $sql);
       return $query_result;
    } else {
        die('Query problem'.  mysqli_error($db_connect) );
    }
}

function delete_category($id) {
        include 'db_connect.php';
        $sql="UPDATE tbl_category SET deletion_status=0 WHERE category_id='$id' ";
        if (mysqli_query($db_connect, $sql)) {
            $message = "Delete Successfully";
            return $message;
        } else {
            die('Query Problem' . mysqli_error($db_connect));
        }
    }
    
    
//  ----- End Category Add, Manage, Update and delete -------    
    

    
    
    
//  ----- Start Manufacture Add, Manage, Update and delete -------        
    
    function save_manufacture_info($data){
    require 'db_connect.php';
    $sql="INSERT INTO tbl_manufacture (manufacture_name, manufacture_description, publication_status) VALUES ('$data[manufacture_name]', '$data[manufacture_description]', '$data[publication_status]')";    
    if (mysqli_query($db_connect, $sql) ) {
        $message="Manufacture Info Save Successfully";
        return $message;
    } else {
        die('Query problem'.  mysqli_error($db_connect) );
    }
    
    
    
}
  


function select_all_manufacture_info() {
    require 'db_connect.php';
   $sql="SELECT * FROM tbl_manufacture WHERE deletion_status=1";
    if(mysqli_query($db_connect, $sql)) {
       $query_result=mysqli_query($db_connect, $sql);
       return $query_result;
    } else {
        die('Query problem'.  mysqli_error($db_connect) );
    }
}



function show_manufacture_info($manufacture_id) {
    require 'db_connect.php';
    $sql="SELECT * FROM tbl_manufacture WHERE manufacture_id='$manufacture_id' ";
    if(mysqli_query($db_connect, $sql)) {
       $query_result=mysqli_query($db_connect, $sql);
       return $query_result;
    } else {
        die('Query problem'.  mysqli_error($db_connect) );
    }
}

    

function update_manufacture_info($data) {
    include 'db_connect.php';    
    
    $sql="UPDATE tbl_manufacture SET manufacture_name='$data[manufacture_name]',manufacture_description='$data[manufacture_description]', publication_status='$data[publication_status]]' WHERE manufacture_id='$data[manufacture_id]'";
    if(mysqli_query($db_connect, $sql)) {
        $_SESSION['message']="Manufacture info update successfully";
        header('Location: manage_manufacture.php');
    } else {
        die('Query Problem'.  mysqli_error($db_connect));
    }
}


function delete_manufacture($id) {
        include 'db_connect.php';
        $sql="UPDATE tbl_manufacture SET deletion_status=0 WHERE manufacture_id='$id' ";
        if (mysqli_query($db_connect, $sql)) {
            $message = "Delete Successfully";
            return $message;
        } else {
            die('Query Problem' . mysqli_error($db_connect));
        }
    }
//  ----- End Manufacture Add, Manage, Update and delete -------       

//  ----- start product Add, Manage, Update and delete -------       
function select_all_published_category() {
   require 'db_connect.php';
   $sql="SELECT * FROM tbl_category WHERE deletion_status=1 AND publication_status=1 ";
    if(mysqli_query($db_connect, $sql)) {
       $query_result=mysqli_query($db_connect, $sql);
       return $query_result;
    } else {
        die('Query problem'.  mysqli_error($db_connect) );
    }
}
function select_all_manufacturer_info() {
   require 'db_connect.php';
   $sql="SELECT * FROM tbl_manufacture WHERE deletion_status=1 AND publication_status=1 ";
    if(mysqli_query($db_connect, $sql)) {
       $query_result=mysqli_query($db_connect, $sql);
       return $query_result;
    } else {
        die('Query problem'.  mysqli_error($db_connect) );
    }
}

function save_product_info($data) {
       require 'db_connect.php';
       
       $directory='product_image/';
       $target_file=$directory.$_FILES['product_image']['name'];
       $file_type=  pathinfo($target_file, PATHINFO_EXTENSION);
       $file_size=$_FILES['product_image']['size'];
       $check=getimagesize($_FILES['product_image']['tmp_name']);
       if($check) {
            if(file_exists($target_file)) {
                echo 'This file is already exists. please try new one';
            } else {
                if($file_size>10000000) {
                    echo 'File is too large. please try new one';
                } else {
                    if($file_type !='jpg' && $file_type != 'png') {
                        echo 'File type is not valid. please try new one';
                    } else {
                        move_uploaded_file($_FILES['product_image']['tmp_name'], $target_file);
                        $sql="INSERT INTO tbl_product (product_name, category_id, manufacture_id, product_price, product_quantity, product_short_description, product_long_description, product_image, publication_status) VALUES ('$data[product_name]', '$data[category_id]', '$data[manufacture_id]', '$data[product_price]', '$data[product_quantity]', '$data[product_short_description]', '$data[product_long_description]', '$target_file', '$data[publication_status]' )";
                        if (mysqli_query($db_connect, $sql) ) {
                            $message="Product info save successfully !";
                            return $message;
                        } else {
                            die('Query problem'.  mysqli_error($db_connect) );
                        }
                    }
                }
            }
       } else {
           echo 'This is not an image';
       }
}

function select_all_product_info() {
           require './db_connect.php';
           //$sql="SELECT * FROM tbl_product WHERE deletion_status=1 ";
           $sql="SELECT p.*, c.category_name, m.manufacture_name FROM tbl_product as p, tbl_category as c, tbl_manufacture as m WHERE p.category_id=c.category_id AND p.manufacture_id=m.manufacture_id ";                                                                                 
           if(mysqli_query($db_connect, $sql)) {
              $query_result=mysqli_query($db_connect, $sql); 
              return $query_result;
           } else {
               die('Query problem'.  mysqli_error($db_connect) );
           }
       }


//  ----- end product Add, Manage, Update and delete -------       

    
    
    
    
    
function admin_logout() {
    unset($_SESSION['admin_id']); 
    unset($_SESSION['admin_name']); 
    header('Location: index.php');
}











