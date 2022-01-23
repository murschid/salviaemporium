<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin | Invoice</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= base_url('assets/css/fontawesome/css/all.min.css') ?>">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.css'); ?>">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body style="width:21cm; height:29.5cm; margin:0 auto;">
        <div class="wrapper">
            <section class="invoice" style="padding:10px; height:29cm;">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="page-header"><i class="fas fa-globe"></i> Salvia Emporium Ltd.<small class="float-right">Date: <?= date('d-m-Y'); ?></small></h4>
                    </div>
                </div>
                <div class="row invoice-info">
                    <div class="col-md-5 invoice-col">
                        From,
                        <address>
                            <strong>Salvia Emporium Ltd.</strong><br>
                            24/1, Nalbhog Main Road (Rupayan City Gate),<br>
                            Uttara - 12, Dhaka - 1230, Bangladesh<br>
                            Phone: +8801723888888<br>
                            Email: info@salviaemporium.com
                        </address>
                    </div>
                    <div class="col-md-4 invoice-col">
                        To,
                        <address>
                            <strong><?= $customer->name; ?></strong><br>
                            <?= $customer->address; ?><br>
                            <?= $customer->city . ' - ' . $customer->zip . ', ' . $customer->country; ?><br>
                            Phone: <?= $customer->mobile; ?><br>
                            Email: <?= $customer->email; ?>
                        </address>
                    </div>
                    <div class="col-md-3 invoice-col">
                        <b>Invoice No: <?= time(); ?></b><br>
                        <br>
                        <b>Order No:</b> SEORD<?= $customer->orderid; ?><br>
                        <?= ($customer->payment_status == 0) ? '<b>Payment:</b> Due' . mdate("%d-%m-%Y", $customer->time) . '<br>' : '<b>Payment:</b> Done<br>'; ?>
                        <b>Account:</b> <?= date('Y') . $customer->orderid; ?>
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
                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">We are using SSL-COMMERZ as our online payment gateway which is completely secured and certified.</p>
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
            </section>
        </div>
        <script type="text/javascript">
            window.addEventListener("load", window.print());
        </script>
    </body>
</html>
