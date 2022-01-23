<div class="table-responsive min-height-five">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Size</th>
                <th>Color</th>
                <th>Price</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($products)): ?><tr class="chckclsmine prodictcheck"><td colspan="6"><h3 class="text-danger text-center">You have no order.</h3></td></tr><?php endif; ?>
            <?php foreach ($products as $product): ?>
                <?php
                $badge = '';
                switch ($product->status) {
                    case 'pending':
                        $badge = 'badge-danger';
                        break;
                    case 'processing':
                        $badge = 'badge-warning';
                        break;
                    case 'shipped':
                        $badge = 'badge-info';
                        break;
                    case 'delivered':
                        $badge = 'badge-success';
                        break;
                }
                ?>
                <tr>
                    <td><a href="<?= base_url('ecommerce/detail/' . $product->product_id); ?>.html"><?= $product->name; ?></a></td>
                    <td><?= $product->size ? $product->size : 'NA'; ?></span></td>
                    <td><?= $product->color ? $product->color : 'NA'; ?></span></td>
                    <td><span class="price">৳<?= $product->price; ?></span></td>
                    <td><span class="badge <?= $badge; ?>"><?= ucfirst($product->status); ?></span></td>
                    <td><?= gmdate('d-m-Y', $product->time); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>