<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="callout callout-info"><span class="font-weight-bolder"><i class="fas fa-info"></i> NOTE:</span>This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.</div>
                    <div id="invoice" class="invoice p-3 mb-3">
                        <div class="row">
                            <div class="col-md-12">
                                <h4><i class="fas fa-globe"></i> Salvia Emporium Ltd.<small class="float-right">Date: <?= date('d-m-Y'); ?></small></h4>
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
                                        <?php if (count($invoices) <= 0): ?>
                                            <tr><td colspan="6"><h3 class="text-danger font-weight-bold text-center">No product available!</h3></td></tr>
                                        <?php endif; ?>
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
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="<?= base_url('order/printinvoice/' . $customer->orderid); ?>.html" target="_blank" class="btn btn-info"><i class="fas fa-print"></i> Print</a>
                                <button type="button" onclick="generatePDF()" class="btn btn-primary float-right" style="margin-right:5px;"><i class="fas fa-download"></i> Generate PDF</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function generatePDF() {
        const element = document.getElementById('invoice');
        var options = {
            margin: 0,
            filename: 'Invoice.pdf',
            html2canvas: {scale: 5},
            jsPDF: {unit: 'in', format: 'A4', orientation: 'portrait'}
        };
        html2pdf().from(element).set(options).save();
    }
</script>