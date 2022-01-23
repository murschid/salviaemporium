<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Customer Panel</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="<?= base_url('ecommerce.html'); ?>">Home</a></li>
                        <li class="active">User Account</li>
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
                <div class="col-md-3 border-right border-left">
                    <div class="sidebar-heading">
                        <span class="imgchng"><i class="fa fa-upload fa-2x"></i></span>
                        <img src="<?= base_url('assets/images/customers/'.$customer->photo); ?>" id="cuproimg" class="mx-auto img-fluid img-circle d-block" alt="128x128">
                    </div>
                    <h3 class="text-center"><?= $customer->name; ?></h3>
                    <div class="list-group list-group-flush">
                        <a href="<?= base_url('customer/myaccount.html'); ?>" class="list-group-item <?= isset($myacccls) ? $myacccls : ''; ?>"><i class="fa fa-user"></i> Profile</a>
                        <a href="<?= base_url('customer/editaccount.html'); ?>" class="list-group-item <?= isset($edacccls) ? $edacccls : ''; ?>"><i class="fa fa-user-plus"></i> Edit Profile</a>
                        <a href="<?= base_url('customer/editpassword.html'); ?>" class="list-group-item <?= isset($edpasscls) ? $edpasscls : ''; ?>"><i class="fa fa-user"></i> Change Password</a>
                        <a href="<?= base_url('customer/myorders.html'); ?>" class="list-group-item <?= isset($myordcls) ? $myordcls : ''; ?>"><i class="fa fa-cart-plus"></i> Orders</a>
                        <a href="<?= base_url('auth/logout.html'); ?>" class="list-group-item"><i class="fa fa-sign-out"></i> Logout</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="container-fluid">
                        <?php $this->load->view($muaccount); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('ecommerce/modal/profileimage');?>
<script type="text/javascript">
    $(document).on('click', '#cuproimg', function(){
        $('#proimgmod').modal('show');
    });
</script>