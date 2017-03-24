<?php
if (isset($_POST['btn'])) {
    $ob_app->save_product_shipping_info($_POST);
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
                Hello <?php echo $_SESSION['customer_name']; ?>. You have to give us shipping information for your valuable order.
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="well">
                <h3 class="text-center text-success">Shipping information goes here</h3>
                <hr/>
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label class="control-label col-md-3">Full Name</label>
                        <div class="col-md-9">
                            <input type="text" name="full_name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Email Address</label>
                        <div class="col-md-9">
                            <input type="email" name="email_address" class="form-control">
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
                            <input type="submit" name="btn" value="Save Shipping Info" class="btn btn-primary btn-block">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>