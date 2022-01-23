<?php
$unsordrs = $this->home_model->common_query('tb_ordersummary', array('status' => 'pending'), 'DESC', NULL);
$nmessages = $this->home_model->common_query('tb_contacts', array('hidden' => '0', 'website' => '0', 'seen' => 0), 'DESC', NULL);
$ncomments = $this->home_model->common_query('tb_reviews', array('seen' => 0, 'publish' => 0), 'DESC', NULL);
$msg = $this->home_model->total_rows('tb_contacts', array('hidden' => '0', 'website' => '1', 'seen' => 0));
$vgtr = $this->home_model->total_rows('tb_visitors', array('seen' => 0, 'country !=' => NULL));
$users = $this->home_model->total_rows('tb_customers', array('active' => 0));
$admin = $this->home_model->degree_query('tb_admin', array('email' => $this->session->userdata('adminauth')['user']));
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" data-widget="pushmenu"><i class="fas fa-bars"></i></a></li>
        <li class="nav-item d-none d-sm-inline-block"><a href="<?= base_url(); ?>" class="nav-link" target="_blank">Shop</a></li>
        <li class="nav-item d-none d-sm-inline-block"><a href="https://sobujpatagroup.com" class="nav-link" target="_blank">Office</a></li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown"><i class="far fa-comments"></i><span class="badge badge-danger navbar-badge ordernotific"><?= count($unsordrs); ?></span></a>
            <?php if (count($unsordrs) >= 1): ?>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right navajaxdata">
                    <?php foreach ($unsordrs as $unsordr): ?>
                        <a class="dropdown-item ordercountcls">
                            <div class="media">
                                <img src="<?= base_url('assets/images/goods/' . rand(1, 10) . '.png'); ?>" alt="Goods" class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title"><?= $unsordr->order_name; ?><span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span></h3>
                                    <p class="text-sm">New order from customer...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?= timespan($unsordr->time, now(), 1); ?> Ago</p>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                    <?php endforeach; ?>
                    <a href="<?= base_url('admin/porders.html'); ?>" class="dropdown-item dropdown-footer">See All Orders</a>
                </div>
            <?php endif; ?>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge"><?= (count($nmessages) + count($ncomments) + $msg); ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header"><?= (count($nmessages) + count($ncomments) + $msg); ?> Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('admin/emessages.html'); ?>" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> <?= (count($nmessages) + $msg); ?> new messages
                    <?php if (count($nmessages) >= 1) : ?><span class="float-right text-muted text-sm"><?= timespan(end($nmessages)->time, now(), 1); ?> Ago</span><?php endif; ?>
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= base_url('admin/comments.html'); ?>" class="dropdown-item">
                    <i class="fab fa-whatsapp-square mr-2"></i> <?= count($ncomments); ?> new comments
                    <?php if (count($ncomments) >= 1) : ?><span class="float-right text-muted text-sm"><?= timespan(end($ncomments)->time, now(), 1); ?> Ago</span><?php endif; ?>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown"><i class="flag-icon flag-icon-us"></i></a>
            <div class="dropdown-menu dropdown-menu-right p-0">
                <a class="dropdown-item active"><i class="flag-icon flag-icon-us mr-2"></i> English</a>
                <a class="dropdown-item"><i class="flag-icon flag-icon-bd mr-2"></i> Bengali</a>
            </div>
        </li>
        <!--<li class="nav-item cursorpointer"><a class="nav-link"><i class="fas fa-th-large"></i></a></li>-->
        <li class="nav-item"><a class="nav-link" data-widget="control-sidebar" data-slide="true"><i class="fas fa-th-large"></i></a></li>
    </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= base_url('admin/dashboard.html'); ?>" class="brand-link">
        <img src="<?= base_url('assets/images/admin/' . $admin->photo); ?>" alt="Admin" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-bold"><?= $admin->name; ?></span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open"><a href="<?= base_url('admin/dashboard.html'); ?>" class="nav-link <?= isset($dascls) ? $dascls : ''; ?>"><i class="nav-icon fas fa-tachometer-alt"></i><p>Dashboard</p></a></li>
                <li class="nav-item has-treeview">
                    <a class="nav-link <?= isset($prodtcls['main']) ? $prodtcls['main'] : ''; ?>"><i class="nav-icon fa fa-shopping-cart"></i><p>Products<i class="fas fa-angle-left right"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/addproduct.html'); ?>" class="nav-link <?= isset($prodtcls['first']) ? $prodtcls['first'] : ''; ?>"><i class="fa fa-cart-plus nav-icon smfa"></i><p>Add Product</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/addslider.html'); ?>" class="nav-link <?= isset($prodtcls['second']) ? $prodtcls['second'] : ''; ?>"><i class="fas fa-sliders-h nav-icon smfa"></i><p>Add Slider</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/addbanner.html'); ?>" class="nav-link <?= isset($prodtcls['third']) ? $prodtcls['third'] : ''; ?>"><i class="fas fa-flag nav-icon smfa"></i><p>Add Banner</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/addhotdeal.html'); ?>" class="nav-link <?= isset($prodtcls['fifth']) ? $prodtcls['fifth'] : ''; ?>"><i class="fas fa-fire nav-icon smfa"></i><p>Add Hot Deal</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/allproducts.html'); ?>" class="nav-link <?= isset($prodtcls['forth']) ? $prodtcls['forth'] : ''; ?>"><i class="fa fa-cart-arrow-down nav-icon smfa"></i><p>All Products</p></a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="<?= base_url('admin/torders.html'); ?>" class="nav-link <?= isset($ordercls['main']) ? $ordercls['main'] : ''; ?>"><i class="nav-icon fas fa-cart-plus"></i><p>Orders<span class="right badge badge-danger ordernotific"><?= count($unsordrs); ?></span></p></a></li>
                <li class="nav-item has-treeview">
                    <a class="nav-link <?= isset($invoccls['main']) ? $invoccls['main'] : ''; ?>"><i class="nav-icon fas fa-money-bill-alt"></i><p>Finance<i class="fas fa-angle-left right"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/calculation.html'); ?>" class="nav-link <?= isset($invoccls['first']) ? $invoccls['first'] : ''; ?>"><i class="fas fa-money-bill-alt nav-icon smfa"></i><p>Calculation</p></a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="<?= base_url('admin/users.html'); ?>" class="nav-link <?= isset($usercls['main']) ? $usercls['main'] : ''; ?>"><i class="nav-icon fas fa-users"></i><p>Customers<span class="right badge badge-danger ordernotific"><?= $users; ?></span></p></a></li>
                <li class="nav-item has-treeview">
                    <a class="nav-link <?= isset($catgscls['main']) ? $catgscls['main'] : ''; ?>"><i class="nav-icon fas fa-clinic-medical"></i><p>General<i class="fas fa-angle-left right"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/categories.html'); ?>" class="nav-link <?= isset($catgscls['first']) ? $catgscls['first'] : ''; ?>"><i class="fab fa-apple nav-icon smfa"></i><p>Brand & Cat</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/addteam.html'); ?>" class="nav-link <?= isset($catgscls['second']) ? $catgscls['second'] : ''; ?>"><i class="fa fa-users nav-icon smfa"></i><p>Team</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/policies.html'); ?>" class="nav-link <?= isset($catgscls['third']) ? $catgscls['third'] : ''; ?>"><i class="fa fa-lock nav-icon smfa"></i><p>Policies</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/about.html'); ?>" class="nav-link <?= isset($catgscls['fourth']) ? $catgscls['fourth'] : ''; ?>"><i class="fa fa-list-alt nav-icon smfa"></i><p>About</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/contactus.html'); ?>" class="nav-link <?= isset($catgscls['fifth']) ? $catgscls['fifth'] : ''; ?>"><i class="fab fa-whatsapp-square nav-icon smfa"></i><p>Contact</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/faqs.html'); ?>" class="nav-link <?= isset($catgscls['sixth']) ? $catgscls['sixth'] : ''; ?>"><i class="fa fa-question-circle nav-icon smfa"></i><p>F.A.Q</p></a></li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a class="nav-link <?= isset($cmntcls['main']) ? $cmntcls['main'] : ''; ?>"><i class="nav-icon fas fa-comments"></i><p>Comments<i class="fas fa-angle-left right"></i><span class="right badge badge-danger"><?= (count($ncomments) + count($nmessages)); ?></span></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/comments.html'); ?>" class="nav-link <?= isset($cmntcls['first']) ? $cmntcls['first'] : ''; ?>"><i class="fas fa-comment-dots nav-icon smfa"></i><p>Comments<span class="right badge badge-info"><?= count($ncomments); ?></span></p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/emessages.html'); ?>" class="nav-link <?= isset($cmntcls['second']) ? $cmntcls['second'] : ''; ?>"><i class="fa fa-envelope nav-icon smfa"></i><p>Messages<span class="right badge badge-info"><?= count($nmessages); ?></span></p></a></li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a class="nav-link <?= isset($othercls['main']) ? $othercls['main'] : ''; ?>"><i class="nav-icon fas fa-shipping-fast"></i><p>Others<i class="fas fa-angle-left right"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/testimonials.html'); ?>" class="nav-link <?= isset($othercls['first']) ? $othercls['first'] : ''; ?>"><i class="fas fa-comments nav-icon smfa"></i><p>Testimonials</p></a></li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a class="nav-link <?= isset($emailcls['main']) ? $emailcls['main'] : ''; ?>"><i class="nav-icon fas fa-mail-bulk"></i><p>Email<i class="fas fa-angle-left right"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/seemail.html'); ?>" class="nav-link <?= isset($emailcls['first']) ? $emailcls['first'] : ''; ?>"><i class="nav-icon fas fa-envelope smfa"></i><p class="text">Message</p></a></li>
                    </ul>
                </li>
                <li class="nav-item"><a href="<?= base_url('admin/moderators.html'); ?>" class="nav-link <?= isset($modcls['main']) ? $modcls['main'] : ''; ?>"><i class="nav-icon fa fa-user-secret"></i><p>Moderators</p></a></li>
                <li class="nav-header text-bold">COMMON-MENU</li>
                <!--<li class="nav-item has-treeview">
                    <a class="nav-link <?= isset($offccls['main']) ? $offccls['main'] : ''; ?>"><i class="nav-icon fas fa-landmark"></i><p>Office<i class="fas fa-angle-left right"></i><span class="right badge badge-danger"><?= $msg; ?></span></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item"><a href="<?= base_url('admin/projects.html'); ?>" class="nav-link <?= isset($offccls['first']) ? $offccls['first'] : ''; ?>"><i class="nav-icon fas fa-business-time smfa"></i><p class="text">Projects</p></a></li>
                        <li class="nav-item"><a href="<?= base_url('admin/messages.html'); ?>" class="nav-link <?= isset($offccls['second']) ? $offccls['second'] : ''; ?>"><i class="nav-icon fas fa-envelope smfa"></i><p>Messages<span class="right badge badge-danger"><?= $msg; ?></span></p></a></li>
                    </ul>
                </li>-->
                <li class="nav-item"><a href="<?= base_url('admin/visitors.html'); ?>" class="nav-link <?= isset($viscls) ? $viscls : ''; ?>"><i class="nav-icon fas fa-users"></i><p>Visitors<span class="right badge badge-warning"><?= $vgtr; ?></span></p></a></li>
                <li class="nav-item"><a href="<?= base_url('admin/deletecache.html'); ?>" onclick="return confirm('Are you sure?')" class="nav-link"><i class="nav-icon fas fa-trash-alt"></i><p>Delete Cache</p></a></li>
                <li class="nav-item"><a href="<?= base_url('auth/signout.html'); ?>" onclick="return confirm('Are you sure?')" class="nav-link"><i class="nav-icon fas fa-sign-out-alt text-danger"></i><p>Sign Out</p></a></li>
            </ul>
        </nav>
    </div>
</aside>