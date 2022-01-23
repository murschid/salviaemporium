<div class="search-overlay" id="search-overlay">
    <span class="close-icon search-close-icon"><a id="search-close-icon"><i class="pe-7s-close"></i></a></span>
    <div class="search-overlay-content">
        <div class="input-box">
            <?= form_open('ecommerce/search'); ?>
            <input type="search" class="searchfocus" name="searching" minlength="3" required="" maxlength="50" placeholder="Search...">
            <?= form_close(); ?>
        </div>
        <div class="search-hint">
            <span><i class="fa fa-hand-o-right"></i> Press Enter</span>
        </div>
    </div>
</div>

<div id="qv-1" class="cd-quick-view">
    <div class="cd-slider-wrapper">
        <div class="product-badge-wrapper">
            <span class="onsale">-17%</span>
            <span class="hot">Hot</span>
        </div>
        <ul class="cd-slider">
            <li class="selected"><img src="<?= base_url('assets/ecommerce/img/products/product-9-1-600x800.jpg'); ?>" alt="600x800"></li>
            <li><img src="<?= base_url('assets/ecommerce/img/products/product-9-2-600x800.jpg'); ?>" alt="600x800"></li>
        </ul>
        <ul class="cd-slider-pagination">
            <li class="active"><a href="#0">1</a></li>
            <li><a href="#1">2</a></li>
        </ul>
        <ul class="cd-slider-navigation">
            <li><a class="cd-prev" href="#0"><i class="fa fa-angle-left"></i></a></li>
            <li><a class="cd-next" href="#0"><i class="fa fa-angle-right"></i></a></li>
        </ul>
    </div>
    <div class="quickview-item-info cd-item-info ps-scroll">
        <h2 class="item-title">Atelier Ottoman Takumi Series</h2>
        <p class="price">
            <span class="main-price discounted">৳360.00</span>
            <span class="discounted-price">৳300.00</span>
        </p>
        <p class="description">Upholstered velvet ottoman with antique stud detailing. Invite restrained glamour and on-trend colour into your design scheme with the Eichholtz Ponti Ottoman. Inspired by the neo-classical influences of Italian icon, Gio Ponti, this contemporary ottoman collection is presented in a choice of velvet and linen colourways.</p>
        <div class="color">
            <label class="colorbtn btn bg-red" data-tippy="Red">
                <input type="radio" name="color" value="Red" autocomplete="off" required="">
            </label>
            <label class="colorbtn btn bg-red" data-tippy="Red">
                <input type="radio" name="color" value="Red" autocomplete="off" required="">
            </label>
        </div>
        <div class="sizes">
            <select name="size" class="form-control myformcntrl" required="">
                <option value="M">M</option>
            </select>
        </div>
        <div class="pro-qty d-inline-block">
            <input type="text" value="1">
        </div>
        <?php if ($sproduct->stock >= 1): ?>
            <div class="add-to-cart-btn d-inline-block">
                <a href="<?= base_url('cart'); ?>.html"><button class="theme-button theme-button--alt">ADD TO CART</button></a>
            </div>
        <?php else: ?>
            <div class="add-to-cart-btn d-inline-block">
                <button type="button" class="theme-button theme-button-oos">OUT OF STOCK</button>
            </div>
        <?php endif; ?>
        <div class="quick-view-other-info">
            <div class="other-info-links">
                <a href="<?= base_url('customer/wishlist'); ?>.html"><i class="fa fa-heart-o"></i> ADD TO WISHLIST</a>
                <a><i class="fa fa-exchange"></i> COMPARE</a>
            </div>
            <table>
                <tr class="single-info">
                    <td class="quickview-title">SKU: </td>
                    <td class="quickview-value"><?= $sproduct->sku ? $sproduct->sku : 'N/A'; ?></td>
                </tr>
                <tr class="single-info">
                    <td class="quickview-title">Brand: </td>
                    <td class="quickview-value"><?= $sproduct->brand ? $sproduct->brand : 'Unspecified'; ?></td>
                </tr>
                <tr class="single-info">
                    <td class="quickview-title">Share On: </td>
                    <td class="quickview-value">
                        <ul class="quickview-social-icons">
                            <li><a><i class="fa fa-facebook"></i></a></li>
                            <li><a><i class="fa fa-twitter"></i></a></li>
                            <li><a><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <a href="#0" class="cd-close">Close</a>
</div>

