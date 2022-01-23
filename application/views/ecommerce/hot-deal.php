<?php #if (count($hotdeals) >= 1): ?>
    <div class="deal-counter-area section-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="deal-counter-wrapper">
                        <div class="row">
                            <?php foreach ($hotdeals as $hotdeal): ?>
                                <div class="col-lg-5 offset-xl-1 col-md-5 col-sm-5">
                                    <div class="deal-counter-wrapper__image">
                                        <img src="<?= base_url('assets/images/banners/' . $hotdeal->hotdeal_img); ?>" class="img-fluid hotdealimg" alt="460x400">
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-7 col-sm-7">
                                    <div class="deal-counter-wrapper__content">
                                        <h2 class="title"><?= $hotdeal->name; ?></h2>
                                        <p class="description"><?= $hotdeal->short_desc; ?></p>
                                        <div class="deal-countdown" data-countdown="<?= $hotdeal->hotdeal_date; ?>"></div>
                                        <a href="<?= base_url('ecommerce/detail/' . $hotdeal->id); ?>.html" class="theme-button theme-button--alt theme-button--deal-counter">SHOP NOW</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php #endif; ?>