<div class="footer-area border-top">
    <div class="footer-navigation-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-custom-xl-6">
                    <div class="row">
                        <div class="col-4 col-sm-4">
                            <div class="footer-widget">
                                <h4 class="footer-widget__title text-uppercase"><?= lang('about');?></h4>
                                <nav class="footer-widget__navigation">
                                    <ul>
                                        <li><a href="<?= base_url('ecommerce/faq.html'); ?>"><?= lang('faqs');?></a></li>
                                        <!--<li><a href="<?= base_url('ecommerce/brands.html'); ?>">Brands</a></li>-->
                                        <li><a href="<?= base_url('ecommerce/about.html'); ?>"><?= lang('about');?></a></li>
                                        <li><a href="<?= base_url('ecommerce/contact.html'); ?>"><?= lang('contact');?></a></li>
                                        <li><a href="<?= base_url('ecommerce/testimonial.html'); ?>"><?= lang('subscription');?></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4">
                            <div class="footer-widget">
                                <h4 class="footer-widget__title text-uppercase"><?= lang('services');?></h4>
                                <nav class="footer-widget__navigation">
                                    <ul>
                                        <li><a href="<?= base_url('ecommerce/howorder.html'); ?>"><?= lang('how_order');?></a></li>
                                        <li><a href="<?= base_url('ecommerce/testimonial.html'); ?>"><?= lang('feedback');?></a></li>
                                        <li><a href="<?= base_url('ecommerce/measuring.html'); ?>"><?= lang('measurement');?></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-4 col-sm-4">
                            <div class="footer-widget">
                                <h4 class="footer-widget__title text-uppercase"><?= lang('policies');?></h4>
                                <nav class="footer-widget__navigation">
                                    <ul>
                                        <li><a href="<?= base_url('ecommerce/privacy.html'); ?>"><?= lang('privacy_policy');?></a></li>
                                        <li><a href="<?= base_url('ecommerce/returns.html'); ?>"><?= lang('returns_policy');?></a></li>
                                        <li><a href="<?= base_url('ecommerce/warranty.html'); ?>"><?= lang('warranty_policy');?></a></li>
                                        <li><a href="<?= base_url('ecommerce/shipping.html'); ?>"><?= lang('ship_policy');?></a></li>
                                        <li><a href="<?= base_url('ecommerce/terms.html'); ?>"><?= lang('terms');?></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 col-custom-xl-6">
                    <div class="row">
                        <div class="col-12 col-xs-12">
                            <div class="footer-widget footer-widget--two">
                                <h4 class="footer-widget__title text-uppercase"><?= lang('subscription');?></h4>
                                <div class="newsletter-form-area">
                                    <?= form_open('customer/subscribe'); ?>
                                    <div class="footer-widget__newsletter-form">
                                        <input type="email" name="subscribe" placeholder="email@email.com" required minlength="10" maxlength="50">
                                        <button type="submit"><i class="fa fa-paper-plane-o"></i></button>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                            <div class="footer-widget footer-widget--two">
                                <span class="footer-widget__text footer-widget__text--two"><?= lang('follow_us');?></span>
                                <ul class="footer-widget__social-links">
                                    <li><a href="https://www.facebook.com/107080127728397" target="_blank" title="Facebook"><i class="fa fa-facebook-square"></i></a></li>
                                    <li><a href="#" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#" target="_blank" title="Google+"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#" target="_blank" title="<?= $this->benchmark->elapsed_time(); ?>"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="#" target="_blank" title="<?= $this->benchmark->memory_usage(); ?>"><i class="fa fa-youtube-play"></i></a></li>
                                </ul>
                            </div>
                            <div class="footer-payment-logo">
                                <img src="<?= base_url('assets/ecommerce/img/icons/sslcom.png'); ?>" class="img-fluid imghundred" alt="350x50">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright-area border-top">
        <div class="container wide">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-text text-center"><?= lang('copyright');?></div>
                </div>
            </div>
        </div>
    </div>
</div>