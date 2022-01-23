<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Wishlist</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="<?= base_url('ecommerce.html'); ?>">Home</a></li>
                        <li class="active">Wishlist</li>
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
                    <div class="cart-table-container min-height-five">
                        <table class="cart-table">
                            <thead>
                                <tr>
                                    <th class="product-name" colspan="2">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-quantity">Stock Status</th>
                                    <th class="product-subtotal">Availability</th>
                                    <th class="product-remove">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($products)): ?><tr class="chckclsmine prodictcheck text-center"><td colspan="6"><h3 class="text-danger">Your wishlist is empty</h3></td></tr><?php endif; ?>
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="<?= base_url('ecommerce/detail/' . $product->product_id); ?>.html">
                                                <img src="<?= base_url('assets/images/thumbnails/' . $product->thumbnail) ?>" class="imgthumb cartimg" alt="">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <a href="<?= base_url('ecommerce/detail/' . $product->product_id); ?>.html"><?= $product->name; ?></a>
                                            <span class="product-variation">Color: <?= $product->color; ?></span>
                                            <span class="product-variation">Size: <?= $product->size; ?></span>
                                        </td>
                                        <td class="product-price"><span class="price">৳<?= $product->price; ?></span></td>
                                        <?= form_open('cart/addtocart'); ?>
                                        <td class="product-quantity">
                                            <div class="pro-qty-two d-inline-block mx-0">
                                                <input type="text"  name="quantity" value="1">
                                                <input type="hidden" name="pro_id" value="<?= $product->product_id; ?>">
                                                <input type="hidden" name="size" value="<?= $product->size; ?>">
                                                <input type="hidden" name="color" value="<?= $product->color; ?>">
                                            </div>
                                        </td>
                                        <td class="stock-status">
                                            <?php if ($product->stock >= 1): ?>
                                                <span class="badge badge-success">IN STOCK</span>
                                            <?php else : ?>
                                                <span class="badge badge-danger">OUT OF STOCK</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="add-to-cart">
                                            <?php if ($product->stock >= 1): ?>
                                                <button type="submit" class="theme-button theme-button--alt theme-button--wishlist">ADD TO CART</button>
                                            <?php else : ?>
                                                <button type="button" class="btn btn-outline-warning cursornotallow">OUT OF STOCK</button>
                                            <?php endif; ?>
                                        </td>
                                        <?= form_close(); ?>
                                        <td class="product-remove">
                                            <a href="<?= base_url('customer/removewish/' . $product->id); ?>.html" onclick="return confirm('Are you sure?')"><i class="pe-7s-close"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>