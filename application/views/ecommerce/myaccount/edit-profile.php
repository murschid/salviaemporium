<div class="form-group row">
    <div class="col-12">
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
    </div>
</div>
<?= form_open('customer/editcusprofile'); ?>
<input type="hidden" name="cust_id" value="<?= $customer->id; ?>">
<div class="form-group row">
    <label class="col-md-3 col-form-label form-control-label">Full Name <span class="text-danger">*</span></label>
    <div class="col-md-9">
        <input class="form-control" name="cus_name" type="text" value="<?= $customer->name; ?>" required="">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label form-control-label">Email <span class="text-danger">*</span></label>
    <div class="col-md-9">
        <input class="form-control" name="cus_email" type="email" value="<?= $customer->email; ?>" readonly required="">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label form-control-label">Mobile <span class="text-danger">*</span></label>
    <div class="col-md-9">
        <input class="form-control" name="cus_mobile" type="text" value="<?= $customer->mobile; ?>" required="">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label form-control-label">Address <span class="text-danger">*</span></label>
    <div class="col-md-9">
        <input class="form-control" name="cus_address" type="text" value="<?= $customer->address; ?>" required="">
    </div>
</div>
<div class="form-group row">
    <label class="col-3 col-form-label form-control-label"> City+ZIP <span class="text-danger">*</span></label>
    <div class="col-5">
        <input class="form-control" name="cus_city" type="text" value="<?= $customer->city; ?>" required="">
    </div>
    <div class="col-4">
        <input class="form-control" name="cus_zip" type="text" value="<?= $customer->zip; ?>" required="">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label form-control-label">Country <span class="text-danger">*</span></label>
    <div class="col-md-9">
        <input class="form-control" name="cus_country" type="text" value="<?= $customer->country; ?>" readonly required="">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label form-control-label"></label>
    <div class="col-md-9">
        <input type="submit" class="btn btn-primary" value="Save Changes">
    </div>
</div>
<?= form_close(); ?>