<?php

class Application {

    //put your code here
    public function __construct() {
        $host_name = 'localhost';
        $user_name = 'root';
        $passowrd = '';
        $db_name = 'db_seip_ecommerce15';
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
        session_start();
    }

    public function select_all_published_product() {
        $db_connect = $this->__construct();
        $sql = "SELECT * from tbl_product WHERE publication_status =1 AND deletion_status=1 ORDER BY product_id DESC";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function select_top_sell_product() {
        $db_connect = $this->__construct();
        $sql = "SELECT * from tbl_product WHERE publication_status =1 AND deletion_status=1 AND hit_count >0  ORDER BY hit_count ASC LIMIT 8";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function select_product_by_category_id($category_id) {
        $db_connect = $this->__construct();
        $sql = "SELECT * FROM tbl_product WHERE publication_status =1 AND deletion_status=1 AND category_id='$category_id' ";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function select_product_by_manufacture_id($manufacture_id) {
        $db_connect = $this->__construct();
        $sql = "SELECT * FROM tbl_product WHERE  publication_status =1 AND deletion_status=1 AND manufacture_id='$manufacture_id' ";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function select_product_info_by_id($product_id) {
        $db_connect = $this->__construct();
        $sql2 = "UPDATE tbl_product SET hit_count = hit_count + 1 WHERE product_id ='$product_id' ";
        mysqli_query($db_connect, $sql2);
        $sql = "SELECT p.*, c.category_name, m.manufacture_name FROM tbl_product as p, tbl_category as c, tbl_manufacture as m WHERE p.category_id=c.category_id AND p.manufacture_id=m.manufacture_id AND p.publication_status=1 AND p.deletion_status=1 AND p.product_id='$product_id' ";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function save_wish_info($data) {
        $db_connect = $this->__construct();
        $product_id = $data['product_id'];
        $user_id = $_SESSION['customer_id'];
        $sql = "SELECT * FROM tbl_wishlist WHERE wish_product_id='$product_id' AND wish_user_id='$user_id' ";
        $query_result = mysqli_query($db_connect, $sql);
        $product_info = mysqli_fetch_assoc($query_result);
        if ($product_info) {
            $_SESSION['wishlist'] = "This Product Already Your Wish List";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            $sql = "INSERT INTO tbl_wishlist (wish_product_id,wish_user_id) VALUES ('$product_id','$user_id' )";
            if (mysqli_query($db_connect, $sql)) {
                //header('Location: cart.php');
                $_SESSION['wishlist'] = "Product Added To WishList Successfully";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                die('Query problem' . mysqli_error($db_connect));
            }
        }
    }

    public function select_all_wishlist_by_user_id() {
        $db_connect = $this->__construct();
        $user_id = $_SESSION['customer_id'];
        $sql = "SELECT p.* FROM tbl_product as p,tbl_wishlist as w WHERE p.product_id=w.wish_product_id AND w.wish_user_id='$user_id'";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function delete_wish_product_by_user_id($product_id) {
        $db_connect = $this->__construct();
        $user_id = $_SESSION['customer_id'];
        $sql = "DELETE FROM tbl_wishlist WHERE wish_product_id='$product_id' AND wish_user_id='$user_id' ";
        if (mysqli_query($db_connect, $sql)) {
            $_SESSION['wishlist'] = "Product Delete From WishList Successfully";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function save_cart_product_info($data) {
        $db_connect = $this->__construct();
        $product_id = $data['product_id'];

        $sql2 = "UPDATE tbl_product SET hit_count = hit_count + 1 WHERE product_id ='$product_id' ";
        mysqli_query($db_connect, $sql2);
        $sql = "SELECT * FROM tbl_product WHERE product_id='$product_id' ";
        $query_result = mysqli_query($db_connect, $sql);
        $product_info = mysqli_fetch_assoc($query_result);
        $session_id = session_id();
        $product_stock = $product_info[product_quantity];
        if ($product_stock < $data['product_quantity']) {
            $_SESSION['carterror'] = "Stock Limit Exceed";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            $sql = "INSERT INTO tbl_temp_cart (product_id, session_id, product_name, product_image, product_price, product_quantity) VALUES ('$product_info[product_id]', '$session_id', '$product_info[product_name]', '$product_info[product_image]', '$product_info[product_price]', '$data[product_quantity]' )";

            if (mysqli_query($db_connect, $sql)) {
                //header('Location: cart.php');
                $_SESSION['addcart'] = "Product Added To Cart Successfully";
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                die('Query problem' . mysqli_error($db_connect));
            }
        }
    }

    public function search_product_by_search_text($data) {
        $db_connect = $this->__construct();
        $search_text = $data['search_text'];
        $sql = "SELECT * FROM tbl_product WHERE product_name LIKE '%$search_text%'";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function select_cart_product_by_session_id() {
        $db_connect = $this->__construct();
        $session_id = session_id();
        $sql = "SELECT * FROM tbl_temp_cart WHERE session_id='$session_id' ";

        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function delete_cart_product_by_id($product_id) {
        $db_connect = $this->__construct();
        //session_start();
        $session_id = session_id();

        $sql = "DELETE FROM tbl_temp_cart WHERE session_id='$session_id' AND product_id='$product_id' ";
        if (mysqli_query($db_connect, $sql)) {
            $message = 'Cart product info delete success fully';
            return $message;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function update_cart_product_by_id($data) {
        $db_connect = $this->__construct();
        $session_id = session_id();
        $sql = "UPDATE tbl_temp_cart SET product_quantity='$data[product_quantity]' WHERE session_id='$session_id' AND product_id='$data[product_id]' ";
        if (mysqli_query($db_connect, $sql)) {
            $message = 'Cart product info update success fully';
            return $message;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function save_customer_info($data) {
        $db_connect = $this->__construct();
        $password = md5($data['password']);
        $sql = "INSERT INTO tbl_customer (first_name, last_name, email_address, password, address, phone_number, city, country) VALUES ('$data[first_name]', '$data[last_name]', '$data[email_address]', '$password', '$data[address]', '$data[phone_number]', '$data[city]', '$data[country]' )";
        if (mysqli_query($db_connect, $sql)) {
            $customer_id = mysqli_insert_id($db_connect);
            $_SESSION['customer_id'] = $customer_id;
            $_SESSION['customer_name'] = $data['first_name'] . ' ' . $data['last_name'];
            $_SESSION['first_name'] = $data['first_name'];
            /* activation email start here */
            $to = $data['email_address'];
            $subject = "Registration conirmation mail";
            $new_customer_id = base64_encode($customer_id);
            //echo $new_customer_id;
            $message = "       
                    <html>
                        <head>
                        </head>
                        <body>
                            <p>Hello $data[last_name]</p>
                            <p>Thanks for registration to our site. </p>
                            <p>Your login information goes here: </p>
                            <p>Email Address: $data[email_address]</p>
                            <p>Password: $data[password]</p>
                                <br/>
                                <p>To activate your account press on the following link: </p>
                                <br/>
                                <a href='http://localhost/seip_ecommerce15/customer_email_check.php?id=$new_customer_id'>http://localhost/seip_ecommerce15/customer_email_check.php?id=$new_customer_id</a>
                                
                        </body>
                    </html>
                    ";
            $headers = "MIME 1.0" . "\r\n";
            $headers .= "Content-type: text/html" . "\r\n";

            $headers .= "From: shahnaouzrazu21@gmail.com" . "\r\n";
//            $headers.="Cc: sales@gseip_ecommerce15.com". "\r\n";

            mail($to, $subject, $message, $headers);
            echo $message;
            exit();

            /* activation email end here */

            header('Location: cart.php');
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function customer_login_check($data) {
        $db_connect = $this->__construct();
        $password = md5($data['password']);
        $sql = "SELECT * FROM tbl_customer WHERE email_address='$data[email_address]' AND password='$password' ";
        if (mysqli_query($db_connect, $sql)) {
            $query_result = mysqli_query($db_connect, $sql);
            $customer_info = mysqli_fetch_assoc($query_result);
//            echo '<pre>';
//            print_r($customer_info);
//            exit();
            if ($customer_info) {
                $_SESSION['customer_id'] = $customer_info['customer_id'];
                $_SESSION['customer_name'] = $customer_info['first_name'] . ' ' . $customer_info['last_name'];
                $_SESSION['first_name'] = $customer_info['first_name'];
                header('Location: index.php');
            } else {
                header('Location: login.php');
                $ex_message = "Please use valid email address and password";
                return $ex_message;
            }
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function save_product_shipping_info($data) {
        $db_connect = $this->__construct();
        $sql = "INSERT INTO tbl_shipping (full_name, email_address, address, phone_number, city, country) VALUES ('$data[full_name]', '$data[email_address]', '$data[address]', '$data[phone_number]', '$data[city]', '$data[country]' )";
        if (mysqli_query($db_connect, $sql)) {
            $shipping_id = mysqli_insert_id($db_connect);
            $_SESSION['shipping_id'] = $shipping_id;

            header('Location: payment.php');
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function save_order_info($data) {
        $db_connect = $this->__construct();
        $payment_type = $data['payment_type'];
        if ($payment_type == 'cash_on_delivary') {
            $sql = "INSERT INTO tbl_payment (payment_type) VALUES ('$payment_type')";
            if (mysqli_query($db_connect, $sql)) {
                $payment_id = mysqli_insert_id($db_connect);
                $_SESSION['payment_id'] = $payment_id;
                $sql = "INSERT INTO tbl_order (customer_id, shipping_id, payment_id, order_total) VALUES ('$_SESSION[customer_id]', '$_SESSION[shipping_id]', '$_SESSION[payment_id]', '$_SESSION[order_total]')";
                if (mysqli_query($db_connect, $sql)) {
                    $order_id = mysqli_insert_id($db_connect);
                    $_SESSION['order_id'] = $order_id;
                    $session_id = session_id();
                    $sql = "SELECT * FROM tbl_temp_cart WHERE session_id='$session_id' ";
                    $query_result = mysqli_query($db_connect, $sql);
                    while ($cart_product = mysqli_fetch_assoc($query_result)) {
                        $sql = "INSERT INTO tbl_order_details (order_id, product_id, product_name, product_price, product_quantity) VALUES ('$_SESSION[order_id]', '$cart_product[product_id]', '$cart_product[product_name]', '$cart_product[product_price]', '$cart_product[product_quantity]' )";
                        mysqli_query($db_connect, $sql);
                    }
//                    $sql = "DELETE FROM tbl_temp_cart WHERE session_id='$session_id' ";
//                    mysqli_query($db_connect, $sql);
                    header('Location: cutomer_home.php');
                } else {
                    die('Query problem' . mysqli_error($db_connect));
                }
            } else {
                die('Query problem' . mysqli_error($db_connect));
            }
        } else if ($payment_type == 'paypal') {
            $sql = "INSERT INTO tbl_payment (payment_type) VALUES ('$payment_type')";
            if (mysqli_query($db_connect, $sql)) {
                $payment_id = mysqli_insert_id($db_connect);
                $_SESSION['payment_id'] = $payment_id;
                $sql = "INSERT INTO tbl_order (customer_id, shipping_id, payment_id, order_total) VALUES ('$_SESSION[customer_id]', '$_SESSION[shipping_id]', '$_SESSION[payment_id]', '$_SESSION[order_total]')";
                if (mysqli_query($db_connect, $sql)) {
                    $order_id = mysqli_insert_id($db_connect);
                    $_SESSION['order_id'] = $order_id;

                    $sql = "SELECT * FROM tbl_temp_cart WHERE session_id='$session_id' ";
                    $query_result = mysqli_query($db_connect, $sql);
                    while ($cart_product = mysqli_fetch_assoc($query_result)) {
                        $sql = "INSERT INTO tbl_order_details (order_id, product_id, product_name, product_price, product_quantity) VALUES ('$_SESSION[order_id]', '$cart_product[product_id]', '$cart_product[product_name]', '$cart_product[product_price]', '$cart_product[product_quantity]' )";
                        mysqli_query($db_connect, $sql);
                    }

                    header('Location: htmlWebsiteStandardPayment.php');
                } else {
                    die('Query problem' . mysqli_error($db_connect));
                }
            } else {
                die('Query problem' . mysqli_error($db_connect));
            }
        }
    }

    public function delete_cart() {
        $db_connect = $this->__construct();
        $session_id = session_id();
        $sql = "DELETE FROM tbl_temp_cart WHERE session_id='$session_id' ";
        if (mysqli_query($db_connect, $sql)) {
            $message = 'Sucessfull';
            return $message;
        } else {
            die('Query problem' . mysqli_error($db_connect));
        }
    }

    public function customer_email_check($given_email) {
        $db_connect = $this->__construct();
        $sql = "SELECT * FROM tbl_customer WHERE email_address='$given_email' ";
        $query_result = mysqli_query($db_connect, $sql);
        return $query_result;
    }

    public function update_customer_status_by_id($real_customer_id) {
        $db_connect = $this->__construct();
        $sql = "UPDATE tbl_customer SET activation_status=1 WHERE customer_id='$real_customer_id' ";
        mysqli_query($db_connect, $sql);
    }

    public function customer_logout() {
        unset($_SESSION['customer_id']);
        unset($_SESSION['customer_name']);
        header('Location: index.php');
    }

}
