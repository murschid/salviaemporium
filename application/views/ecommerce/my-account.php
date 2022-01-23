<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">My Account</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="<?= base_url('ecommerce'); ?>">Home</a></li>
                        <li class="active">My Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content-wrapper">
    <div class="myaccount-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-5 col-xs-12 col-lg-5">
                    <?= form_open('auth/customer_login'); ?>
                        <div class="login-form login-form--extra-space">
                            <h4 class="login-title">Login</h4>
                            <div class="row">
                                <div class="col-12">
                                    <label>Email<span class="text-danger"> *</span></label>
                                    <input type="email" name="cus_email" placeholder="username@yourdomain.com" required="" minlength="6" maxlength="30">
                                </div>
                                <div class="col-12">
                                    <label>Password<span class="text-danger"> *</span></label>
                                    <input type="password" name="cus_password" placeholder="******" required="" minlength="6" maxlength="20">
                                </div>
                                <div class="col-6">
                                    <div class="check-box d-inline-block">
                                        <input type="checkbox" id="remember_me">
                                        <label for="remember_me">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-6 text-left text-md-right">
                                    <a href="<?= base_url('customer/forgotpassword.html'); ?>" class="forget-pass-link">Forgot Password?</a>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="theme-button">Login</button>
                                </div>
                            </div>
                        </div>
                    <?= form_close(); ?>
                </div>
                <div class="col-sm-12 col-md-7 col-lg-7 col-xs-12">
                    <?= form_open('auth/customer_regist'); ?>
                        <div class="login-form">
                            <h4 class="login-title">Register</h4>
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <label>Full Name<span class="text-danger"> *</span></label>
                                    <input type="text" name="cus_name" placeholder="Larry Page" minlength="3" maxlength="30" required="">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label>Email Address<span class="text-danger"> *</span></label>
                                    <input type="email"  name="cus_email" placeholder="username@yourdomain.com" minlength="6" maxlength="30" required="">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label>Mobile<span class="text-danger"> *</span></label>
                                    <input type="text" name="cus_mobile" placeholder="01710000000" minlength="11" maxlength="14" required="">
                                </div>
                                <div class="col-md-6">
                                    <label>Password<span class="text-danger"> *</span></label>
                                    <input type="password" name="cus_passone" placeholder="******" minlength="6" maxlength="20" required="">
                                </div>
                                <div class="col-md-6">
                                    <label>Confirm Password<span class="text-danger"> *</span></label>
                                    <input type="password" name="cus_passtwo" id="password" placeholder="******" minlength="6" maxlength="20" required="">
                                </div>
                                <div class="col-12">
                                    <label>Shipping Address<span class="text-danger"> *</span></label>
                                    <input type="text" name="cus_address" placeholder="48/11, Block-F, Banani" minlength="10" maxlength="150" required="">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label>City<span class="text-danger"> *</span></label>
                                    <input type="text" name="cus_city" placeholder="Dhaka" minlength="3" maxlength="20" required="">
                                </div>
                                <div class="col-md-6 col-12">
                                    <label>ZIP<span class="text-danger"> *</span></label>
                                    <input type="text" name="cus_zip" placeholder="1213" minlength="4" maxlength="10" required="">
                                </div>
                                <div class="col-md-12 col-12">
                                    <label>Country<span class="text-danger"> *</span></label>
                                    <input type="text" name="cus_country" value="Bangladesh" required="" readonly>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="theme-button">Register</button>
                                </div>
                            </div>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>