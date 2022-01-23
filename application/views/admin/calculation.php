<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Financial Calculation</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Finance</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xl-6 col-md-6 col-xs-12">
                <div class="card card-secondary">
                    <div class="card-header"><h3 class="card-title">Products (Last 10)</h3></div>
                    <div class="card-body table-responsive p-0" style="max-height:400px;">
                        <table id="example_" class="table table-bordered table-striped table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($products) <= 0): ?>
                                    <tr><td colspan="5"><h3 class="text-danger font-weight-bold text-center">No product available!</h3></td></tr>
                                <?php endif; ?>
                                <?php $sls = 1; ?>
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td><?= $sls++; ?></td>
                                        <td><?= $product->name; ?></td>
                                        <td><?= $product->buying_price; ?></td>
                                        <td><?= $product->total_product; ?></td>
                                        <td><?= gmdate('d-m-Y', $product->time); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"><h3 class="card-title">Total Amount:&nbsp;&nbsp;<span class="text-danger text-bold">৳ <?= $productsum; ?></span></h3></div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6 col-xs-12">
                <div class="card card-secondary">
                    <div class="card-header"><h3 class="card-title">Sales (Last 10)</h3></div>
                    <div class="card-body table-responsive p-0" style="max-height:400px;">
                        <table id="example_" class="table table-bordered table-striped table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>OR ID</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($orders) <= 0): ?>
                                    <tr><td colspan="5"><h3 class="text-danger font-weight-bold text-center">No sale available!</h3></td></tr>
                                <?php endif; ?>
                                <?php foreach ($orders as $order): ?>
                                    <tr class="active">
                                        <td>SEORD<?= $order->id; ?></td>
                                        <td><?= $order->order_name . '-' . $order->time; ?></td>
                                        <td><?= $order->total_amount; ?></td>
                                        <td><?= $order->payment_type; ?></td>
                                        <td><?= gmdate('d-m-Y', $order->time); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"><h3 class="card-title">Total Amount:&nbsp;&nbsp;<span class="text-danger text-bold">৳ <?= $ordersum->total_amount; ?></h3></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card card-dark">
                    <div class="card-header cardborder">
                        <h1 class="card-title">Purchased :&nbsp;&nbsp;<span class="text-warning text-bold">৳ <?= $productsum; ?></span></h1>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card card-dark">
                    <div class="card-header cardborder">
                        <h1 class="card-title">Sales Amount :&nbsp;&nbsp;<span class="text-warning text-bold">৳ <?= $ordersum->total_amount; ?></span></h1>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card card-dark">
                    <div class="card-header cardborder">
                        <h1 class="card-title">In House :&nbsp;&nbsp;<span class="text-warning text-bold">৳ <?= $inhouse; ?></span></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-4">
                <div class="card card-dark">
                    <div class="card-header cardborder">
                        <h1 class="card-title text-center">Pending Order :&nbsp;&nbsp;<span class="<?= $pendordersum->total_amount <= 0 ? 'text-danger' : 'text-success'; ?> text-bold">৳ <?= $pendordersum->total_amount; ?></span></h1>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card card-dark">
                    <div class="card-header cardborder">
                        <?php $prolossamt = sprintf('%.2f', (($ordersum->total_amount + $pendordersum->total_amount) - ($productsum - $inhouse))); ?>
                        <h1 class="card-title text-center">Profit / Loss :&nbsp;&nbsp;<span class="<?= $prolossamt <= 0 ? 'text-danger' : 'text-success'; ?> text-bold">৳ <?= $prolossamt; ?></span></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>