<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project Entry</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Project Form</li>
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
            <?= form_open_multipart('action/project_update'); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Data Entry (all fields are mandatory)</h3>
                        </div>
                        <div class="card-body mycards">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="hidden" name="imgid" value="<?= $project->id; ?>">
                                <input type="text" value="<?= $project->title; ?>" name="title" class="form-control" placeholder="Title" required="">
                            </div>
                            <div class="form-group">
                                <label>Short Description</label>
                                <input type="text" value="<?= $project->s_description; ?>" name="s_description" class="form-control" placeholder="Description" required="">
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" value="<?= $project->name; ?>" name="name" class="form-control" placeholder="Name" required="">
                            </div>
                            <div class="form-group">
                                <label>Year</label>
                                <input type="number" value="<?= $project->year; ?>" name="year" class="form-control" placeholder="Year" required="">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" value="<?= $project->status; ?>" name="status" class="form-control" placeholder="Status" required="">
                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <input type="text" value="<?= $project->location; ?>" name="location" class="form-control" placeholder="Location" required="">
                            </div>
                            <div class="form-group">
                                <label>Engineer</label>
                                <input type="text" value="<?= $project->engineer; ?>" name="engineer" class="form-control" placeholder="Engineer" required="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Data Entry (all fields are mandatory)</h3>
                        </div>
                        <div class="card-body mycards">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="3" placeholder="Description" required=""><?= $project->description; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Final Result</label>
                                <textarea name="result" class="form-control" rows="3" placeholder="Result" required=""><?= $project->result; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control" required="">
                                    <option value="House" selected="">House</option>
                                    <option value="Apartment">Apartment</option>
                                    <option value="Architecture">Architecture</option>
                                    <option value="Interior">Interior</option>
                                    <option value="3D Modeling">3D Modeling</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="text-danger">Photos (Can't Update)</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="text" class="custom-file-input" readonly>
                                        <label class="custom-file-label myimglbl">
                                            <?php foreach (explode(',', $project->images) as $key): ?>
                                                <img src="<?= base_url('assets/images/projects/' . $key); ?>" alt="" height="35">
                                            <?php endforeach; ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Publish *</label>
                                <select name="publish" class="form-control" required="">
                                    <option value="1" <?= $project->publish == '1' ? 'selected' : ''; ?>>Publish</option>
                                    <option value="0" <?= $project->publish == '0' ? 'selected' : ''; ?>>Unpublish</option>
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
    </section>
</div>