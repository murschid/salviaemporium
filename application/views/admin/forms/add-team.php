<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Team Entry</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Team Form</li>
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
                <div class="alert alert-danger"><?php echo $errors; ?></div>
            <?php endif; ?>
            <?php if (isset($success)): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>
            <?= form_open_multipart('action/team_entry'); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Data Entry</h3>
                        </div>
                        <div class="card-body mycards">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="John Deo" required minlength="6" maxlength="50">
                            </div>
                            <div class="form-group">
                                <label>Designation <span class="text-danger">*</span></label>
                                <input type="text" name="designation" class="form-control" placeholder="Manager" required="" minlength="3" maxlength="50">
                            </div>
                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="text" name="facebook" class="form-control" placeholder="https://facebook.com/username">
                            </div>
                            <div class="form-group">
                                <label>Linkedin</label>
                                <input type="text" name="linkedin" class="form-control" placeholder="https://linkedin.com/username">
                            </div>
                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="text" name="instagram" class="form-control" placeholder="https://instagram.com/username">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Data Entry</h3>
                        </div>
                        <div class="card-body mycards">
                            <div class="form-group">
                                <label>Speech <span class="text-danger">*</span></label>
                                <textarea name="speech" class="form-control" rows="4" placeholder="His own speech..." required="" minlength="50" maxlength="500"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Type <span class="text-danger">*</span></label>
                                <select name="type" class="form-control" required="">
                                    <option value="1" selected>E-commerce</option>
                                    <option value="0">Office</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Photos <span class="text-danger">*</span> <span class="text-red"> [1 image & size would be exact 270x300]</span></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="photo" class="custom-file-input" required="">
                                        <label class="custom-file-label">Choose Images</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Active <span class="text-danger">*</span></label>
                                <select name="active" class="form-control" required="">
                                    <option value="1" selected="">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">All Projects</h3>
                    </div>
                    <div class="card-body">
                        <table id="example_" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Active</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($staffs) <= 0): ?>
                                    <tr><td colspan="7"><h3 class="text-danger font-weight-bold text-center">No member available!</h3></td></tr>
                                <?php endif; ?>
                                <?php foreach ($staffs as $staff): ?>
                                    <tr class="active">
                                        <td><img src="<?= base_url('assets/images/team/' . $staff->photo); ?>" alt="40x40" height="40"></td>
                                        <td><?= $staff->name; ?></td>
                                        <td><?= $staff->designation; ?></td>
                                        <td><?= ($staff->active == 1) ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-danger">No</span>'; ?></td>
                                        <td><?= ($staff->type == 1) ? '<span class="badge badge-info">Ecommerce</span>' : '<span class="badge badge-warning">Office</span>'; ?></td>
                                        <td><?= unix_to_human($staff->time); ?></td>
                                        <td>
                                            <a href="<?= base_url('action/teamedit/' . $staff->id); ?>.html" onclick="return confirm('Are you sure?')"><button class="btn-sm btn-info"><i class="nav-icon fas fa-edit"></i></button></a>
                                            <a href="<?= base_url('action/teamdlte/' . $staff->id); ?>.html" onclick="return confirm('Are you sure?')"><button class="btn-sm btn-danger"><i class="far fa-trash-alt"></i></button></a>
                                        </td>
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