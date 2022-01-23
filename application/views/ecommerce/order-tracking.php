<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Order Tracking</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="<?= base_url('ecommerce.html'); ?>">Home</a></li>
                        <li class="active">Order Tracking</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content-wrapper">
    <div class="order-tracking-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="order-tracking-wrapper">
                        <h3 class="text-danger text-center"><u>Currently Unavailable!</u></h3>
                        <div class="order-track-form">
                            <p>To track your order please enter your Order ID in the box below and press / click the "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="orderId">Order ID</label>
                                    <input type="text" id="orderId" placeholder="Found in your order confirmation email">
                                </div>
                                <div class="col-lg-12">
                                    <label for="orderEmail">Billing Email</label>
                                    <input type="text" id="orderEmail" placeholder="Email you used during checkout">
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="theme-button theme-button--order-track">TRACK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>