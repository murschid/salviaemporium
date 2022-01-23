<div class="brand-logo-slider-area bg--light-grey border-top">
    <div class="container wide">
        <div class="row">
            <div class="col-lg-12">
                <div class="brand-logo-slider-wrapper theme-slick-slider" data-slick-setting='{
                     "slidesToShow": 6,
                     "arrows": true,
                     "autoplay": true,
                     "autoplaySpeed": 5000,
                     "speed": 500,
                     "prevArrow": {"buttonClass": "slick-prev", "iconClass": "fa fa-angle-left" },
                     "nextArrow": {"buttonClass": "slick-next", "iconClass": "fa fa-angle-right" }
                     }' data-slick-responsive='[
                     {"breakpoint":1501, "settings": {"slidesToShow": 5} },
                     {"breakpoint":1199, "settings": {"slidesToShow": 4} },
                     {"breakpoint":991, "settings": {"slidesToShow": 3} },
                     {"breakpoint":767, "settings": {"slidesToShow": 2} },
                     {"breakpoint":575, "settings": {"slidesToShow": 2} },
                     {"breakpoint":479, "settings": {"slidesToShow": 1} }
                     ]'>
                    <?php foreach ($brands as $brand): ?>
                        <div class="single-brand-logo">
                            <a href="<?= base_url('ecommerce/brand/' . $brand->id); ?>.html">
                                <img src="<?= base_url('assets/ecommerce/img/brands/' . $brand->image); ?>" class="img-fluid brands-40" alt="100x70">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>