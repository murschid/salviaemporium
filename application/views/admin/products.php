<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>All Products</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Products</li>
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
                        <h3 class="card-title">All Products</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width:200px;">
                                <input type="text" id="produsearch" onkeyup="searchProduct($(this).val())" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append"><button type="button" class="btn btn-default"><i class="fas fa-search"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div id="ajaxproduct" class="card-body table-responsive p-0" style="height:600px;">
                        <table id="example_" class="table table-bordered table-striped table-head-fixed text-nowrap">
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
                                <?php if (count($products) <= 0): ?>
                                    <tr><td colspan="8"><h3 class="text-danger font-weight-bold text-center">No product available!</h3></td></tr>
                                <?php endif; ?>
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
                    </div>
                    <?php $this->load->view('admin/pagination'); ?>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    function searchProduct(product) {
        $.ajax({
            url: baseurl + 'action/searchproduct',
            method: 'POST',
            type: 'html',
            data: {'nameorid': product},
            success: function (result) {
                $('#ajaxproduct').html(result);
            }
        });
    }
</script>