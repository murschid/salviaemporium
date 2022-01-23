<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Policies</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Update Policy</li>
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
            <?= form_open_multipart('action/policy_update'); ?>
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-body mycards">
                            <div class="form-group row">
                                <div class="col-6">
                                    <label>Policy Name <span class="text-red">*</span></label>
                                    <select name="policyname" class="form-control" id="policycng" required="" onchange="policychange()">
                                        <option value="privacy" <?= $policies->name == 'privacy' ? 'selected' : ''; ?>>Privacy Policy</option>
                                        <option value="return" <?= $policies->name == 'return' ? 'selected' : ''; ?>>Return Policy</option>
                                        <option value="warranty" <?= $policies->name == 'warranty' ? 'selected' : ''; ?>>Warranty Policy</option>
                                        <option value="shipping" <?= $policies->name == 'shipping' ? 'selected' : ''; ?>>Shipping Policy</option>
                                        <option value="terms" <?= $policies->name == 'terms' ? 'selected' : ''; ?>>Term & Condition</option>
                                        <option value="howorder" <?= $policies->name == 'howorder' ? 'selected' : ''; ?>>How To Order</option>
                                        <option value="measuring" <?= $policies->name == 'measuring' ? 'selected' : ''; ?>>Measuring Advice</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label>Publish <span class="text-red">*</span></label>
                                    <select name="policypub" class="form-control" required="">
                                        <option value="1" <?= $policies->visibility == '1' ? 'selected' : ''; ?>>Published</option>
                                        <option value="0" <?= $policies->visibility == '0' ? 'selected' : ''; ?>>Unpublished</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Policy Content <span class="text-red">*</span></label>
                                <textarea name="policybody" class="form-control textarealg" required="" for="300"><?= $policies->body; ?></textarea>
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
    </section>
</div>
<script type="text/javascript">
    function policychange() {
        var name = $('#policycng').val();
        $.ajax({
            url: baseurl + 'action/policychange',
            method: 'POST',
            type: 'html',
            data: {'name': name},
            success: function (result) {
                console.log(result);
                window.location.reload();
            }
        });
    }
</script>