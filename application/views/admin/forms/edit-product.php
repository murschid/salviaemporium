<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
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
            <?= form_open_multipart('action/product_update'); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-body mycards">
                            <input type="hidden" name="prod_id" value="<?= $product->id; ?>">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="prod_name" value="<?= $product->name; ?>" class="form-control" placeholder="Condom" required="">
                            </div>
                            <div class="form-group">
                                <label>Buying Price <span class="text-red">*</span></label>
                                <input type="text" name="prod_buyprice" value="<?= $product->buying_price; ?>" class="form-control" placeholder="2400" required="">
                            </div>
                            <div class="form-group">
                                <label>Selling Price <span class="text-danger">*</span></label>
                                <input type="text" name="prod_price" value="<?= $product->price; ?>" class="form-control" placeholder="50" required="">
                            </div>
                            <div class="form-group">
                                <label>Previous Price</label>
                                <input type="text" name="prod_preprice" value="<?= $product->pre_price; ?>" class="form-control" placeholder="60">
                            </div>
                            <div class="form-group">
                                <label>Total Quantity <span class="text-danger">*</span></label>
                                <input type="text" name="prod_quantity" value="<?= $product->total_product; ?>" class="form-control" placeholder="20" required="">
                            </div>
                            <div class="form-group">
                                <label>Stock <span class="text-danger">*</span></label>
                                <input type="text" name="prod_avail" value="<?= $product->stock; ?>" class="form-control" placeholder="60" required="">
                            </div>
                            <div class="form-group">
                                <label>Category <span class="text-danger">*</span></label>
                                <select name="prod_category" class="form-control" required="">
                                    <option value="<?= $product->category; ?>" selected><?= ucfirst($product->category); ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Color</label>
                                <input type="text" name="prod_color" value="<?= $product->color; ?>" class="form-control" placeholder="Red">
                            </div>
                            <div class="form-group">
                                <label>Size</label>
                                <input type="text" name="prod_size" value="<?= $product->size; ?>" class="form-control" placeholder="M">
                            </div>
                            <div class="form-group">
                                <label>Unite <span class="text-danger">*</span></label>
                                <input type="text" name="prod_unite" value="<?= $product->unite; ?>" class="form-control" placeholder="KG/Ps" required="">
                            </div>
                            <div class="form-group">
                                <label>Coupon</label>
                                <input type="text" name="prod_coupon" value="<?= $product->coupon; ?>" class="form-control" placeholder="SPGD20">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-body mycards">
                            <div class="form-group">
                                <label>SKU</label>
                                <input type="text" name="prod_sku" value="<?= $product->sku; ?>" class="form-control" maxlength="10" placeholder="1234">
                            </div>
                            <div class="form-group">
                                <label>Brand  <span class="text-danger">*</span></label>
                                <select name="brand" class="form-control" required="">
                                    <option value="<?= $product->brand; ?>" selected><?= $product->brand; ?></option>
                                    <?php foreach ($brands as $brand): ?>
                                        <option value="<?= $brand->brand; ?>"><?= $brand->brand; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Short Description <span class="text-danger">*</span></label>
                                <textarea name="prod_short_desc" class="form-control" rows="2" placeholder="1-2 Lines" required=""><?= $product->short_desc; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Full Description <span class="text-danger">*</span></label>
                                <textarea name="prod_desc" class="form-control textarea" rows="2" placeholder="Few Lines" required=""><?= $product->description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Specification <span class="text-danger">*</span></label>
                                <textarea name="prod_spec" class="form-control textarea" rows="2" placeholder="Few Lines" required=""><?= $product->specification; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Thumbnail  <span class="text-danger"></span></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="thumbnail" class="custom-file-input">
                                        <label class="custom-file-label myimglbl">
                                            <?php foreach (explode(',', $product->thumbnail) as $key): ?>
                                                <img src="<?= base_url('assets/images/thumbnails/' . $key); ?>" alt="100x100" height="35">
                                            <?php endforeach; ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="userfile[]" multiple="" class="custom-file-input">
                                        <label class="custom-file-label myimglbl">
                                            <?php foreach (explode(',', $product->images) as $key): ?>
                                                <img src="<?= base_url('assets/images/products/' . $key); ?>" alt="600x800" height="35">
                                            <?php endforeach; ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Publish <span class="text-danger">*</span></label>
                                <select name="prod_publish" class="form-control">
                                    <option value="1" <?= $product->publish == '1' ? 'selected' : ''; ?>>Publish</option>
                                    <option value="0" <?= $product->publish == '0' ? 'selected' : ''; ?>>Unpublish</option>
                                </select>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </section>
</div>