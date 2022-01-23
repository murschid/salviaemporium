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
<div class="form-group row">
    <label class="text-danger col-md">N.B: password would be minimum 6 and maximum 20 characters.</label>
</div>
<?= form_open('customer/changepass'); ?>
<input type="hidden" name="cust_id" value="<?= $customer->id; ?>">
<input type="hidden" name="cust_email" value="<?= $customer->email; ?>">
<div class="form-group row">
    <label class="col-md-3 col-form-label form-control-label">Old Password <span class="text-danger">*</span></label>
    <div class="col-md-9">
        <input class="form-control" type="password" name="choldpass" placeholder="******" required="" minlength="6">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label form-control-label">New Password <span class="text-danger">*</span></label>
    <div class="col-md-9">
        <input class="form-control" type="password" name="chnewpass" placeholder="******" required="" minlength="6">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label form-control-label">Re-New Password <span class="text-danger">*</span></label>
    <div class="col-md-9">
        <input class="form-control" type="password" name="chnewpasstw" placeholder="******" required="" minlength="6">
    </div>
</div>
<div class="form-group row">
    <label class="col-md-3 col-form-label form-control-label"></label>
    <div class="col-md-9">
        <input type="submit" class="btn btn-primary" value="Save Changes">
    </div>
</div>
<?= form_close(); ?>