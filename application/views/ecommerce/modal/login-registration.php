<div class="modal fade" id="logARegModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Login/Registration</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#login" data-toggle="tab">Sign In</a></li>
                    <li class="nav-item"><a class="nav-link" href="#registration" data-toggle="tab">Sign Up</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="login">
                        <?= form_open('auth/customer_login', array('class' => 'form-horizontal')); ?>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="cus_email" class="form-control" value="rajcse@gmail.com" placeholder="email@gmail.com" required="" minlength="6"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="cus_password" value="123456" class="form-control" placeholder="******" required="" minlength="6"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                    <div class="tab-pane" id="registration">
                        <?= form_open('auth/customer_regist', array('class' => 'form-horizontal')); ?>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="cus_name" class="form-control" placeholder="Larry Page" minlength="3" maxlength="30" required=""/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="cus_email" class="form-control" placeholder="email@gmail.com" minlength="6" maxlength="30" required=""/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile" class="col-sm-2 control-label">Mobile</label>
                            <div class="col-sm-10">
                                <input type="text" name="cus_mobile" class="form-control" placeholder="01710000000" minlength="11" maxlength="14" required=""/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-5">
                                <input type="password" name="cus_passone" class="form-control" placeholder="******" minlength="6" maxlength="20" required=""/>
                            </div>
                            <div class="col-sm-5">
                                <input type="password" name="cus_passtwo" class="form-control" id="password" placeholder="******" minlength="6" maxlength="20" required=""/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="cus_address" class="form-control" placeholder="48/11, Block-F, Banani" minlength="10" maxlength="100" required=""/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 control-label">City+ZIP</label>
                            <div class="col-sm-5">
                                <input type="text" name="cus_city" class="form-control" placeholder="Dhaka" minlength="3" maxlength="20" required=""/>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" name="cus_zip" class="form-control" placeholder="1213" minlength="4" maxlength="10" required=""/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile" class="col-sm-2 control-label">Country</label>
                            <div class="col-sm-10">
                                <select name="cus_country" required="" class="form-control">
                                    <option selected>Bangladesh</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" aria-hidden="true">Cancel</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>