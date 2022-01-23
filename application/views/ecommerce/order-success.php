<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Success Message</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="<?= base_url('ecommerce.html'); ?>">Home</a></li>
                        <li class="active">Order Success</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content-wrapper">
    <div class="section-space">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="jumbotron text-center">
                        <h1 class="display-3 text-success font-weight-bold"><?= $message ? $message : ''; ?></h1>
                        <p class="lead"><strong>One of our executive will contact you very soon over phone. Please check your email for further information.</strong></p>
                        <hr>
                        <p><strong>Having Any Trouble?</strong>  <a class="btn btn-sm btn-info" href="<?= base_url('ecommerce/contact.html'); ?>">Contact Us</a></p>
                        <p class="lead"><a class="btn btn-info" href="<?= base_url('ecommerce.html'); ?>" role="button">Continue Shopping</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>