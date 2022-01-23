<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Product</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
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
            <?= form_open_multipart('action/product_entry'); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-body mycards">
                            <div class="form-group">
                                <label>Name <span class="text-red">*</span></label>
                                <input type="text" name="prod_name" class="form-control" placeholder='Samsung 32" LED Monitor' required="">
                            </div>
                            <div class="form-group">
                                <label>Buying Price <span class="text-red">*</span></label>
                                <input type="text" name="prod_buyprice" class="form-control" placeholder="2400" required="">
                            </div>
                            <div class="form-group">
                                <label>Selling Price <span class="text-red">*</span></label>
                                <input type="text" name="prod_price" class="form-control" placeholder="2500" required="">
                            </div>
                            <div class="form-group">
                                <label>Previous Price <span class="text-red">[more than original price or same]</span></label>
                                <input type="text" name="prod_preprice" class="form-control" placeholder="2600">
                            </div>
                            <div class="form-group">
                                <label>Total Quantity <span class="text-red">*</span></label>
                                <input type="text" name="prod_quantity" class="form-control" placeholder="20" required="">
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="text" name="prod_avail" class="form-control" placeholder="20" required="">
                            </div>
                            <div class="form-group">
                                <label>Category <span class="text-red">*</span></label>
                                <select name="prod_category" class="form-control" required="">
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?= $category->category; ?>"><?= ucfirst($category->category); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Color <span class="text-red">[use comma (,) to separate, without space]</span></label>
                                <input type="text" name="prod_color" class="form-control" placeholder="Red,Blue,Black">
                            </div>
                            <div class="form-group">
                                <label>Size <span class="text-red">[use comma (,) to separate, without space]</span></label>
                                <input type="text" name="prod_size" class="form-control" placeholder="M,L,X">
                            </div>
                            <div class="form-group">
                                <label>Unite <span class="text-red">*</span></label>
                                <input type="text" name="prod_unite" class="form-control" placeholder="KG/Ps" required="">
                            </div>
                            <div class="form-group">
                                <label>Coupon</label>
                                <input type="text" name="prod_coupon" class="form-control" maxlength="10" placeholder="SPGD20">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-body mycards">
                            <div class="form-group">
                                <label>SKU</label>
                                <input type="text" name="prod_sku" class="form-control" maxlength="10" placeholder="1234">
                            </div>
                            <div class="form-group">
                                <label>Brand <span class="text-red">*</span></label>
                                <select name="brand" class="form-control" required="">
                                    <?php foreach ($brands as $brand): ?>
                                        <option value="<?= $brand->brand; ?>"><?= $brand->brand; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Short Description <span class="text-red">*</span></label>
                                <textarea name="prod_short_desc" class="form-control" rows="2" placeholder="1-2 Lines" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label>Full Description <span class="text-red">*</span></label>
                                <textarea name="prod_desc" class="form-control textarea" rows="2" placeholder="Few Lines" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label>Specification <span class="text-red">*</span></label>
                                <textarea name="prod_spec" class="form-control textarea" rows="2" placeholder="Few Lines" required=""></textarea>
                            </div>
                            <input type="hidden" name="slideryn" value="0">
                            <input type="hidden" name="banneryn" value="0">
                            <input type="hidden" name="hotdealyn" value="0">
                            <div class="form-group">
                                <label>Thumbnail <span class="text-red">*</span><span class="text-red"> [1 image & size will be 100x100]</span></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <img id="uploadedimg" src="#" alt="&nbsp;" height="35px"/>
                                        <input type="file" onchange="readURL(this)" name="thumbnail" class="custom-file-input" required="">
                                        <label class="custom-file-label"><i class="fa fa-image fa-2x"></i></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Images <span class="text-red">*</span><span class="text-red"> [min 3 images & size will be 600x800]</span></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="userfile[]" multiple="" class="custom-file-input" required="">
                                        <label class="custom-file-label"><i class="fa fa-image fa-2x"></i></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Publish <span class="text-red">*</span></label>
                                <select name="prod_publish" class="form-control" required="">
                                    <option value="1" selected="">Publish</option>
                                    <option value="0">Unpublish</option>
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
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#uploadedimg').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>