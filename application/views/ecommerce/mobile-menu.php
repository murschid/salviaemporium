<div class="offcanvas-mobile-menu" id="offcanvas-mobile-menu">
    <a class="offcanvas-menu-close" id="offcanvas-menu-close-trigger"><i class="pe-7s-close"></i></a>
    <div class="offcanvas-wrapper">
        <div class="offcanvas-inner-content">
            <div class="offcanvas-mobile-search-area">
                <?= form_open('ecommerce/search'); ?>
                <input type="search" name="searching" minlength="3" required="" maxlength="50" placeholder="Search...">
                <button type="submit"><i class="fa fa-search"></i></button>
                <?= form_close(); ?>
            </div>
            <nav class="offcanvas-naviagtion">
                <ul>
                    <li><a href="<?= base_url('ecommerce/category/grocery.html'); ?>" class="text-uppercase"><?= lang('grocery'); ?></a></li>
                    <li class="menu-item-has-children"><a class="text-uppercase"><?= lang('dresses'); ?></a>
                        <ul class="sub-menu">
                            <li><a href="<?= base_url('ecommerce/category/girls.html'); ?>"><?= lang('ladiesd'); ?></a></li>
                            <li><a href="<?= base_url('ecommerce/category/boys.html'); ?>"><?= lang('babyd'); ?></a></li>
                            <li><a href="<?= base_url('ecommerce/category/kids.html'); ?>"><?= lang('kidsd'); ?></a></li>
                        </ul>
                    </li>
                    <li><a href="<?= base_url('ecommerce/category/beauty.html'); ?>" class="text-uppercase"><?= lang('beauty'); ?></a></li>
                    <li><a href="<?= base_url('ecommerce/category/electronics.html'); ?>" class="text-uppercase"><?= lang('electronics'); ?></a></li>
                    <li><a href="<?= base_url('ecommerce/category/medical.html'); ?>" class="text-uppercase"><?= lang('medical'); ?></a></li>
                    <li><a href="<?= base_url('ecommerce/category/foreign.html'); ?>" class="text-uppercase"><?= lang('foreign'); ?></a></li>
                    <li class="menu-item-has-children"><a class="text-uppercase"><?= lang('pages'); ?></a>
                        <ul class="sub-menu">
                            <li><a href="<?= base_url('ecommerce/about.html'); ?>"><?= lang('about'); ?></a></li>
                            <li><a href="<?= base_url('ecommerce/contact.html'); ?>"><?= lang('contact'); ?></a></li>
                            <li><a href="<?= base_url('ecommerce/faq.html'); ?>"><?= lang('faqs'); ?></a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children"><a><i class="fa fa-user-circle"></i> <?= lang('account'); ?></a>
                        <ul class="sub-menu">
                            <?php if ($this->session->userdata('customer_auth')): ?>
                                <li><a href="<?= base_url('customer/myaccount.html'); ?>"><?= lang('account'); ?></a></li>
                            <?php else : ?>
                                <li><a href="<?= base_url('auth/logregis.html'); ?>"><?= lang('login'); ?></a></li>
                            <?php endif; ?>
                            <li><a href="<?= base_url('cart/mycart.html'); ?>"><?= lang('scart'); ?></a></li>
                            <li><a href="<?= base_url('customer/tracking.html'); ?>"><?= lang('otrack'); ?></a></li>
                            <?php if ($this->session->userdata('customer_auth')): ?>
                                <li><a href="<?= base_url('auth/logout.html'); ?>"><?= lang('logout'); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <?php if ($this->session->userdata('language') == 'english'): ?>
                            <a href="<?= base_url('language/change/bengali.html'); ?>" title="Change to Bengali" class="dropdown-item"><img src="<?= base_url('assets/ecommerce/img/icons/bd.png'); ?>"></a>
                        <?php else: ?>
                            <a href="<?= base_url('language/change/english.html'); ?>" title="Change to English" class="dropdown-item"><img src="<?= base_url('assets/ecommerce/img/icons/us.png'); ?>"></a>
                        <?php endif; ?>
                    </li>
                </ul>
            </nav>
            <div class="offcanvas-widget-area">
                <div class="off-canvas-contact-widget">
                    <div class="header-contact-info">
                        <ul class="header-contact-info__list">
                            <li><i class="pe-7s-phone"></i> <a href="tel://01636755412"><?= lang('phone_no'); ?></a></li>
                            <li><i class="pe-7s-mail-open"></i> <a href="mailto:info@salviaemporium.com">info@salviaemporium.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>