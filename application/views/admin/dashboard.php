<?php
$online = $this->home_model->total_rows('tb_online', array());
$catcolors = array('primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark');
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard&nbsp;&nbsp;<a href="<?= base_url('admin/addproduct.html'); ?>"><button type="button" class="btn btn-sm btn-danger">Add Product</button></a></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 col-sm-4 col-md-2">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Traffic</span>
                            <span class="info-box-number"><?= $online ? $online : '0'; ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-2">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Memory</span>
                            <span class="info-box-number"><?= $this->benchmark->memory_usage(); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-2">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Loading Time</span>
                            <span class="info-box-number"><?= $this->benchmark->elapsed_time(); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-2">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Customers</span>
                            <span class="info-box-number"><?= $members ? $members : '0'; ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-2">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-shopping-cart"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Sales</span>
                            <span class="info-box-number"><?= $ttlorders ? $ttlorders : '0'; ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-2">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Products</span>
                            <span class="info-box-number"><?= $ttlproducts ? $ttlproducts : '0'; ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Latest Orders</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                        <tr>
                                            <th>OR ID</th>
                                            <th>OR Name</th>
                                            <th>Status</th>
                                            <th>Payment</th>
                                            <th>Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($orders) <= 0): ?>
                                            <tr><td colspan="5"><h3 class="text-danger font-weight-bold text-center">No order available!</h3></td></tr>
                                        <?php endif; ?>
                                        <?php foreach ($orders as $order): ?>
                                            <?php
                                            $badge = '';
                                            switch ($order->status) :
                                                case 'pending': $badge = 'badge-danger';
                                                    break;
                                                case 'processing': $badge = 'badge-warning';
                                                    break;
                                                case 'shipped': $badge = 'badge-info';
                                                    break;
                                                case 'delivered': $badge = 'badge-success';
                                                    break;
                                            endswitch;
                                            ?>
                                            <tr>
                                                <td class="<?= strtolower($order->status); ?>">SEORD<?= $order->id; ?></td>
                                                <td><?= $order->order_name . '-' . $order->time; ?></td>
                                                <td><span class="badge badge-mn <?= $badge; ?>"><?= ucfirst($order->status); ?></span></td>
                                                <td><?= ($order->payment_status == 1) ? '<span class="badge badge-mn badge-success">Paid</span>' : '<span class="badge badge-mn badge-danger">Unpaid</span>'; ?></td>
                                                <td><?= timespan($order->time, now(), 1); ?> ago</td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer text-center">
                                <a href="<?= base_url('admin/orders.html'); ?>" class="uppercase btn btn-sm btn-info">View All Orders</a>
                            </div>
                        </div>
                    </div>
                    <?php if ($setting->maps == 1): ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Orders by Category</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <figure class="highcharts-figure">
                                        <div id="areaChart"></div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recently Added Products</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <ul class="products-list product-list-in-card pl-2 pr-2">
                                <?php if (count($products) <= 0): ?>
                                    <li class="item"><h3 class="text-danger font-weight-bold text-center">No Recent Product Available!</h3></li>
                                <?php endif; ?>
                                <?php foreach ($products as $product): ?>
                                    <li class="item">
                                        <div class="product-img">
                                            <img src="<?= base_url('assets/images/thumbnails/' . $product->thumbnail); ?>" alt="50x50" class="img-size-50">
                                        </div>
                                        <div class="product-info">
                                            <a href="<?= base_url('action/prodedit/' . $product->id); ?>.html" class="product-title"><?= $product->name; ?>
                                                <span class="badge badge-<?= $catcolors[rand(0, 6)]; ?> float-right">৳ <?= $product->price; ?></span></a>
                                            <span class="product-description"><?= $product->category; ?></span>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="card-footer text-center">
                            <a href="<?= base_url('admin/allproducts.html'); ?>" class="uppercase btn btn-sm btn-info">View All Products</a>
                        </div>
                    </div>
                    <?php if ($setting->maps == 1): ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Monthly Order (<span class="text-danger">still demo</span>)</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <figure class="highcharts-figure">
                                        <div id="monthChart"></div>
                                    </figure>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>