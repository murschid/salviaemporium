<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>All Orders</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">All Orders</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width:200px;">
                                <input type="text" class="form-control float-right" id="serorder" onkeyup="searchOrder($(this).val())" placeholder="Search">
                                <div class="input-group-append"><button type="button" class="btn btn-default"><i class="fas fa-search"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link <?= isset($ordercls['first']) ? $ordercls['first'] : ''; ?>" href="<?= base_url('admin/torders.html'); ?>">Today's</a></li>
                        <li class="nav-item"><a class="nav-link <?= isset($ordercls['second']) ? $ordercls['second'] : ''; ?>" href="<?= base_url('admin/worders.html'); ?>">This Week</a></li>
                        <li class="nav-item"><a class="nav-link <?= isset($ordercls['third']) ? $ordercls['third'] : ''; ?>" href="<?= base_url('admin/morders.html'); ?>">This Month</a></li>
                        <li class="nav-item"><a class="nav-link <?= isset($ordercls['fifth']) ? $ordercls['fifth'] : ''; ?>" href="<?= base_url('admin/porders.html'); ?>">Pending</a></li>
                        <li class="nav-item"><a class="nav-link <?= isset($ordercls['fourth']) ? $ordercls['fourth'] : ''; ?>" href="<?= base_url('admin/orders.html'); ?>">All</a></li>
                    </ul>
                    <div id="ajaxorder" class="card-body table-responsive p-0">
                        <table id="example_" class="table table-bordered table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>OR ID</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>P-Type</th>
                                    <th>P-Status</th>
                                    <th>Status</th>
                                    <th>Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($orders) <= 0): ?>
                                    <tr><td colspan="8"><h3 class="text-danger font-weight-bold text-center">No order available!</h3></td></tr>
                                <?php endif; ?>
                                <?php foreach ($orders as $product): ?>
                                    <tr>
                                        <td class="<?= strtolower($product->status); ?>">SEORD<?= $product->id; ?></td>
                                        <td><?= $product->order_name . '-' . $product->time; ?></td>
                                        <td><?= $product->total_amount; ?></td>
                                        <td><?= $product->payment_type; ?></td>
                                        <td>
                                            <select class="paystatus" for="<?= $product->id; ?>">
                                                <option value="0" <?= $product->payment_status == 0 ? 'selected' : ''; ?>>Unpaid </option>
                                                <option value="1" <?= $product->payment_status == 1 ? 'selected' : ''; ?>>Paid</option>
                                            </select>&nbsp;&nbsp;
                                            <?= ($product->payment_status == 1) ? '<i class="fas fa-check-square text-success fasize"></i>' : '<i class="fa fa-window-close text-danger fasize"></i>'; ?>
                                        </td>
                                        <td>
                                            <select class="orderstatus" for="<?= $product->id; ?>">
                                                <option value="pending" <?= $product->status == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                                <option value="processing" <?= $product->status == 'processing' ? 'selected' : ''; ?>>Processing</option>
                                                <option value="shipped" <?= $product->status == 'shipped' ? 'selected' : ''; ?>>Shipped</option>
                                                <option value="delivered" <?= $product->status == 'delivered' ? 'selected' : ''; ?>>Delivered</option>
                                                <option value="cancel" <?= $product->status == 'cancel' ? 'selected' : ''; ?>>Cancel</option>
                                            </select>&nbsp;&nbsp;
                                            <?= ($product->status == 'pending') ? '<i class="fa fa-window-close fasize text-danger"></i>' : '<i class="fas fa-check-square fasize ' . $product->status . '"></i>'; ?>
                                        </td>
                                        <!--<td><?#= timespan($product->time, now(), 1); ?> ago</td>-->
                                        <td><?= mdate('%d-%m-%Y  %h:%i %a', $product->time); ?></td>
                                        <td>
                                            <button type="button" class="btn-sm btn-info" data-toggle="modal" data-target="#ordermodal" onclick="getorderbymod(<?= $product->id; ?>)"><i class="fa fa-eye"></i></button>
                                            <a href="<?= base_url('order/invoices/' . $product->id); ?>.html"><button class="btn-sm btn-primary"><i class="fas fa-file-invoice-dollar"></i></button></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="ordermodal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Order Details</h4>
                        <button  type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body" id="modalbody"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default float-right" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">

    function searchOrder(ordid) {
        $.ajax({
            url: baseurl + 'action/ordersearch',
            method: 'POST',
            type: 'html',
            data: {'nameorid': ordid},
            success: function (result) {
                $('#ajaxorder').html(result);
            }
        });
    }

    $(document).on('change', '.orderstatus', function () {
        if (confirm('Are you sure?') === true) {
            var status = $(this).val();
            var ordid = $(this).attr('for');
            $.ajax({
                url: baseurl + 'order/orderupdate',
                method: 'POST',
                type: 'html',
                data: {'id': ordid, 'status': status},
                success: function (result) {
                    console.log(result);
                    window.location.reload();
                }
            });
        } else {
            return false;
        }
    });

    $(document).on('change', '.paystatus', function () {
        if (confirm('Are you sure?') === true) {
            var paystus = $(this).val();
            var ordrid = $(this).attr('for');
            $.ajax({
                url: baseurl + 'order/paytypsttsupdt',
                method: 'POST',
                type: 'html',
                data: {'id': ordrid, 'payment_status': paystus},
                success: function (result) {
                    console.log(result);
                    window.location.reload();
                }
            });
        } else {
            return false;
        }
    });

    function getorderbymod(orid) {
        $.ajax({
            url: baseurl + 'order/orderbymod',
            method: 'POST',
            type: 'html',
            data: {'orid': orid},
            success: function (result) {
                $('#modalbody').html(result);
            }
        });
    }
</script>