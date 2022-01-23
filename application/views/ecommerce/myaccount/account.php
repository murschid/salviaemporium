<div class="box-title">
    <h2 class="address-book">Address Book</h2>
</div>
<div class="row">
    <div class="col-md-6">
        <h4>Default Billing Address</h4> 
        <address>Name: <?= $customer->name; ?><br>
            <?= $customer->address . ', ' . $customer->city . ' - ' . $customer->zip; ?><br>
            <?= $customer->country; ?><br> 
            Mobile: <?= $customer->mobile; ?><br>
        </address>
    </div>
    <div class="col-md-6">
        <h4>Default Shipping Address</h4> 
        <address>Name: <?= $customer->name; ?><br>
            <?= $customer->address . ', ' . $customer->city . ' - ' . $customer->zip; ?><br>
            <?= $customer->country; ?><br> 
            Mobile: <?= $customer->mobile; ?><br>
        </address>
    </div>
</div>