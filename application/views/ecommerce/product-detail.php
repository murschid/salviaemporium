<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Product Detail</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="<?= base_url('ecommerce.html'); ?>">Home</a></li>
                        <li class="active">Product Detail</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content-wrapper">
    <div class="single-product-slider-details-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="product-details-slider-area product-details-slider-area--side-move">
                        <div class="row row-5">
                            <div class="col-md-9 order-1 order-md-2">
                                <div class="big-image-wrapper">
                                    <div class="enlarge-icon">
                                        <a class="btn-zoom-popup" href="javascript:void(0)"><i class="pe-7s-expand1"></i></a>
                                    </div>
                                    <div class="product-details-big-image-slider-wrapper product-details-big-image-slider-wrapper--side-space theme-slick-slider" data-slick-setting='{
                                         "slidesToShow": 1,
                                         "slidesToScroll": 1,
                                         "arrows": false,
                                         "autoplay": false,
                                         "autoplaySpeed": 5000,
                                         "fade": true,
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
                                             <?php foreach (explode(',', $sproduct->images) as $key): ?>
                                            <div class="single-image">
                                                <img src="<?= base_url('assets/images/products/' . $key) ?>" class="img-fluid" alt="800x1080">
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 order-2 order-md-1">
                                <div class="product-details-small-image-slider-wrapper product-details-small-image-slider-wrapper--vertical-space theme-slick-slider" data-slick-setting='{
                                     "slidesToShow": 3,
                                     "slidesToScroll": 1,
                                     "centerMode": false,
                                     "arrows": true,
                                     "vertical": true,
                                     "autoplay": false,
                                     "autoplaySpeed": 5000,
                                     "speed": 500,
                                     "asNavFor": ".product-details-big-image-slider-wrapper",
                                     "focusOnSelect": true,
                                     "prevArrow": {"buttonClass": "slick-prev", "iconClass": "fa fa-angle-up" },
                                     "nextArrow": {"buttonClass": "slick-next", "iconClass": "fa fa-angle-down" }
                                     }' data-slick-responsive='[
                                     {"breakpoint":1501, "settings": {"slidesToShow": 3, "arrows": true} },
                                     {"breakpoint":1199, "settings": {"slidesToShow": 3, "arrows": true} },
                                     {"breakpoint":991, "settings": {"slidesToShow": 3, "arrows": true, "slidesToScroll": 1} },
                                     {"breakpoint":767, "settings": {"slidesToShow": 3, "arrows": false, "slidesToScroll": 1, "vertical": false, "centerMode": true} },
                                     {"breakpoint":575, "settings": {"slidesToShow": 3, "arrows": false, "slidesToScroll": 1, "vertical": false, "centerMode": true} },
                                     {"breakpoint":479, "settings": {"slidesToShow": 2, "arrows": false, "slidesToScroll": 1, "vertical": false, "centerMode": true} }
                                     ]'>
                                         <?php foreach (explode(',', $sproduct->images) as $key): ?>
                                        <div class="single-image">
                                            <img src="<?= base_url('assets/images/products/' . $key) ?>" class="img-fluid" alt="800x1080">
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="product-details-description-wrapper">
                        <?= form_open('cart/addtocart'); ?>
                        <input type="hidden" name="pro_id" value="<?= $sproduct->id; ?>">
                        <h2 class="item-title"><?= $sproduct->name; ?></h2>
                        <p class="price">
                            <?php if ($sproduct->pre_price != NULL): ?>
                                <span class="main-price discounted">৳<?= $sproduct->pre_price; ?></span>
                            <?php endif; ?>
                            <span class="discounted-price">৳<?= $sproduct->price; ?></span>
                        </p>
                        <p class="description"><?= $sproduct->short_desc; ?></p>
                        <?php if ($sproduct->color != NULL) : ?>
                            <div class="product-color">
                                <span class="product-details-title">COLOR: </span>
                                <?php foreach (explode(',', $sproduct->color) as $key): ?>
                                    <label class="colorbtn btn bg-<?= strtolower($key); ?>" data-tippy="<?= $key; ?>">
                                        <input type="radio" class="prcolor_<?= $sproduct->id; ?>" name="color" value="<?= $key; ?>" autocomplete="off" required="" checked="">
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($sproduct->size != NULL) : ?>
                            <div class="product-size">
                                <span class="product-details-title">SIZE: </span>
                                <select id="myformcntrl" class="nice-select" name="size" required="">
                                    <?php foreach (explode(',', $sproduct->size) as $key): ?>
                                        <option value="<?= $key; ?>"><?= $key; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <?php endif; ?>
                        <div class="pro-qty-two d-inline-block">
                            <input type="text" name="quantity" value="1" min="1" minlength="1">
                        </div>
                        <div class="add-to-cart-btn d-inline-block">
                            <?php if ($sproduct->stock >= 1): ?>
                                <button type="submit" class="theme-button theme-button--alt">ADD TO CART</button>
                            <?php else: ?>
                                <button type="button" class="theme-button theme-button-alt">OUT OF STOCK</button>
                            <?php endif; ?>
                        </div>
                        <?= form_close(); ?>
                        <div class="quick-view-other-info">
                            <div class="other-info-links">
                                <a class="addtowishlist" onclick="addtowish('<?= $sproduct->id; ?>')"><i class="fa fa-heart-o"></i>ADD TO WISHLIST</a>
                                <a><i class="fa fa-exchange"></i>COMPARE</a>
                            </div>
                            <table>
                                <tr class="single-info">
                                    <td class="quickview-title">Brand: </td>
                                    <td class="quickview-value"><?= $sproduct->brand ? $sproduct->brand : 'Unspecified'; ?></td>
                                </tr>
                                <tr class="single-info">
                                    <td class="quickview-title">SKU: </td>
                                    <td class="quickview-value"><?= $sproduct->sku ? $sproduct->sku : 'N/A'; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-description-tab-area section-space">
        <div class="description-tab-navigation">
            <div class="nav nav-tabs justify-content-center" id="nav-tab2" role="tablist">
                <a class="nav-item nav-link active" id="description-tab" data-toggle="tab" href="#product-description" role="tab" aria-selected="true">DESCRIPTION</a>
                <a class="nav-item nav-link" id="additional-info-tab" data-toggle="tab" href="#product-additional-info" role="tab" aria-selected="false">SPECIFICATION</a>
                <a class="nav-item nav-link" id="review-tab" data-toggle="tab" href="#product-review" role="tab" aria-selected="false">REVIEWS (<?= count($reviews); ?>)</a>
            </div>
        </div>
        <div class="single-product-description-tab-content">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-description" role="tabpanel" aria-labelledby="description-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="description-content">
                                    <p class="long-desc"><?= $sproduct->description; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="product-additional-info" role="tabpanel" aria-labelledby="additional-info-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="additional-info-content">
                                    <?= $sproduct->specification; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="product-review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="review-content-wrapper">
                                    <div class="review-comments">
                                        <h3 class="review-comment-title"><span class="badge badge-danger"><?= count($reviews); ?></span> review for - <?= $sproduct->name; ?></h3>
                                        <?php foreach ($reviews as $review): ?>
                                            <div class="single-review-comment">
                                                <div class="single-review-comment__image">
                                                    <img src="<?= base_url('assets/images/shop/user_logo_128.png') ?>" title="<?= $review->name; ?>" class="img-fluid" alt="100x100">
                                                </div>
                                                <div class="single-review-comment__content">
                                                    <div class="review-time"><span class="reviewname"><?= $review->name; ?></span><i class="fa fa-calendar"></i> <?= timespan($review->time, now(), 1); ?> ago</div>
                                                    <div class="rating">
                                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                                            <?php if ($i <= $review->rating) : ?>
                                                                <i class="fa fa-star active"></i>
                                                            <?php else : ?>
                                                                <i class="fa fa-star"></i>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                    </div>
                                                    <p class="review-text"><?= $review->comment; ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="review-comment-form">
                                        <h4 class="review-comment-title">Add a Review</h4>
                                        <p class="review-comment-subtitle">Your email address will not be published. Required fields are marked (*)</p>
                                        <?= form_open('customer/reviews'); ?>
                                        <div class="form-group">
                                            <label for="reviewerName">Name <span>*</span> </label>
                                            <input type="text" name="rename" id="reviewerName" minlength="3" maxlength="30" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="reviewerEmail">Email <span>*</span> </label>
                                            <input type="email" name="reemail" id="reviewerEmail" minlength="9" maxlength="40" required="">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="prodid" value="<?= $sproduct->id; ?>" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="reviewRating" class="d-inline-block mb-0">Your Rating</label>
                                            <div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                                                <input type="radio" id="star5" name="rating" value="5"/><label for="star5"></label>
                                                <input type="radio" id="star4" name="rating" value="4"/><label for="star4"></label>
                                                <input type="radio" id="star3" name="rating" value="3"/><label for="star3"></label>
                                                <input type="radio" id="star2" name="rating" value="2"/><label for="star2"></label>
                                                <input type="radio" id="star1" name="rating" value="1"/><label for="star1"></label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="reviewComment">Your Review <span>*</span></label>
                                            <textarea name="retext" id="reviewComment" rows="3" minlength="3" maxlength="500" required=""></textarea>
                                        </div>
                                        <button type="submit" class="theme-button">SUBMIT</button>
                                        <?= form_close(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-slider-area section-space">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title-area text-center">
                        <h2 class="section-title">RELATED PRODUCTS</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="product-slider-wrapper theme-slick-slider custheme-slick-slider" data-slick-setting='{
                         "slidesToShow": 4,
                         "slidesToScroll": 1,
                         "arrows": true,
                         "dots": false,
                         "autoplay": true,
                         "speed": 1500,
                         "prevArrow": {"buttonClass": "slick-prev", "iconClass": "fa fa-angle-left" },
                         "nextArrow": {"buttonClass": "slick-next", "iconClass": "fa fa-angle-right" }
                         }' data-slick-responsive='[
                         {"breakpoint":1501, "settings": {"slidesToShow": 4, "slidesToScroll": 4, "arrows": false} },
                         {"breakpoint":1199, "settings": {"slidesToShow": 3, "slidesToScroll": 3, "arrows": false} },
                         {"breakpoint":991, "settings": {"slidesToShow": 2,"slidesToScroll": 2, "arrows": true, "dots": false} },
                         {"breakpoint":767, "settings": {"slidesToShow": 2,"slidesToScroll": 2,  "arrows": true, "dots": false} },
                         {"breakpoint":575, "settings": {"slidesToShow": 2, "slidesToScroll": 2,"arrows": false, "dots": true} },
                         {"breakpoint":479, "settings": {"slidesToShow": 1,"slidesToScroll": 1, "arrows": true, "dots": false} }
                         ]'>
                             <?php foreach ($products as $product): ?>
                            <div class="col">
                                <div class="single-grid-product">
                                    <?= form_open('cart/addtocart'); ?>
                                    <div class="single-grid-product__image">
                                        <div class="product-badge-wrapper">
                                            <span class="onsale">-<?= round((($product->pre_price - $product->price) * 100) / $product->pre_price); ?>%</span>
                                            <span class="hot">Hot</span>
                                        </div>
                                        <a href="<?= base_url('ecommerce/detail/' . $product->id); ?>.html" class="image-wrap">
                                            <?php $no = 0; ?>
                                            <?php foreach (explode(',', $product->images) as $key): $no++; ?>
                                                <img src="<?= base_url('assets/images/products/' . $key); ?>" class="img-fluid" alt="600x800">
                                                <?php if ($no == 2) : break; ?>
                                                <?php endif; ?>
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
                                                        <input type="radio" class="prcolor_<?= $product->id; ?>" name="color" value="<?= $key; ?>" required="">
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