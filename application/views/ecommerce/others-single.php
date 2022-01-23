<div class="cd-slider-wrapper">
    <div class="product-badge-wrapper">
        <span class="onsale">-<?= round((($sproduct->pre_price - $sproduct->price) * 100) / $sproduct->pre_price); ?>%</span>
        <span class="hot">Hot</span>
    </div>
    <ul class="cd-slider">
        <?php $no = 0; ?>
        <?php foreach (explode(',', $sproduct->images) as $key): $no++; ?>
            <li <?php if ($no == 1): ?> class="selected" <?php endif; ?>><img src="<?= base_url('assets/images/products/' . $key); ?>" alt="600x800"></li>
            <?php if ($no == 2) : break; ?>
            <?php endif; ?>
        <?php endforeach; ?>
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
    <h2 class="item-title"><?= $sproduct->name; ?></h2>
    <p class="price">
        <span class="main-price discounted">৳<?= $sproduct->pre_price; ?></span>
        <span class="discounted-price">৳<?= $sproduct->price; ?></span>
    </p>
    <p class="description"><?= $sproduct->short_desc; ?></p>
    <?= form_open('cart/addtocart'); ?>
    <input type="hidden" name="pro_id" value="<?= $sproduct->id; ?>">
    <?php if ($sproduct->color != NULL) : ?>
        <div class="color">
            <?php foreach (explode(',', $sproduct->color) as $key): ?>
                <label class="colorbtn btn bg-<?= strtolower($key); ?>" data-tippy="<?= $key; ?>">
                    <input type="radio" class="prcolor_<?= $sproduct->id; ?>" name="color" value="<?= $key; ?>" required="" checked="">
                </label>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <?php if ($sproduct->size != NULL) : ?>
        <div class="sizes">
            <select id="myformcntrl" class="form-control myformcntrl" name="size" required="">
                <?php foreach (explode(',', $sproduct->size) as $key): ?>
                    <option value="<?= $key; ?>"><?= $key; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    <?php endif; ?>
    <div class="pro-qty-two d-inline-block">
        <input type="number" name="quantity" value="1" min="1" minlength="1">
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
            <a onclick="addtowish('<?= $sproduct->id; ?>')"><i class="fa fa-heart-o"></i>ADD TO WISHLIST</a>
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
            <tr class="single-info">
                <td class="quickview-title">Share On: </td>
                <td class="quickview-value">
                    <ul class="quickview-social-icons">
                        <li><a><i class="fa fa-facebook-square"></i></a></li>
                        <li><a><i class="fa fa-twitter"></i></a></li>
                        <li><a><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </td>
            </tr>
        </table>
    </div>
</div>
<a href="#0" class="cd-close">Close</a>