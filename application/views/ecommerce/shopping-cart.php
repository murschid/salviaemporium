<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Shopping Cart</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="<?= base_url('ecommerce.html'); ?>">Home</a></li>
                        <li class="active">Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content-wrapper">
    <div class="shopping-cart-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table-container">
                        <table class="cart-table">
                            <thead>
                                <tr>
                                    <th class="product-name" colspan="2">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($this->cart->contents()) <= 0): ?><tr class="chckclsmine prodictcheck text-center"><td colspan="6"><h3 class="text-danger">Your shopping cart is empty</h3></td></tr><?php endif; ?>
                                <?php foreach ($this->cart->contents() as $items): ?>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="<?= base_url('ecommerce/detail/' . $items['id']); ?>.html">
                                                <img src="<?= base_url('assets/images/thumbnails/' . $items['image']) ?>" class="imgthumb cartimg" alt="Cart">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <a href="<?= base_url('ecommerce/detail/' . $items['id']); ?>.html"><?= $items['name']; ?></a>
                                            <?php if ($items['color'] != NULL): ?>
                                                <span class="product-variation">Color: <?= $items['color']; ?></span>
                                            <?php endif; ?>
                                            <?php if ($items['size'] != NULL): ?>
                                                <span class="product-variation">Size: <?= $items['size']; ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="product-price"><span class="price">৳<?= $items['price']; ?></span></td>
                                        <td class="product-quantity">
                                            <div class="pro-qty d-inline-block mx-0">
                                                <input name="quantity" class="crtproid" type="text" value="<?= $items['qty']; ?>" id="<?= $items['rowid']; ?>" for="<?= $items['price']; ?>">
                                            </div>
                                        </td>
                                        <td class="total-price"><span class="price">৳<?= $items['subtotal']; ?></span></td>
                                        <td class="product-remove">
                                            <a href="<?= base_url('cart/remove/' . $items['rowid']); ?>.html" onclick="return confirm('Are you sure?')">
                                                <i class="pe-7s-close"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="cart-coupon-area">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="coupon-form">
                                    <div class="row row-5">
                                        <div class="col-7">
                                            <input type="text" placeholder="Enter your coupon">
                                        </div>
                                        <div class="col-5">
                                            <button class="theme-button theme-button--silver">APPLY COUPON</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="col-lg-6 text-left text-lg-right">
                                <button class="theme-button">UPDATE CART</button>
                            </div>-->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-6">
                    <div class="cart-calculation-area">
                        <h2 class="cart-calculation-area__title">Cart totals</h2>
                        <table class="cart-calculation-table">
                            <tr>
                                <th>SUBTOTAL</th>
                                <td class="subtotal"><?= $this->cart->format_number($this->cart->total()); ?></td>
                            </tr>
                            <tr>
                                <th>TOTAL</th>
                                <td class="total"><?= $this->cart->format_number($this->cart->total()); ?></td>
                            </tr>
                        </table>
                        <div class="cart-calculation-button">
                            <a class="removeattr" href="<?= base_url('customer/checkout'); ?>.html"><button class="theme-button theme-button--alt theme-button--checkout">PROCEED TO CHECKOUT</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        if ($('.chckclsmine').hasClass('prodictcheck')) {
            $('.theme-button--checkout').addClass('disabled');
            $('.removeattr').removeAttr('href');
        }
        console.log($('.crtproid').attr('value'));
    });

</script>