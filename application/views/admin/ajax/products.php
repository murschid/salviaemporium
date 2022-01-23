<table class="table table-bordered table-striped table-head-fixed text-nowrap">
    <thead>
        <tr>
            <th>Images</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Stock</th>
            <th>Published</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if(count($products) <= 0):?>
        <tr><td colspan="8"><h3 class="text-danger font-weight-bold text-center">No product available!</h3></td></tr>
        <?php endif;?>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><img src="<?= base_url('assets/images/thumbnails/' . $product->thumbnail); ?>" alt="Product" height="25"></td>
                <td><?= $product->name; ?></td>
                <td><?= $product->price; ?></td>
                <td><?= $product->category; ?></td>
                <td><?= $product->stock; ?></td>
                <td><?= ($product->publish == 1) ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-danger">No</span>'; ?></td>
                <td><?= unix_to_human($product->time); ?></td>
                <td>
                    <a href="<?= base_url('action/prodedit/' . $product->id); ?>.html"><button class="btn-sm btn-info"><i class="nav-icon fas fa-edit"></i></button></a>
                    <a href="<?= base_url('action/proddlte/' . $product->id); ?>.html" onclick="return confirm('Are you sure?')"><button class="btn-sm btn-danger"><i class="far fa-trash-alt"></i></button></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>