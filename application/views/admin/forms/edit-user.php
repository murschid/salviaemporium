<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <?php
            $errors = $this->session->flashdata('errors');
            $success = $this->session->flashdata('success');
            ?>
            <?php if (isset($errors)): ?>
                <div class="alert alert-danger"><?= $errors; ?></div>
            <?php endif; ?>
            <?php if (isset($success)): ?>
                <div class="alert alert-success"><?= $success; ?></div>
            <?php endif; ?>
            <?= form_open('action/user_update'); ?>
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">User Edit</h3>
                        </div>
                        <div class="card-body mycards">
                            <input type="hidden" name="userid" value="<?= $user->id; ?>">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="<?= $user->name; ?>" class="form-control" required="" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="text" name="email" value="<?= $user->email; ?>" class="form-control" required="" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Mobile <span class="text-danger">*</span></label>
                                <input type="text" name="mobile" value="<?= $user->mobile; ?>" class="form-control" required="" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Address <span class="text-danger">*</span></label>
                                <input type="text" name="address" value="<?= $user->address; ?>" class="form-control" required="" readonly="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">User Edit</h3>
                        </div>
                        <div class="card-body mycards">
                            <div class="form-group">
                                <label>City <span class="text-danger">*</span></label>
                                <input type="text" name="city" value="<?= $user->city; ?>" class="form-control" required="" readonly="">
                            </div>
                            <div class="form-group">
                                <label>ZIP <span class="text-danger">*</span></label>
                                <input type="text" name="zip" value="<?= $user->zip; ?>" class="form-control" required="" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Country <span class="text-danger">*</span></label>
                                <input type="text" name="country" value="<?= $user->country; ?>" class="form-control" required="" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Active <span class="text-danger">*</span></label>
                                <select name="active" class="form-control" required>
                                    <option value="1" <?= ($user->active == 1) ? 'selected' : ''; ?>>Activate</option>
                                    <option value="0" <?= ($user->active == 0) ? 'selected' : ''; ?>>Inactivate</option>
                                </select>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </section>
</div>