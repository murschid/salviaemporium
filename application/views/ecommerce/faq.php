<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">F.A.Q</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="<?= base_url('ecommerce.html'); ?>">Home</a></li>
                        <li class="active">F.A.Q</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content-wrapper">
    <div class="faq-area section-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="faq-wrapper">
                        <div class="single-faq">
                            <h2 class="faq-title">Shipping information</h2>
                            <div class="accordion" id="shippingInfo">
                                <?php foreach ($shippings as $shipping): ?>
                                    <div class="card">
                                        <div class="card-header" id="heading<?= $shipping->id; ?>">
                                            <h5 class="mb-0"><button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?= $shipping->id; ?>" aria-expanded="true" aria-controls="collapse<?= $shipping->id; ?>"><?= $shipping->title; ?></button></h5>
                                        </div>
                                        <div id="collapse<?= $shipping->id; ?>" class="collapse show" aria-labelledby="heading<?= $shipping->id; ?>" data-parent="#shippingInfo">
                                            <div class="card-body">
                                                <p><?= $shipping->description; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="single-faq">
                            <h2 class="faq-title">Payment information</h2>
                            <div class="accordion" id="paymentInfo">
                                <?php foreach ($payments as $payment): ?>
                                    <div class="card">
                                        <div class="card-header" id="heading<?= $payment->id; ?>">
                                            <h5 class="mb-0"><button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?= $payment->id; ?>" aria-expanded="true" aria-controls="collapse<?= $payment->id; ?>"><?= $payment->title; ?></button></h5>
                                        </div>
                                        <div id="collapse<?= $payment->id; ?>" class="collapse show" aria-labelledby="heading<?= $payment->id; ?>" data-parent="#paymentInfo">
                                            <div class="card-body"><p><?= $payment->description; ?></p></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="single-faq">
                            <h2 class="faq-title">Orders and returns</h2>
                            <div class="accordion" id="orderInfo">
                                <?php foreach ($orders as $order): ?>
                                    <div class="card">
                                        <div class="card-header" id="heading<?= $order->id; ?>">
                                            <h5 class="mb-0"><button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?= $order->id; ?>" aria-expanded="true" aria-controls="collapse<?= $order->id; ?>"><?= $payment->title; ?></button></h5>
                                        </div>
                                        <div id="collapse<?= $order->id; ?>" class="collapse show" aria-labelledby="heading<?= $order->id; ?>" data-parent="#orderInfo">
                                            <div class="card-body"><p><?= $order->description; ?></p></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cta-area--three bg--dark-grey">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-10 col-md-8 text-center text-md-left"><p class="cta-text">Any Unanswered Questions?</p></div>
            <div class="col-lg-2 col-md-4 text-center text-md-right"><a href="<?= base_url('ecommerce/contact.html'); ?>" class="theme-button">CONTACT US</a></div>
        </div>
    </div>
</div>