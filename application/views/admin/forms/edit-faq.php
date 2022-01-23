<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>FAQ Update &nbsp;&nbsp;<a href="<?= base_url('admin/addfaq.html'); ?>"><button type="button" class="btn btn-sm btn-danger">Add New FAQ</button></a></h1>
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
                <div class="alert alert-danger"><?= $errors; ?></div>
            <?php endif; ?>
            <?php if (isset($success)): ?>
                <div class="alert alert-success"><?= $success; ?></div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">F.A.Q Edit</h3>
                        </div>
                        <?= form_open('action/faqs_update'); ?>
                        <div class="card-body mycards">
                            <input type="hidden" name="faqid" value="<?= $faq->id; ?>">
                            <div class="form-group">
                                <label>Category <span class="text-danger">*</span></label>
                                <select name="category" class="form-control" required>
                                    <option value="1" <?= ($faq->name == 1) ? 'selected' : ''; ?>>Shipping information</option>
                                    <option value="2" <?= ($faq->name == 2) ? 'selected' : ''; ?>>Payment information</option>
                                    <option value="2" <?= ($faq->name == 3) ? 'selected' : ''; ?>>Orders and returns</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" value="<?= $faq->title; ?>" class="form-control" placeholder="" required minlength="3" maxlength="100">
                            </div>
                            <div class="form-group">
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control" rows="4" placeholder="Description" required="" minlength="20" maxlength="500"><?= $faq->description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Visibility <span class="text-danger">*</span></label>
                                <select name="publish" class="form-control" required>
                                    <option value="1" <?= ($faq->publish == 1) ? 'selected' : ''; ?>>Yes</option>
                                    <option value="2" <?= ($faq->publish == 2) ? 'selected' : ''; ?>>No</option>
                                </select>
                            </div>
                            <div class="float-right">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>