<script>

    function customer_email_check(given_email, obj) {
        //alert(given_email);
        var xmlhttp = new XMLHttpRequest();

        var server_page = 'email_check.php?email=' + given_email;
        xmlhttp.open('GET', server_page);
        xmlhttp.onreadystatechange = function () {
            //alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(obj).innerHTML = xmlhttp.responseText;
                if (xmlhttp.responseText == 'Already exist') {
                    document.getElementById('reg_btn').disabled = true;
                } else {
                    document.getElementById('reg_btn').disabled = false;
                }
            }
        }
        xmlhttp.send(null);
    }



</script>


<?php
if (isset($_POST['btn'])) {
    $ob_app->save_customer_info($_POST);
}
if (isset($_POST['login_btn'])) {
    $ob_app->customer_login_check($_POST);
}
?>




<div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr/>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well text-center text-success">
                You have to login for your valuable order. If you are not registered then please register first.
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="well">
                <h3 class="text-center text-success">Registration Point Here</h3>
                <hr/>
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label class="control-label col-md-3">First Name</label>
                        <div class="col-md-9">
                            <input type="text" name="first_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Last Name</label>
                        <div class="col-md-9">
                            <input type="text" name="last_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Email Address</label>
                        <div class="col-md-9">
                            <input type="email" name="email_address" class="form-control" onblur="return customer_email_check(this.value, 'res');
                                   "><br/>
                            <span id="res"></span>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Password</label>
                        <div class="col-md-9">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Address</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="address"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Phone Number</label>
                        <div class="col-md-9">
                            <input type="number" name="phone_number" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">City</label>
                        <div class="col-md-9">
                            <input type="text" name="city" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Country</label>
                        <div class="col-md-9">
                            <select class="form-control" name="country">
                                <option>---Select your Country---</option>
                                <option value="BD">Bangladesh</option>
                                <option value="CH">China</option>
                                <option value="JP">Japan</option>
                                <option value="CA">Canada</option>
                                <option value="GA">Garmany</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" name="btn" value="Registration" class="btn btn-primary btn-block" id="reg_btn">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="well">
                <h3 class="text-center text-success">Login Point Here</h3>
                <hr/>
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label class="control-label col-md-3">Email Address</label>
                        <div class="col-md-9">
                            <input required="true" type="email" name="email_address" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Password</label>
                        <div class="col-md-9">
                            <input required="true" type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" name="login_btn" value="login" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>