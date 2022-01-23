<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Contact Us</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Contact Us</li>
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
            <?= form_open_multipart('action/update_about'); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Data Entry</h3>
                        </div>
                        <div class="card-body mycards">
                            <input type="hidden" name="where" value="Contact">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" value="<?= $other->title; ?>" class="form-control" minlength="6" maxlength="100">
                            </div>
                            <div class="form-group">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control" rows="3" required minlength="50" maxlength="500"><?= $other->description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Address <span class="text-danger">*</span></label>
                                <input type="text" name="service" value="<?= $other->first; ?>" class="form-control" required minlength="6" maxlength="300">
                            </div>
                            <div class="form-group">
                                <label>Phone No <span class="text-danger">*</span></label>
                                <input type="text" name="selection" value="<?= $other->second; ?>" class="form-control" required minlength="6" maxlength="100">
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
                                <label>Email Address <span class="text-danger">*</span></label>
                                <input type="text" name="satisfaction" value="<?= $other->third; ?>" class="form-control" required minlength="6" maxlength="100">
                            </div>
                            <div class="form-group">
                                <label>Maps <span class="text-danger"> [No Need]</span></label>
                                <textarea name="delivery" class="form-control" rows="2" minlength="50" maxlength="700"><?= $other->forth; ?></textarea>
                            </div>
                            <div class="form-group disabled">
                                <label>Photos <span class="text-danger"> [No Need]</span></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="photos" class="custom-file-input disabled">
                                        <label class="custom-file-label disabled"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Visibility <span class="text-danger">*</span></label>
                                <select name="visibility" class="form-control" required="">
                                    <option value="1" <?= $other->visibility == '1' ? 'selected' : ''; ?>>Yes</option>
                                    <option value="0" <?= $other->visibility == '0' ? 'selected' : ''; ?>>No</option>
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