<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Checkout</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="<?= base_url('ecommerce.html'); ?>">Home</a></li>
                        <li class="active">Checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content-wrapper">
    <div class="checkout-page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php if ($this->session->flashdata('errors') != NULL): ?>
                        <div class="alert alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <?= $this->session->flashdata('errors'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="checkout-form">
                        <?= form_open('cart/payment'); ?>
                        <div class="row row-40">
                            <div class="col-lg-7">
                                <div id="billing-form" class="billing-form">
                                    <h4 class="checkout-title">Shipping Address</h4>
                                    <?php if (!$this->session->userdata('customer_auth')): ?>
                                    <span class="checkout-title"><button class="btn btn-sm btn-info"><a href="<?= base_url('auth/logregis.html?link=ckout'); ?>">Click Here To Login</a></button></span>
                                    <?php endif; ?>
                                    <input type="hidden" name="cust_id" value="<?= isset($customer->id) ? $customer->id : ''; ?>">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <label>Full Name <span class="text-danger">*</span></label>
                                            <input type="text" minlength="3" maxlength="30" name="data_name" value="<?= isset($customer->name) ? $customer->name : ''; ?>" placeholder="Larry Page" required="" <?= isset($customer->name) ? 'readonly' : ''; ?>>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label>Email <!--<span class="text-danger">*</span>--></label>
                                            <input type="email" minlength="9" maxlength="40" name="data_email" value="<?= isset($customer->email) ? $customer->email : ''; ?>" placeholder="name@domain.com" <?= isset($customer->email) ? 'readonly' : ''; ?>>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label>Phone No <span class="text-danger">*</span></label>
                                            <input type="text" minlength="11" maxlength="14" name="data_phone" value="<?= isset($customer->mobile) ? $customer->mobile : ''; ?>" placeholder="01710000000" required="" <?= isset($customer->mobile) ? 'readonly' : ''; ?>>
                                        </div>
                                        <div class="col-12">
                                            <label>Address <span class="text-danger">*</span></label>
                                            <input type="text" minlength="6" maxlength="150" name="data_address" value="<?= isset($customer->address) ? $customer->address : ''; ?>" placeholder="48/11, Block-F, Banani" required="" <?= isset($customer->address) ? 'readonly' : ''; ?>>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label>Town/City <!--<span class="text-danger">*</span>--></label>
                                            <input type="text" minlength="3" maxlength="20" name="data_city" value="<?= isset($customer->city) ? $customer->city : ''; ?>" placeholder="Dhaka" <?= isset($customer->city) ? 'readonly' : ''; ?>>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label>Zip Code <!--<span class="text-danger">*</span>--></label>
                                            <input type="text" minlength="4" maxlength="4" name="data_zip" value="<?= isset($customer->zip) ? $customer->zip : ''; ?>" placeholder="1213" <?= isset($customer->zip) ? 'readonly' : ''; ?>>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <label>Country <!--<span class="text-danger">*</span>--></label>
                                            <input type="text" minlength="4" maxlength="30" name="data_country" value="<?= isset($customer->country) ? $customer->country : 'Bangladesh'; ?>" placeholder="1213" readonly>
                                        </div>
                                        <div class="col-12">
                                            <?php if (!$this->session->userdata('customer_auth')): ?>
                                                <!--<div class="check-box">
                                                    <input type="checkbox" name="createacc" value="1" id="create_account">
                                                    <label for="create_account">Create An Account?</label>
                                                </div>-->
                                            <?php endif; ?>
                                            <?php if ($this->session->userdata('customer_auth')): ?>
                                                <!--<div class="check-box">
                                                    <input type="checkbox" name="shipdfrtadd" value="1" id="shiping_address" data-shipping>
                                                    <label for="shiping_address">Shipping To Different Address</label>
                                                </div>-->
                                            <?php endif; ?>
                                        </div>
                                        <?php if ($this->session->userdata('customer_auth')): ?>
                                        <div class="col-12"><h4 class="text-success">N.B: You are <u>logged in</u> and your default address will be used for billing & shipping.</h4></div>
                                        <?php else : ?>
                                        <div class="col-12"><h4 class="text-danger">N.B: You are <u>logged out</u>, your entered address will be used for billing & shipping.</h4></div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <!-- Shipping Address -->
                                <!--<div id="shipping-form" class="shipping-form">
                                    <h4 class="checkout-title">Shipping Address</h4>
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <label>Full Name*</label>
                                            <input type="text" name="new_name" placeholder="Larry Page" minlength="3" maxlength="30">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label>Email*</label>
                                            <input type="email" name="new_email" placeholder="email@gmail.com" minlength="10" maxlength="40">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label>Phone No*</label>
                                            <input type="text" name="new_phone" minlength="11" placeholder="01710000000" maxlength="14">
                                        </div>
                                        <div class="col-12">
                                            <label>Address*</label>
                                            <input type="text" name="new_address" minlength="10" maxlength="150" placeholder="48/11, Block-F, Banani">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label>Town/City*</label>
                                            <input type="text" name="new_city" placeholder="Dhaka" minlength="3" maxlength="20">
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <label>Zip Code*</label>
                                            <input type="text" name="new_zip" minlength="4" maxlength="4" placeholder="1213">
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <label>Country</label>
                                            <input type="text" name="new_country" value="Bangladesh" minlength="4" maxlength="30" readonly>
                                        </div>
                                    </div>
                                </div>-->
                            </div>
                            <div class="col-lg-5">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="checkout-title">Cart Total</h4>
                                        <div class="checkout-cart-total">
                                            <h4>Product <span>Total</span></h4>
                                            <ul>
                                                <?php foreach ($this->cart->contents() as $items): ?>
                                                    <li><?= $items['name']; ?> X <?= $items['qty']; ?> <span>৳<?= $this->cart->format_number($items['subtotal']); ?></span></li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <p>Sub Total <span>৳<?= $this->cart->format_number($this->cart->total()); ?></span></p>
                                            <p>Shipping Fee <span>৳50.00</span></p>
                                            <h4>Grand Total <span>৳<?= $this->cart->format_number($this->cart->total() + 50); ?></span></h4>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <h4 class="checkout-title">Payment Methods</h4>
                                        <div class="checkout-payment-method">
                                            <h4>For bKash, Rocket & Nagad (<span class="text-danger">01818710546</span>)</h4>
                                            <div class="single-method">
                                                <input type="radio" id="payment_cash" name="paymentmethod" value="Cash" required>
                                                <label for="payment_cash">Cash On Delivery</label>
                                                <!--<p data-method="cash">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>-->
                                            </div>
                                            <div class="single-method">
                                                <input type="radio" id="payment_payoneer" name="paymentmethod" value="Mobile" required>
                                                <label for="payment_payoneer">Mobile Payment (bKash, Rocket, Nagad)</label>
                                                <input type="text" id="mobilecon" name="mobilecon" placeholder="Transaction No">
                                                <!--<p data-method="payoneer">Please send a Check to Store name with Store Street, Store Town, Store State, Store Postcode, Store Country.</p>-->
                                            </div>
                                            <div class="single-method">
                                                <input type="checkbox" id="accept_terms" name="termsandconds" required="" checked>
                                                <label class="termsncons" for="accept_terms"><a href="<?= base_url('ecommerce/terms.html'); ?>">Terms & Conditions <span class="text-danger">*</span></a></label>
                                            </div>
                                        </div>
                                        <button type="submit" class="theme-button place-order-btn">PLACE ORDER</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on('click', '.cuspassfieldshow', function () {
        $('.cuspassfield').toggle();
    });
    $(document).on('click', '#payment_payoneer', function () {
        $('#mobilecon').show('slow');
    });
    $(document).on('click', '.place-order-btn', function () {
        if($('#accept_terms').prop('checked') !== true){
            $('.termsncons').addClass('termsnconsred');
        }
    });
</script>