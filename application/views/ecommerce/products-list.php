<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Products</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="<?= base_url('ecommerce.html'); ?>">Home</a></li>
                        <li class="active">Products</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content-wrapper">
    <div class="shop-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="shop-sidebar-wrapper">
                        <div class="single-sidebar-widget">
                            <h2 class="single-sidebar-widget__title">Filter By Price</h2>
                            <div class="sidebar-price">
                                <div id="price-range"></div>
                                <div class="output-wrapper">
                                    <input type="text" id="price-amount" class="price-amount" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="single-sidebar-widget">
                            <h2 class="single-sidebar-widget__title">Product Categories</h2>
                            <ul class="single-sidebar-widget__dropdown" id="single-sidebar-widget__dropdown">
                                <?php foreach ($categories as $category): ?>
                                    <li><a href="<?= base_url('ecommerce/category/' . $category->category); ?>.html"><?= ucfirst($category->category); ?></a></li>
                                <?php endforeach; ?>
                                <!--<li class="has-children"><a>Living Room</a><ul class="sub-menu"><li><a href="#">Armchairs</a></li></ul></li>-->
                            </ul>
                        </div>
                        <!--<div class="single-sidebar-widget">
                            <h2 class="single-sidebar-widget__title">Filter By Brand</h2>
                            <ul class="single-sidebar-widget__dropdown">
                                <?php foreach ($brands as $brand): ?>
                                    <li><a href="<?= base_url('ecommerce/brand/' . $brand->id); ?>.html"><?= $brand->brand; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>-->
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-content-wrapper">
                        <div class="shop-header">
                            <div class="row align-items-center">
                                <div class="col-sm-6 col-12">
                                    <div class="shop-header__left">
                                        <p class="result-text d-inline-block mb-0">Showing 1–15 of 50 results</p>
                                        <div class="view-mode-icons d-inline-block">
                                            <a class="active"><i class="fa fa-th"></i></a>
                                            <a><i class="fa fa-list"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="shop-header__right d-flex justify-content-start justify-content-sm-end align-items-center">
                                        <div class="grid-view-changer" id="grid-view-changer">
                                            <a id="grid-view-change-trigger">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <div class="grid-view-changer__menu" id="grid-view-changer__menu">
                                                <a data-target="two-column">2</a>
                                                <a data-target="three-column">3</a>
                                                <a data-target="four-column">4</a>
                                                <a id="grid-view-close-trigger"><i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                        <!--<div class="sort-by-dropdown">
                                            <select name="sortby" id="sort-by" class="nice-select">
                                                <option value="1">Sort By Popularity</option>
                                                <option value="2">Sort By Newness</option>
                                                <option value="3">Sort By Price: Low to High</option>
                                                <option value="4">Sort By Price: High to Low</option>
                                            </select>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="shop-product-wrap shop-product-wrap--with-sidebar row grid">
                            <?php if (count($products) <= 0): ?>
                                <h3 class="nosearchf text-danger">No Product Found!</h3>
                                <div class="col-md-12 nosearchfound"></div>
                            <?php endif; ?>
                            <?php foreach ($products as $product): ?>
                                <div class="col-lg-4 col-md-6 col-sm-6 col-custom-sm-6 col-12">
                                    <?= form_open('cart/addtocart'); ?>
                                    <div class="single-grid-product">
                                        <div class="single-grid-product__image">
                                            <?php if ($product->pre_price != NULL): ?>
                                                <div class="product-badge-wrapper">
                                                    <span class="onsale">-<?= round((($product->pre_price - $product->price) * 100) / $product->pre_price); ?>%</span>
                                                    <span class="hot">Hot</span>
                                                </div>
                                            <?php endif; ?>
                                            <a href="<?= base_url('ecommerce/detail/' . $product->id); ?>.html" class="image-wrap">
                                                <?php $no = 0; ?>
                                                <?php foreach (explode(',', $product->images) as $key): $no++; ?>
                                                    <img src="<?= base_url('assets/images/products/' . $key); ?>" class="img-fluid" alt="600x800" width="260">
                                                    <?php if ($no == 2) : break; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </a>
                                            <div class="product-hover-icon-wrapper">
                                                <span class="single-icon single-icon--quick-view"><a class="cd-trigger" for="<?= $product->id; ?>" href="#qv-1"><i class="fa fa-eye"></i></a></span>
                                                <?php if ($product->stock >= 1): ?>
                                                    <button type="submit" class="single-icon single-icon--add-to-cart"><a><i class="fa fa-shopping-basket"></i><span>ADD TO CART</span></a></button>
                                                <?php else: ?>
                                                    <button type="button" class="single-icon-oos single-icon-add-to-cart"><a class="nocursor"><i class="fa fa-shopping-basket"></i><span>OUT OF STOCK</span></a></button>
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
                                                            <input type="radio" name="color" value="<?= $key; ?>" autocomplete="off" required="">
                                                        </label>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($product->size != NULL): ?>
                                                <div class="sizes">
                                                    <select name="size" class="form-control myformcntrl" required="">
                                                        <?php foreach (explode(',', $product->size) as $key): ?>
                                                            <option value="<?= $key; ?>"><?= $key; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            <?php endif; ?>
                                            <a href="<?= base_url('customer/wishlist'); ?>.html" class="favorite-icon">
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>

                                    <?= form_open('cart/addtocart'); ?>
                                    <div class="single-list-product">
                                        <div class="single-list-product__image">
                                            <a href="<?= base_url('customer/wishlist'); ?>.html" class="favorite-icon">
                                                <i class="fa fa-heart-o"></i>
                                            </a>
                                            <?php if ($product->pre_price != NULL): ?>
                                                <div class="product-badge-wrapper">
                                                    <span class="onsale">-<?= round((($product->pre_price - $product->price) * 100) / $product->pre_price); ?>%</span>
                                                    <span class="hot">Hot</span>
                                                </div>
                                            <?php endif; ?>
                                            <a href="<?= base_url('ecommerce/detail/' . $product->id); ?>.html" class="image-wrap">
                                                <?php $nos = 0; ?>
                                                <?php foreach (explode(',', $product->images) as $key): $nos++; ?>
                                                    <img src="<?= base_url('assets/images/products/' . $key); ?>" class="img-fluid" alt="600x800" width="260">
                                                    <?php if ($nos == 2) : break; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </a>
                                        </div>
                                        <div class="single-list-product__content">
                                            <input type="hidden" name="pro_id" value="<?= $product->id; ?>">
                                            <input type="hidden" name="quantity" value="1">
                                            <h3 class="title"><a href="<?= base_url('ecommerce/detail/' . $product->id); ?>.html"><?= $product->name; ?></a></h3>
                                            <div class="price"><span class="main-price discounted">৳<?= $product->pre_price; ?></span> <span class="discounted-price">৳<?= $product->price; ?></span></div>
                                            <p class="product-short-desc"><?= $product->short_desc; ?></p>
                                            <?php if ($product->color != NULL): ?>
                                                <div class="color">
                                                    <?php foreach (explode(',', $product->color) as $key): ?>
                                                        <label class="colorbtn btn bg-<?= strtolower($key); ?>" data-tippy="<?= $key; ?>">
                                                            <input type="radio" name="color" value="<?= $key; ?>" autocomplete="off" required="">
                                                        </label>
                                                    <?php endforeach; ?>
                                                </div>
                                            <?php endif; ?>
                                            <?php if ($product->size != NULL): ?>
                                                <div class="sizes">
                                                    <select name="size" class="form-control myformcntrl" required="">
                                                        <?php foreach (explode(',', $product->size) as $key): ?>
                                                            <option value="<?= $key; ?>"><?= $key; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            <?php endif; ?>
                                            <div class="product-hover-icon-wrapper">
                                                <span class="single-icon single-icon--quick-view"><a class="cd-trigger" for="<?= $product->id; ?>" href="#qv-1"><i class="fa fa-eye"></i></a></span>
                                                <?php if ($product->stock >= 1): ?>
                                                    <button type="submit" class="single-icon single-icon--add-to-cart"><a><i class="fa fa-shopping-basket"></i> <span>ADD TO CART</span></a></button>
                                                <?php else: ?>
                                                    <button type="button" class="single-icon-oos single-icon-add-to-cart"><a class="nocursor"><i class="fa fa-shopping-basket"></i><span>OUT OF STOCK</span></a></button>
                                                <?php endif; ?>
                                                <span class="single-icon single-icon--compare"><a><i class="fa fa-exchange"></i></a></span>
                                            </div>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <!--<div class="pagination-wrapper">
                            <ul>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>