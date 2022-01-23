<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Password Recovery</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="<?= base_url('ecommerce'); ?>">Home</a></li>
                        <li class="active">Password Recovery</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content-wrapper">
    <div class="myaccount-wrapper">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <h3><i class="fa fa-lock fa-3x"></i></h3>
                                <h4>Please change your new password form here</h4>
                            </div>
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
                            <div class="panel-body">
                                <?= form_open('customer/passwordrecoveryform'); ?>
                                <div class="form-group">
                                    <input type="hidden" name="hisemail" value="">
                                    <div class="form-group">
                                        <label>New Password<span class="text-danger"> *</span></label>
                                        <input type="password" name="password" placeholder="******" class="form-control" required="" minlength="6" maxlength="20">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm New Password<span class="text-danger"> *</span></label>
                                        <input type="password" name="conpassword" placeholder="******" class="form-control" required="" minlength="6" maxlength="20">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-md btn-primary btn-block" value="Reset Password">
                                </div>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>