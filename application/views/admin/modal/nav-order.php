<?php foreach ($orders as $order): ?>
    <a class="dropdown-item ordercountcls">
        <div class="media">
            <img src="<?= base_url('assets/images/goods/' . rand(1, 10) . '.png'); ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
            <div class="media-body">
                <h3 class="dropdown-item-title"><?= $order->order_name; ?><span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span></h3>
                <p class="text-sm">New order from customer...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?= timespan($order->time, now(), 1); ?> Ago</p>
            </div>
        </div>
    </a>
    <div class="dropdown-divider"></div>
<?php endforeach; ?>
<a href="<?= base_url('admin/torders.html'); ?>" class="dropdown-item dropdown-footer">See All Orders</a>