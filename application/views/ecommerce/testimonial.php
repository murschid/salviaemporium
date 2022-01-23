<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Customer's Feedback</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="<?= base_url('ecommerce.html'); ?>">Home</a></li>
                        <li class="active">Testimonials</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content-wrapper">
    <div class="testimonial-element-area testimonial-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="testimonial-content-wrapper">
                        <div class="row row-0 align-items-center">
                            <div class="col-lg-6">
                                <div class="testimonial-image">
                                    <img src="<?= base_url('assets/ecommerce/img/backgrounds/image-new.jpg'); ?>" class="img-fluid" alt="450x450">
                                    <div class="icon">
                                        <i class="fa fa-quote-left"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="testimonial-content">
                                    <div class="testimonial-wrapper theme-slick-slider" data-slick-setting='{
                                         "slidesToShow": 1,
                                         "slidesToScroll": 1,
                                         "arrows": false,
                                         "dots": true,
                                         "autoplay": true,
                                         "autoplaySpeed": 5000,
                                         "speed": 500,
                                         "prevArrow": {"buttonClass": "slick-prev", "iconClass": "fa fa-angle-left" },
                                         "nextArrow": {"buttonClass": "slick-next", "iconClass": "fa fa-angle-right" }
                                         }' data-slick-responsive='[
                                         {"breakpoint":1501, "settings": {"slidesToShow": 1, "arrows": false} },
                                         {"breakpoint":1199, "settings": {"slidesToShow": 1, "arrows": false} },
                                         {"breakpoint":991, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} },
                                         {"breakpoint":767, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} },
                                         {"breakpoint":575, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} },
                                         {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} }
                                         ]'>
                                             <?php foreach ($testimonials as $testimonial): ?>
                                            <div class="single-testimonial">
                                                <div class="single-testimonial__image">
                                                    <img src="<?= base_url('assets/images/testimonial/' . $testimonial->photo); ?>" class="img-fluid" alt="80x80">
                                                </div>
                                                <div class="single-testimonial__content">
                                                    <p class="testimonial-text"><?= $testimonial->speech; ?></p>
                                                    <p class="testimonial-author"><?= $testimonial->name; ?></p>
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
    </div>
</div>
<div class="footer-newsletter-small-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="footer-newsletter-text">
                    <i class="pe-7s-mail-open-file"></i>
                    <span>SIGN UP TO NEWSLETTER</span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer-newsletter-form text-center text-lg-right">
                    <?= form_open('customer/subscribe'); ?>
                    <input type="email" placeholder="Your Email" required="" name="subscribe" minlength="10" maxlength="50">
                    <button type="submit"> <i class="fa fa-paper-plane-o"></i></button>
                        <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>