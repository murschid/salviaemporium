<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Moderators</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Moderators</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php
                $errors = $this->session->flashdata('errors');
                $success = $this->session->flashdata('success');
                ?>
                <?php if (isset($errors)): ?>
                    <div class="alert alert-danger"><?php echo $errors; ?></div>
                <?php endif; ?>
                <?php if (isset($success)): ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Moderator Entry</h3>
                    </div>
                    <?= form_open_multipart('action/addadmin'); ?>
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="John Deo" required minlength="6" maxlength="30">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" class="form-control" placeholder="username@domail.com" required minlength="9" maxlength="30">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input type="text" name="password" class="form-control" placeholder="******" required minlength="6" maxlength="20">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Retype Password <span class="text-danger">*</span></label>
                                    <input type="text" name="passwordtwo" class="form-control" placeholder="******" required minlength="6" maxlength="20">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Photo <span class="text-red">* [1 image & size will be 100x100]</span></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="photo" class="custom-file-input" required="">
                                            <label class="custom-file-label">Choose Images</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">All Moderator</h3>
                    </div>
                    <div class="card-body table-responsive p-0" style="min-height:50vh;">
                        <table id="example_" class="table table-bordered table-striped table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Time</th>
                                    <?php if ($this->session->userdata('adminauth')['role'] == 'admin') : ?>
                                        <th>Actions</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($moderstors) <= 0): ?>
                                    <tr><td colspan="6"><h3 class="text-danger font-weight-bold text-center">No Moderator Available!</h3></td></tr>
                                <?php endif; ?>
                                <?php foreach ($moderstors as $moderstor): ?>
                                    <tr>
                                        <td><img src="<?= base_url('assets/images/admin/' . $moderstor->photo); ?>" alt="Admin" height="25"></td>
                                        <td><?= $moderstor->name; ?></td>
                                        <td><?= $moderstor->email; ?></td>
                                        <td>Moderator</td>
                                        <td><?= ($moderstor->active == 1) ? '<span class="badge badge-mn badge-success">Active</span>' : '<span class="badge badge-mn badge-danger">Inactive</span>'; ?></td>
                                        <!--<td><?#= timespan($moderstor->time, now(), 1); ?> ago</td>-->
                                        <td><?= mdate('%d-%m-%Y  %h:%i %a', $moderstor->time); ?></td>
                                        <?php if ($this->session->userdata('adminauth')['role'] == 'admin') : ?>
                                            <td>
                                                <?php if ($moderstor->active == 1) : ?>
                                                    <a href="<?= base_url('action/modinactive/' . $moderstor->id); ?>.html"><button class="btn-sm btn-danger"><i class="nav-icon fa fa-window-close"></i></button></a>
                                                <?php else: ?>
                                                    <a href="<?= base_url('action/modactive/' . $moderstor->id); ?>.html"><button class="btn-sm btn-success"><i class="nav-icon fas fa-check-square"></i></button></a>
                                                <?php endif; ?>
                                                <a href="<?= base_url('action/moddelete/' . $moderstor->id); ?>.html" onclick="return confirm('Are you sure?')"><button class="btn-sm btn-danger"><i class="far fa-trash-alt"></i></button></a>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>