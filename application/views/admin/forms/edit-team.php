<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Team</h1>
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
            <?= form_open_multipart('action/team_update'); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Update Data</h3>
                        </div>
                        <div class="card-body mycards">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" value="<?= $staff->name; ?>" class="form-control" required="" minlength="6" maxlength="50">
                            </div>
                            <input type="hidden" value="<?= $staff->id; ?>" name="teamid">
                            <div class="form-group">
                                <label>Designation <span class="text-danger">*</span></label>
                                <input type="text" name="designation" value="<?= $staff->designation; ?>" class="form-control" required="" minlength="3" maxlength="50">
                            </div>
                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="text" name="facebook" value="<?= $staff->facebook; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Linkedin</label>
                                <input type="text" name="linkedin" value="<?= $staff->linkedin; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="text" name="instagram" value="<?= $staff->instagram; ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Update Data</h3>
                        </div>
                        <div class="card-body mycards">
                            <div class="form-group">
                                <label>Speech <span class="text-danger">*</span></label>
                                <textarea name="speech" class="form-control" rows="4" required="" minlength="50" maxlength="500"><?= $staff->speech; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Type <span class="text-danger">*</span></label>
                                <select name="type" class="form-control" required="">
                                    <option value="1" <?= $staff->type == '1' ? 'selected' : ''; ?>>E-commerce</option>
                                    <option value="0"<?= $staff->type == '0' ? 'selected' : ''; ?>>Office</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Photos <span class="text-red"> [Can't update photo]</span></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="text" name="photo" class="custom-file-input" readonly>
                                        <label class="custom-file-label"><img src="<?= base_url('assets/images/team/' . $staff->photo); ?>" alt="40x40" height="28"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Active <span class="text-danger">*</span></label>
                                <select name="active" class="form-control" required="">
                                    <option value="1" <?= $staff->active == '1' ? 'selected' : ''; ?>>Yes</option>
                                    <option value="0"<?= $staff->active == '0' ? 'selected' : ''; ?>>No</option>
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