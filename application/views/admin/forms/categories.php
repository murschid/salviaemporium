<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Brand & Category Entry</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Brand & Category</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <?php $catgh = array('primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'); ?>
    <section class="content">
        <div class="container-fluid">
            <?php
            $errors = $this->session->flashdata('errors');
            $success = $this->session->flashdata('success');
            ?>
            <?php if (isset($errors)): ?>
                <div class="alert alert-danger"><?php echo $errors; ?></div>
            <?php endif; ?>
            <?php if (isset($success)): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header"><h3 class="card-title">Category Entry</h3></div>
                        <div class="card-body mycards">
                            <?= form_open('action/category_entry'); ?>
                            <div class="form-group">
                                <label>Category Name <span class="text-red">*</span></label>
                                <input type="text" name="category" class="form-control" placeholder="Category" required="">
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                            <?= form_close(); ?>
                            <div class="card-header" style="margin-top:70px;"><h3 class="card-title">All Categories</h3></div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <?php foreach ($categories as $categorie): ?>
                                        <button style="margin:0 0 10px 10px;" type="button" class="btn btn-sm btn-<?= $catgh[rand(0, 6)]; ?>"><?= ucfirst($categorie->category); ?></button>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header"><h3 class="card-title">Brand Entry</h3></div>
                        <div class="card-body mycards">
                            <?= form_open_multipart('action/brand_entry'); ?>
                            <div class="form-group">
                                <label>Brand Name <span class="text-red">*</span></label>
                                <input type="text" name="category" class="form-control" placeholder="Brand" required="">
                            </div>
                            <div class="form-group">
                                <label>Brand Images <span class="text-red">* [1 image & size will be 125x70]</span></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="brand" class="custom-file-input" required="">
                                        <label class="custom-file-label">Choose Images</label>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </div>
                            <?= form_close(); ?>
                            <div class="card-header" style="margin-top:70px;"><h3 class="card-title">All Brands</h3></div>
                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <?php foreach ($brands as $brand): ?>
                                        <button style="margin:0 0 10px 10px;" type="button" class="btn btn-sm btn-<?= $catgh[rand(0, 6)]; ?>"><?= $brand->brand; ?></button>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>