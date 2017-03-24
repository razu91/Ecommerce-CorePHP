<?php

class Admin {

    //put your code here

    public function __construct() {

        $host_name = 'localhost';
        $user_name = 'root';
        $passowrd = '';
        $db_name = 'ecommerce';
        $db_connect = mysqli_connect($host_name, $user_name, $passowrd);
        if ($db_connect) {
            //echo 'Database server connected';
            $db_select = mysqli_select_db($db_connect, $db_name);
            if ($db_select) {
                //echo 'Database selected';
                return $db_connect;
            } else {
                die('Selection Fail' . mysqli_error($db_connect));
            }
        } else {
            die('Connection Fail' . mysqli_error($db_connect));
        }
    }

//    function database_connect() {
//        $host_name = 'localhost';
//        $user_name = 'root';
//        $passowrd = '';
//        $db_name = 'ecommerce';
//
//        $db_connect = mysqli_connect($host_name, $user_name, $passowrd);
//        if ($db_connect) {
//            //echo 'Database server connected';
//            $db_select = mysqli_select_db($db_connect, $db_name);
//            if ($db_select) {
//                //echo 'Database selected';
//                return $db_connect;
//            } else {
//                die('Selection Fail' . mysqli_error($db_connect));
//            }
//        } else {
//            die('Connection Fail' . mysqli_error($db_connect));
//        }
//    }

    public function admin_login_check($data) {
        $db_connect = $this->__construct();
        $password = md5($data['password']);
        $sql = "SELECT * FROM tbl_admin WHERE email_address='$data[email_address]' AND password='$password' ";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            $admin_info = mysqli_fetch_assoc($query_result);
//            echo '<pre>';
//            print_r($admin_info);
//            exit();
            if ($admin_info) {
                $_SESSION['admin_id'] = $admin_info['admin_id'];
                $_SESSION['admin_name'] = $admin_info['admin_name'];
                header('Location: admin_master.php');
            } else {
                $ex_message = "Please use valid email address and password";
                return $ex_message;
            }
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function save_admin_user_info($data) {
        $db_connect = $this->__construct();
        $password = md5($data['password']);
        $sql = "INSERT INTO tbl_admin (admin_name, email_address, password, access_level) VALUES ('$data[admin_name]', '$data[email_address]', '$password', '$data[access_level]')";
        if (mysqli_query($db_connect, $sql)) {
            $message = "Admin user info save successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function admin_logout() {
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_name']);
        header('Location: index.php');
    }

    public function select_all_user_info() {
        $db_connect = $this->__construct();
        $sql = "SELECT * FROM tbl_admin WHERE deletion_status=1";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function update_admin_user_info($data) {
        $db_connect = $this->__construct();
        $password = md5($dat['password']);
        $sql = "UPDATE tbl_admin SET admin_name='$dat[admin_name]',email_address='$dat[email_address]', password='$password', access_level='$dat[access_level]]' WHERE admin_id='$dat[admin_id]'";
        if (mysqli_query($db_connect, $sql)) {
            $_SESSION['message'] = "Admin user info update successfully";
            header('Location: manage_admin_user.php');
        } else {
            die('Query Problem' . mysqli_error($db_connect));
        }
    }

    public function save_category_info($data) {
        $db_connect = $this->__construct();
        $sql = "INSERT INTO tbl_category (category_name, category_description, publication_status) VALUES ('$data[category_name]', '$data[category_description]', '$data[publication_status]')";
        if (mysqli_query($db_connect, $sql)) {
            $message = "Category Info Save Successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function select_all_category_info() {
        $db_connect = $this->__construct();
        $sql = "SELECT * FROM tbl_category WHERE deletion_status=1";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function show_category_info($category_id) {
        $db_connect = $this->__construct();
        $sql = "SELECT * FROM tbl_category WHERE category_id='$category_id' ";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function select_all_published_category() {
        $db_connect = $this->__construct();
        $sql = "SELECT * FROM tbl_category WHERE deletion_status=1 AND publication_status=1 ";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function select_all_manufacturer() {
        $db_connect = $this->__construct();
        $sql = "SELECT * FROM tbl_manufacture WHERE deletion_status=1 AND publication_status=1 ";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function delete_category($id) {
        $db_connect = $this->__construct();
        $sql = "UPDATE tbl_category SET deletion_status=0 WHERE category_id='$id' ";
        if (mysqli_query($db_connect, $sql)) {
            $message = "Delete Successfully";
            return $message;
        } else {
            die('Query Problem' . mysqli_error($db_connect));
        }
    }

    public function update_category_info($data) {
        $db_connect = $this->__construct();
        $sql = "UPDATE tbl_category SET category_name='$data[category_name]',category_description='$data[category_description]', publication_status='$data[publication_status]]' WHERE category_id='$data[category_id]'";
        if (mysqli_query($db_connect, $sql)) {
            $_SESSION['message'] = "Category info update successfully";
            header('Location: manage_category.php');
        } else {
            die('Query Problem' . mysqli_error($db_connect));
        }
    }

    public function save_manufacture_info($data) {
        $db_connect = $this->__construct();
        $sql = "INSERT INTO tbl_manufacture (manufacture_name, manufacture_description, publication_status) VALUES ('$data[manufacture_name]', '$data[manufacture_description]', '$data[publication_status]')";
        if (mysqli_query($db_connect, $sql)) {
            $message = "Manufacture Info Save Successfully";
            return $message;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function select_all_order_info() {
        $db_connect = $this->__construct();
        $sql = "SELECT o.*, c.first_name, c.last_name, p.payment_status FROM tbl_order as o, tbl_customer as c, tbl_payment as p WHERE o.customer_id=c.customer_id AND o.payment_id=p.payment_id ";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function select_customer_info_by_order_id($order_id) {
        $db_connect = $this->__construct();
        $sql = "SELECT o.order_id, o.customer_id, c.* FROM tbl_order as o, tbl_customer as c WHERE o.customer_id=c.customer_id AND o.order_id='$order_id' ";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function select_shipping_info_by_order_id($order_id) {
        $db_connect = $this->__construct();
        $sql = "SELECT o.order_id, o.shipping_id, s.* FROM tbl_order as o, tbl_shipping as s WHERE o.shipping_id=s.shipping_id AND o.order_id='$order_id' ";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function select_product_info_by_order_id($order_id) {
        $db_connect = $this->__construct();
        $sql = "SELECT o.order_id, od.* FROM tbl_order as o, tbl_order_details as od WHERE o.order_id=od.order_id AND o.order_id='$order_id' ";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

}
