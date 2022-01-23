<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Testimonial Entry</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Testimonials Form</li>
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
            <?= form_open_multipart('action/testimonial_entry'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Data Entry</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" placeholder="John Deo" required minlength="6" maxlength="50">
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
                            <div class="form-group">
                                <label>Speech <span class="text-danger">*</span></label>
                                <textarea name="speech" class="form-control" rows="2" placeholder="Few Lines" required=""></textarea>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Date <span class="text-danger">*</span></label>
                                        <input type="date" name="date" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Publish <span class="text-danger">*</span></label>
                                        <select name="publish" class="form-control" required="">
                                            <option value="1" selected="">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?= form_close(); ?>

            <div class="row">
                <div class="col-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">All Testimonials</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        <th>Speech</th>
                                        <th>Publish</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($testimonials) <= 0): ?>
                                        <tr><td colspan="7"><h3 class="text-danger font-weight-bold text-center">No testimonial available!</h3></td></tr>
                                    <?php endif; ?>
                                    <?php foreach ($testimonials as $testimonial): ?>
                                        <tr class="active">
                                            <td><img src="<?= base_url('assets/images/testimonial/' . $testimonial->photo); ?>" alt="40x40" height="40"></td>
                                            <td><?= $testimonial->name; ?></td>
                                            <td><?= substr($testimonial->speech, 0, 80); ?>...</td>
                                            <td><?= ($testimonial->publish == 1) ? '<span class="badge badge-success">Yes</span>' : '<span class="badge badge-danger">No</span>'; ?></td>
                                            <td><?= $testimonial->date; ?></td>
                                            <td>
                                                <a href="<?= base_url('action/testidelete/' . $testimonial->id); ?>.html" onclick="return confirm('Are you sure?')"><button class="btn-sm btn-danger"><i class="far fa-trash-alt"></i></button></a>
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
    </section>
</div>