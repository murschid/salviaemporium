<div class="row invoice-info">
    <div class="col-sm-6 invoice-col">
        <b>Order No:</b> SEORD<?= $customer->orderid; ?><br>
        <?= ($customer->payment_status == 0) ? '<b>Payment:</b> Due' . mdate("%d-%m-%Y", $customer->time) . '<br>' : '<b>Payment:</b> Done<br>'; ?>
        <b>Account:</b> <?= date('Y') . $customer->orderid; ?>
    </div>
    <div class="col-sm-6 invoice-col">
        <address>
            <strong><?= $customer->name; ?></strong><br>
            <?= $customer->address; ?><br>
            <?= $customer->city . ' - ' . $customer->zip . ', ' . $customer->country; ?><br>
            Phone: <?= $customer->mobile; ?><br>
            Email: <?= $customer->email; ?>
        </address>
    </div>
</div>
<div class="row">
    <div class="col-12 table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($invoices as $invoice): ?>
                    <tr>
                        <td><img src="<?= base_url('assets/images/thumbnails/' . $invoice->thumbnail); ?>" alt="Thumb" height="25"></td>
                        <td><?= $invoice->proname; ?></td>
                        <td><?= $invoice->price; ?></td>
                        <td><?= $invoice->quantity; ?></td>
                        <td>৳<?= ($invoice->price * $invoice->quantity); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <p class="lead">Payment Methods:</p>
        <?php if ($customer->payment_type == 'Cash'): ?>
            <i class="fas fa-money-check-alt fa-2x"></i>
            <i class="far fa-money-bill-alt fa-2x"></i>
        <?php else: ?>
            <i class="fab fa-cc-visa fa-2x"></i>
            <i class="fab fa-cc-mastercard fa-2x"></i>
            <i class="fab fa-cc-paypal fa-2x"></i>
        <?php endif; ?>
        <p class="text-muted well well-sm shadow-none text-justify" style="margin-top:10px;">We are using SSL-COMMERZ as our online payment gateway which is completely secured and certified.</p>
    </div>
    <div class="col-6">
        <p class="lead">Payment Status: <?= ($customer->payment_status == 1) ? '<span class="badge badge-success">Paid</span>' : '<span class="badge badge-danger">Unpaid</span>'; ?></p>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>৳<?= $customer->total_amount; ?></td>
                </tr>
                <tr>
                    <th>Shipping:</th>
                    <td>৳50.00</td>
                </tr>
                <tr>
                    <th>Total:</th>
                    <td>৳<?= ($customer->total_amount + 50); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
