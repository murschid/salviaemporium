<div class="product-widget-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="product-widget-wrapper">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="single-product-widget-wrapper">
                                <h3 class="single-product-widget-title"><?= lang('featured');?></h3>
                                <?php $no = 0; ?>
                                <?php foreach ($products as $product): $no++; ?>
                                    <div class="single-widget-product">
                                        <div class="single-widget-product__image">
                                            <a href="<?= base_url('ecommerce/detail/' . $product->id); ?>.html">
                                                <img src="<?= base_url('assets/images/thumbnails/' . $product->thumbnail); ?>" class="img-fluidth" alt="100x100" width="100" style="height:100px;width:auto;">
                                            </a>
                                        </div>
                                        <div class="single-widget-product__content">
                                            <h3 class="title"><a href="<?= base_url('ecommerce/detail/' . $product->id); ?>.html"><?= $product->name; ?></a></h3>
                                            <div class="price"><span class="main-price">৳<?= $product->price; ?></span></div>
                                        </div>
                                    </div>
                                    <?php if ($no == 5) : break; ?>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="single-product-widget-wrapper">
                                <h3 class="single-product-widget-title"><?= lang('sale');?></h3>
                                <?php foreach ($sales as $sale): ?>
                                    <div class="single-widget-product">
                                        <div class="single-widget-product__image">
                                            <a href="<?= base_url('ecommerce/detail/' . $sale->id); ?>.html">
                                                <img src="<?= base_url('assets/images/thumbnails/' . $sale->thumbnail); ?>" class="img-fluidth" alt="100x100" style="height:100px;width:auto;">
                                            </a>
                                        </div>
                                        <div class="single-widget-product__content">
                                            <h3 class="title"><a href="<?= base_url('ecommerce/detail/' . $sale->id); ?>.html"><?= $sale->name; ?></a></h3>
                                            <div class="price">
                                                <?php if ($sale->pre_price != NULL): ?>
                                                    <span class="main-price discounted">৳<?= $sale->pre_price; ?></span>
                                                <?php endif; ?>
                                                <span class="discounted-price">৳<?= $sale->price; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!--<div class="col-lg-4 col-md-6">
                            <div class="single-banner">
                                <div class="single-banner__image">
                                    <a href="<?= base_url('ecommerce/category/grocery.html'); ?>">
                                        <img src="<?= base_url('assets/ecommerce/img/banners/banner-hp3.jpg'); ?>" class="img-fluid" alt="370x460">
                                    </a>
                                </div>
                                <div class="single-banner__content single-banner__content--overlay">
                                    <p class="banner-small-text">STYLING SAVINGS</p>
                                    <p class="banner-big-text">Designer Furniture</p>
                                    <p class="banner-small-text banner-small-text--end">30% Off Armchairs</p>
                                    <a href="<?= base_url('ecommerce/category/grocery.html'); ?>" class="theme-button theme-button--banner theme-button--banner--two"><?= lang('shoe_now');?></a>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>