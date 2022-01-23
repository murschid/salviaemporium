<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update About</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">About</li>
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
                            <input type="hidden" name="where" value="About">
                            <div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" value="<?= $other->title; ?>" class="form-control" required minlength="6" maxlength="100">
                            </div>
                            <div class="form-group">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control" rows="2" required="" minlength="50" maxlength="500"><?= $other->description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Service <span class="text-danger">*</span></label>
                                <textarea name="service" class="form-control" rows="2" required="" minlength="50" maxlength="500"><?= $other->first; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Selection <span class="text-danger">*</span></label>
                                <textarea name="selection" class="form-control" rows="2" required="" minlength="50" maxlength="500"><?= $other->second; ?></textarea>
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
                                <label>Satisfaction <span class="text-danger">*</span></label>
                                <textarea name="satisfaction" class="form-control" rows="2" required="" minlength="50" maxlength="500"><?= $other->third; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Delivery <span class="text-danger">*</span></label>
                                <textarea name="delivery" class="form-control" rows="2" required="" minlength="50" maxlength="500"><?= $other->forth; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Photos <span class="text-danger">*</span> <span class="text-red"> [2 images & size would be 1170x650]</span></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="photos[]" multiple="" class="custom-file-input">
                                        <label class="custom-file-label myimglbl">
                                            <?php foreach (explode(',', $other->photos) as $key): ?>
                                                <img src="<?= base_url('assets/images/others/' . $key); ?>" height="35" alt="1170x650">
                                            <?php endforeach; ?>
                                        </label>
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