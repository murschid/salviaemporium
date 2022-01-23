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
                                <h2 class="text-center">Forgot Password?</h2>
                                <p>You can reset your password from here.</p>
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
                                    <?= form_open('customer/passwordrecovery'); ?>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="email" name="email" placeholder="Email Address" class="form-control" required="" minlength="9" maxlength="40">
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
</div>