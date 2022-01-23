<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Searched Product</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="<?= base_url('ecommerce.html'); ?>">Home</a></li>
                        <li class="active">Searched Products</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content-wrapper">
    <div class="top-rated-product-wrapper section-space">
        <div class="product-double-row-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-row-wrapper">
                            <div class="row">
                                <?php if ($products != NULL): ?>
                                    <?php foreach ($products as $product): ?>
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-custom-sm-6">
                                            <div class="single-grid-product">
                                                <?= form_open('cart/addtocart'); ?>
                                                <div class="single-grid-product__image">
                                                    <!--<div class="product-badge-wrapper"><span class="hot">Hot</span></div>-->
                                                    <a href="<?= base_url('ecommerce/detail/' . $product->id); ?>.html" class="image-wrap">
                                                        <?php $no = 0; ?>
                                                        <?php foreach (explode(',', $product->images) as $key): $no++; ?>
                                                            <img src="<?= base_url('assets/images/products/' . $key) ?>" class="img-fluid" alt="Pro">
                                                            <?php if ($no == 2) : break; ?>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </a>
                                                    <div class="product-hover-icon-wrapper">
                                                        <span class="single-icon single-icon--quick-view"><a class="cd-trigger" for="<?= $product->id; ?>" href="#qv-1"><i class="fa fa-search"></i></a></span>
                                                        <?php if ($product->stock >= 1): ?>
                                                            <button type="submit" class="single-icon single-icon--add-to-cart"><span><i class="fa fa-shopping-basket"></i> <span>ADD TO CART</span></span></button>
                                                        <?php else: ?>
                                                            <button type="button" class="single-icon single-icon-add-to-cart"><span><i class="fa fa-shopping-basket"></i> <span>OUT OF STOCK</span></span></button>
                                                        <?php endif; ?>
                                                        <span class="single-icon single-icon--compare"><a><i class="fa fa-exchange"></i></a></span>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="pro_id" value="<?= $product->id; ?>">
                                                <input type="hidden" name="quantity" value="1">
                                                <div class="single-grid-product__content">
                                                    <h3 class="title"><a href="<?= base_url('ecommerce/detail/' . $product->id); ?>.html"><?= $product->name; ?></a></h3>
                                                    <div class="price">
                                                        <?php if ($product->pre_price != NULL): ?>
                                                            <span class="main-price discounted">$<?= $product->pre_price; ?></span>
                                                        <?php endif; ?>
                                                        <span class="discounted-price">$<?= $product->price; ?></span>
                                                    </div>
                                                    <?php if ($product->color != NULL): ?>
                                                        <div class="color">
                                                            <?php foreach (explode(',', $product->color) as $key): ?>
                                                                <label class="colorbtn btn bg-<?= strtolower($key); ?>" data-tippy="<?= $key; ?>">
                                                                    <input type="radio" name="color" value="<?= $key; ?>" autocomplete="off">
                                                                </label>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if ($product->size != NULL): ?>
                                                        <div class="sizes">
                                                            <select name="size" class="form-control myformcntrl">
                                                                <?php foreach (explode(',', $product->size) as $key): ?>
                                                                    <option value="<?= $key; ?>"><?= $key; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    <?php endif; ?>
                                                    <a href="<?= base_url('customer/wishlist'); ?>.html" class="favorite-icon"><i class="fa fa-heart-o"></i></a>
                                                </div>
                                                <?= form_close(); ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>