<?php
if (isset($_POST['btn'])) {
    $ob_app->save_order_info($_POST);
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
            <div class="well text-center text-primary">
                Please Select your payment method for your valuable order....
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well">
                <form action="" method="post">
                    <div class="radio">
                        <input type="radio" name="payment_type" value="cash_on_delivary"> Cash On Delivery
                    </div>
                    <hr/>
                    <div class="radio">
                        <input type="radio" name="payment_type" value="paypal"> Paypal
                    </div>
                    <div class="form-group">
                        <input type="submit"   name="btn" value="Confirm Order" class="btn btn-primary btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
