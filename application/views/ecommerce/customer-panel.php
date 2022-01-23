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
                <div class="col-md-3 order-lg-1 text-center">
                    <img src="<?= base_url('assets/images/shop/user_logo_128.png'); ?>" class="mx-auto img-fluid img-circle d-block" alt="avatar">
                    <div class="mt-2" style="margin-top:30px;"><a href="<?= base_url('ecommerce/logout.html'); ?>"><button class="btn btn-danger"><i class="fa fa-sign-out"></i> Sign Out</button></a></div>
                </div>
                <div class="col-md-9 order-lg-2" style="min-height: 520px">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Orders</a></li>
                        <li class="nav-item"><a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit Profile</a></li>
                    </ul>
                    <div class="tab-content py-4">
                        <div class="tab-pane active" id="profile">
                            <div class="alert alert-info alert-dismissable">
                                <a class="panel-close close" data-dismiss="alert">×</a> This is an <strong>.alert</strong>. Use this to show important messages to the user.
                            </div>
                            <table class="table table-hover table-striped">
                                <tbody>
                                    <tr><td><span class="float-right font-weight-bold">3 hrs ago</span> Here is your a link to the latest summary report from the..</td></tr>
                                    <tr><td><span class="float-right font-weight-bold">Yesterday</span> There has been a request on your account since that was..</td></tr>
                                    <tr><td><span class="float-right font-weight-bold">9/10</span> Porttitor vitae ultrices quis, dapibus id dolor. Morbi venenatis lacinia rhoncus.</td></tr>
                                </tbody> 
                            </table>
                        </div>
                        <div class="tab-pane" id="edit">
                            <form role="form">
                                <input type="hidden" name="cust_id" value="<?= $customer->id; ?>">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label form-control-label">Full Name *</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" value="<?= $customer->name; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label form-control-label">Email *</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="email" value="<?= $customer->email; ?>" readonly="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label form-control-label">Mobile *</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" value="<?= $customer->mobile; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label form-control-label">Address *</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" value="<?= $customer->address; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-sm-3 col-xs-3 col-form-label form-control-label"> City+ZIP *</label>
                                    <div class="col-md-5 col-sm-5 col-xs-5">
                                        <input class="form-control" type="text" value="<?= $customer->city; ?>" placeholder="City">
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <input class="form-control" type="text" value="<?= $customer->zip; ?>" placeholder="ZIP">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label form-control-label">Country *</label>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" value="<?= $customer->country; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label form-control-label"></label>
                                    <div class="col-md-9">
                                        <input type="button" class="btn btn-primary" value="Save Changes">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>