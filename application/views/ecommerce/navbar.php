<?php $wishlists = $this->home_model->wishlist_query('tb_products', array('user_id' => $this->session->userdata('customer_auth')['id']), NULL); ?>
<div class="header-area header-area--default header-area--default--white header-sticky">
    <div class="header-navigation-area header-navigation-area--white header-navigation-area--extra-space d-none d-lg-block">
        <div class="container wide">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-info-wrapper header-info-wrapper--alt-style">
                        <div class="header-logo">
                            <a href="<?= base_url(); ?>"><img src="<?= base_url('assets/ecommerce/img/salvia.png'); ?>" class="img-fluid" alt="80x50"></a>
                        </div>
                        <div class="header-navigation-wrapper">
                            <nav>
                                <ul>
                                    <!--<li class="has-children">
                                        <a class="text-uppercase"><?= lang('products');?></a>
                                        <ul class="submenu submenu--home-variation">
                                            <li class="submenu--home-variation__item">
                                                <p class="submenu--home-variation__item__title"><a href="<?= base_url('ecommerce/category/grocery.html'); ?>"><?= lang('foods'); ?></a></p>
                                                <div class="submenu--home-variation__item__image">
                                                    <a href="<?= base_url('ecommerce/category/grocery.html'); ?>"><img src="<?= base_url('assets/ecommerce/img/menu/food.jpg'); ?>" width="190" class="img-fluid" alt="190x110"></a>
                                                </div>
                                            </li>
                                            <li class="submenu--home-variation__item">
                                                <p class="submenu--home-variation__item__title"><a href="<?= base_url('ecommerce/category/grocery.html'); ?>"><?= lang('spices');?></a></p>
                                                <div class="submenu--home-variation__item__image">
                                                    <a href="<?= base_url('ecommerce/category/grocery.html'); ?>"><img src="<?= base_url('assets/ecommerce/img/banners/Demo.jpg'); ?>" width="190" class="img-fluid" alt="190x110"></a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>-->
                                    <li><a href="<?= base_url('ecommerce/category/grocery.html'); ?>" class="text-uppercase"><?= lang('grocery');?></a></li>
                                    <li class="has-children">
                                        <a class="text-uppercase"><?= lang('dresses');?></a>
                                        <ul class="submenu submenu--column-1">
                                            <li><a href="<?= base_url('ecommerce/category/girls.html'); ?>"><?= lang('ladiesd');?></a></li>
                                            <li><a href="<?= base_url('ecommerce/category/boys.html'); ?>"><?= lang('babyd');?></a></li>
                                            <li><a href="<?= base_url('ecommerce/category/kids.html'); ?>"><?= lang('kidsd');?></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?= base_url('ecommerce/category/beauty.html'); ?>" class="text-uppercase"><?= lang('beauty');?></a></li>
                                    <li><a href="<?= base_url('ecommerce/category/electronics.html'); ?>" class="text-uppercase"><?= lang('electronics');?></a></li>
                                    <li><a href="<?= base_url('ecommerce/category/medical.html'); ?>" class="text-uppercase"><?= lang('medical');?></a></li>
                                    <li><a href="<?= base_url('ecommerce/category/foreign.html'); ?>" class="text-uppercase"><?= lang('foreign');?></a></li>
                                    <li class="has-children">
                                        <a class="text-uppercase"><?= lang('pages');?></a>
                                        <ul class="submenu submenu--column-1">
                                            <li><a href="<?= base_url('ecommerce/about.html'); ?>"><?= lang('about');?></a></li>
                                            <li><a href="<?= base_url('ecommerce/contact.html'); ?>"><?= lang('contact');?></a></li>
                                            <li><a href="<?= base_url('ecommerce/faq.html'); ?>"><?= lang('faqs');?></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-icon-area">
                            <div class="account-dropdown">
                                <a><i class="fa fa-user-circle"></i> <?= lang('account');?> <i class="pe-7s-angle-down"></i></a>
                                <ul class="account-dropdown__list">
                                    <?php if ($this->session->userdata('customer_auth')): ?>
                                        <li><a href="<?= base_url('customer/myaccount.html'); ?>"><?= lang('account');?></a></li>
                                    <?php else : ?>
                                        <li><a href="<?= base_url('auth/logregis.html'); ?>"><?= lang('login');?></a></li>
                                    <?php endif; ?>
                                    <li><a href="<?= base_url('cart/mycart.html'); ?>"><?= lang('scart');?></a></li>
                                    <li><a href="<?= base_url('customer/tracking.html'); ?>"><?= lang('otrack');?></a></li>
                                    <?php if ($this->session->userdata('customer_auth')): ?>
                                        <li><a href="<?= base_url('auth/logout.html'); ?>"><?= lang('logout');?></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <div class="header-icon d-flex align-items-center">
                                <ul class="header-icon__list">
                                    <li><a id="search-icon"><i class="fa fa-search"></i></a></li>
                                    <li>
                                        <a href="<?= base_url('customer/mywishlist.html'); ?>"><i class="fa fa-heart-o"></i><span class="item-count"><?= count($wishlists); ?></span></a>
                                        <?php if (count($wishlists) >= 1): ?>
                                            <div class="minicart-wrapper">
                                                <p class="minicart-wrapper__title text-uppercase"><?= lang('wishlist');?></p>
                                                <div class="minicart-wrapper__items ps-scroll">
                                                    <?php foreach ($wishlists as $wishlist): ?>
                                                        <div class="minicart-wrapper__items__single">
                                                            <a href="<?= base_url('customer/removewish/' . $wishlist->id); ?>.html" onclick="return confirm('Are you sure?')" class="close-icon"><i class="pe-7s-close"></i></a>
                                                            <div class="image">
                                                                <a href="<?= base_url('ecommerce/detail/' . $wishlist->product_id); ?>.html">
                                                                    <img src="<?= base_url('assets/images/products/' . $wishlist->thumbnail); ?>" class="img-fluid navimg" alt="100x100">
                                                                </a>
                                                            </div>
                                                            <div class="content">
                                                                <p class="product-title"><a href="<?= base_url('ecommerce/detail/' . $wishlist->product_id); ?>.html"><?= $wishlist->name; ?></a></p>
                                                                <p class="product-calculation"><span class="price">$<?= $wishlist->price; ?></span></p>
                                                                <!--<a href="javascript:void(0)" class="wishlist-cart-icon"><i class="fa fa-shopping-basket"></i> ADD TO CART</a>-->
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                <div class="minicart-wrapper__buttons mb-0">
                                                    <a href="<?= base_url('customer/mywishlist.html'); ?>" class="theme-button theme-button--minicart-button mb-0"><?= lang('vwishlist');?></a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('cart/mycart.html'); ?>"><i class="fa fa-shopping-basket"></i><span class="item-count"><?= count($this->cart->contents()); ?></span></a>
                                        <?php if (count($this->cart->contents()) >= 1): ?>
                                            <div class="minicart-wrapper">
                                                <p class="minicart-wrapper__title text-uppercase"><?= lang('cart');?></p>
                                                <div class="minicart-wrapper__items ps-scroll">
                                                    <?php foreach ($this->cart->contents() as $items): ?>
                                                        <div class="minicart-wrapper__items__single">
                                                            <a href="<?= base_url('cart/remove/' . $items['rowid']); ?>.html" onclick="return confirm('Are you sure?')" class="close-icon"><i class="pe-7s-close"></i></a>
                                                            <div class="image">
                                                                <a href="<?= base_url('ecommerce/detail/' . $items['id']); ?>.html">
                                                                    <img src="<?= base_url('assets/images/products/' . $items['image']); ?>" class="img-fluid navimg" alt="100x100">
                                                                </a>
                                                            </div>
                                                            <div class="content">
                                                                <p class="product-title"><a href="<?= base_url('ecommerce/detail/' . $items['id']); ?>.html"><?= $items['name']; ?></a></p>
                                                                <p class="product-calculation"><span class="count"><?= $items['qty']; ?></span> x <span class="price">৳<?= $items['price']; ?></span></p>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                <p class="minicart-wrapper__subtotal text-uppercase"><?= lang('subtotal');?>: <span>৳<?= $items['subtotal']; ?></span></p>
                                                <div class="minicart-wrapper__buttons">
                                                    <a href="<?= base_url('cart/mycart.html'); ?>" class="theme-button theme-button--minicart-button text-uppercase"><?= lang('view_cart');?></a>
                                                    <a href="<?= base_url('customer/checkout.html'); ?>" class="theme-button theme-button--alt theme-button--minicart-button theme-button--minicart-button--alt mb-0 text-uppercase"><?= lang('checkout');?></a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <?php if ($this->session->userdata('language') == 'english'): ?>
                                            <a href="<?= base_url('language/change/bengali.html'); ?>" title="Change to Bengali" class="dropdown-item"><img src="<?= base_url('assets/ecommerce/img/icons/bd.png'); ?>"></a>
                                        <?php else: ?>
                                            <a href="<?= base_url('language/change/english.html'); ?>" title="Change to English" class="dropdown-item"><img src="<?= base_url('assets/ecommerce/img/icons/us.png'); ?>"></a>
                                        <?php endif; ?>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-mobile-navigation d-block d-lg-none">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-md-6">
                    <div class="header-logo">
                        <a href="<?= base_url(); ?>">
                            <img src="<?= base_url('assets/ecommerce/img/salvia.png'); ?>" class="img-fluid" alt="80x50">
                        </a>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="mobile-navigation text-right">
                        <ul class="header-icon__list header-icon__list">
                            <li><a href="<?= ($this->session->userdata('customer_auth')) ? base_url('customer/mywishlist.html') : base_url('auth/logregis.html'); ?>"><i class="fa fa-heart-o"></i><span class="item-count"><?= count($wishlists); ?></span></a></li>
                            <li><a href="<?= base_url('cart/mycart.html'); ?>"><i class="fa fa-shopping-basket"></i><span class="item-count"><?= count($this->cart->contents()); ?></span></a></li>
                            <li><a class="mobile-menu-icon" id="mobile-menu-trigger"><i class="fa fa-bars"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>