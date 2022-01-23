<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Comments</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Comment Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
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
                            <h3 class="card-title">Comment Data</h3>
                        </div>
                        <?= form_open_multipart('action/comment_update'); ?>
                        <div class="card-body mycards">
                            <div class="row">
                                <div class="col-6">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="hidden" name="commentid" value="<?= $review->id; ?>">
                                    <input type="text" value="<?= $review->name; ?>" class="form-control" readonly="">
                                </div>
                                <div class="col-6">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input type="email" value="<?= $review->email; ?>" class="form-control" readonly="">
                                </div>
                                <div class="col-4">
                                    <label>Produt ID <span class="text-danger">*</span></label>
                                    <input type="text" value="<?= $review->product_id; ?>" class="form-control"  readonly="">
                                </div>
                                <div class="col-4">
                                    <label>Rating <span class="text-danger">*</span></label>
                                    <input type="text" name="rating" value="<?= $review->rating; ?>" minlength="1" maxlength="1" max="5" min="1" class="form-control" required="">
                                </div>
                                <div class="col-4">
                                    <label>Approval <span class="text-danger">*</span></label>
                                    <select name="approval" class="form-control">
                                        <option value="1" selected>Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="col-12 form-group">
                                    <label>Comment <span class="text-danger">*</span></label>
                                    <textarea value="" name="comment" class="form-control" maxlength="400" minlength="3" required=""><?= $review->comment; ?></textarea>
                                </div>
                                <div class="col-12 form-group float-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>