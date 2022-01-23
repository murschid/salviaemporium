<div class="product-slider-text-area section-space">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-slider-text-wrapper">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="product-slider-text-wrapper__text">
                                <h2 class="title"><?= lang('description');?></h2>
                                <p class="description"><?= lang('description_text');?></p>
                                <a href="<?= base_url('ecommerce/category/grocery'); ?>.html" class="slider-text-link"><?= lang('shoe_now');?> <i class="fa fa-caret-right"></i></a>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="product-slider-wrapper theme-slick-slider" data-slick-setting='{
                                 "slidesToShow": 3,
                                 "slidesToScroll": 1,
                                 "arrows": true,
                                 "dots": false,
                                 "autoplay": false,
                                 "speed": 1000,
                                 "prevArrow": {"buttonClass": "slick-prev", "iconClass": "fa fa-angle-left" },
                                 "nextArrow": {"buttonClass": "slick-next", "iconClass": "fa fa-angle-right" }
                                 }' data-slick-responsive='[
                                 {"breakpoint":1501, "settings": {"slidesToShow": 3, "slidesToScroll": 3, "arrows": false} },
                                 {"breakpoint":1199, "settings": {"slidesToShow": 2, "slidesToScroll": 2, "arrows": false} },
                                 {"breakpoint":991, "settings": {"slidesToShow": 2,"slidesToScroll": 2, "arrows": true, "dots": false} },
                                 {"breakpoint":767, "settings": {"slidesToShow": 2,"slidesToScroll": 2,  "arrows": true, "dots": false} },
                                 {"breakpoint":575, "settings": {"slidesToShow": 2, "slidesToScroll": 2,"arrows": true, "dots": false} },
                                 {"breakpoint":479, "settings": {"slidesToShow": 1,"slidesToScroll": 1, "arrows": false, "dots": false} }
                                 ]'>
                                    <?php foreach ($products as $product): ?>
                                    <div class="col">
                                        <div class="single-grid-product">
                                            <?= form_open('cart/addtocart'); ?>
                                            <div class="single-grid-product__image">
                                                <?php if ($product->pre_price != NULL): ?>
                                                    <div class="product-badge-wrapper">
                                                        <span class="onsale">-<?= round((($product->pre_price - $product->price) * 100) / $product->pre_price); ?>%</span>
                                                        <span class="hot"><?= lang('hot');?></span>
                                                    </div>
                                                <?php endif; ?>
                                                <a href="<?= base_url('ecommerce/detail/' . $product->id); ?>.html" class="image-wrap">
                                                    <?php $no = 0; ?>
                                                    <?php foreach (explode(',', $product->images) as $key): $no++; ?>
                                                        <img src="<?= base_url('assets/images/products/' . $key); ?>" class="prod360" alt="270x360">
                                                        <?php if ($no == 2) : break; ?> <?php endif; ?>
                                                    <?php endforeach; ?>
                                                </a>
                                                <div class="product-hover-icon-wrapper">
                                                    <span class="single-icon single-icon--quick-view"><a class="cd-trigger" for="<?= $product->id; ?>" href="#qv-1"><i class="fa fa-eye"></i></a></span>
                                                    <?php if ($product->stock >= 1): ?>
                                                        <button type="submit" class="single-icon single-icon--add-to-cart"><a><i class="fa fa-shopping-basket"></i> <span>ADD TO CART</span></a></button>
                                                    <?php else: ?>
                                                        <button type="button" class="single-icon-oos single-icon-add-to-cart"><a class="nocursor"><i class="fa fa-shopping-basket"></i> <span>OUT OF STOCK</span></a></button>
                                                    <?php endif; ?>
                                                    <span class="single-icon single-icon--compare"><a><i class="fa fa-exchange"></i></a></span>
                                                </div>
                                            </div>
                                            <div class="single-grid-product__content">
                                                <input type="hidden" name="pro_id" value="<?= $product->id; ?>">
                                                <input type="hidden" name="quantity" value="1">
                                                <h3 class="title"><a href="<?= base_url('ecommerce/detail/' . $product->id); ?>.html"><?= $product->name; ?></a></h3>
                                                <div class="price">
                                                    <?php if ($product->pre_price != NULL): ?>
                                                        <span class="main-price discounted">৳<?= $product->pre_price; ?></span>
                                                    <?php endif; ?>
                                                    <span class="discounted-price">৳<?= $product->price; ?></span>
                                                </div>
                                                <?php if ($product->color != NULL): ?>
                                                    <div class="color">
                                                        <?php foreach (explode(',', $product->color) as $key): ?>
                                                            <label class="colorbtn btn bg-<?= strtolower($key); ?>" data-tippy="<?= $key; ?>">
                                                                <input type="radio" class="prcolor_<?= $product->id; ?>" name="color" value="<?= $key; ?>" required="" checked="">
                                                            </label>
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($product->size != NULL): ?>
                                                    <div class="sizes">
                                                        <select id="myformcntrl" name="size" class="form-control myformcntrl" required="">
                                                            <?php foreach (explode(',', $product->size) as $key): ?>
                                                                <option value="<?= $key; ?>"><?= $key; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                <?php endif; ?>
                                                <a class="favorite-icon addtowishlist" onclick="addtowish('<?= $product->id; ?>')"><i class="fa fa-heart-o"></i></a>
                                            </div>
                                            <?= form_close(); ?>
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