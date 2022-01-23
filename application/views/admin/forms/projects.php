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
            <?= form_open_multipart('action/project_entry'); ?>
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Data Entry (all fields are mandatory)</h3>
                        </div>
                        <div class="card-body mycards">
                            <div class="form-group">
                                <label>Title <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" placeholder="Title" required="">
                            </div>
                            <div class="form-group">
                                <label>Short Description <span class="text-danger">*</span></label>
                                <input type="text" name="s_description" class="form-control" placeholder="Description" required="">
                            </div>
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Name" required="">
                            </div>
                            <div class="form-group">
                                <label>Year <span class="text-danger">*</span></label>
                                <input type="number" name="year" class="form-control" minlength="4" maxlength="4" min="2000" placeholder="2020" required="">
                            </div>
                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <input type="text" name="status" class="form-control" placeholder="Status" required="">
                            </div>
                            <div class="form-group">
                                <label>Location <span class="text-danger">*</span></label>
                                <input type="text" name="location" class="form-control" placeholder="Location" required="">
                            </div>
                            <div class="form-group">
                                <label>Engineer <span class="text-danger">*</span></label>
                                <input type="text" name="engineer" class="form-control" placeholder="Engineer" required="">
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
                                <label>Description <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control" rows="3" placeholder="Description" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label>Final Result <span class="text-danger">*</span></label>
                                <textarea name="result" class="form-control" rows="3" placeholder="Result" required=""></textarea>
                            </div>
                            <div class="form-group">
                                <label>Category <span class="text-danger">*</span></label>
                                <select name="category" class="form-control" required="">
                                    <option value="House" selected="">House</option>
                                    <option value="Apartment">Apartment</option>
                                    <option value="Architecture">Architecture</option>
                                    <option value="Interior">Interior</option>
                                    <option value="3D Modeling">3D Modeling</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Photos <span class="text-danger">* [3 images & size ratio would be 4:3]</span></label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="userfile[]" multiple="" class="custom-file-input" required="">
                                        <label class="custom-file-label">Choose Images</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Publish  <span class="text-danger">*</span></label>
                                <select name="publish" class="form-control" required="">
                                    <option value="1" selected="">Publish</option>
                                    <option value="0">Unpublish</option>
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
                                    <th>Project Name</th>
                                    <th>Location</th>
                                    <th>Published</th>
                                    <th>Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($projects) <= 0): ?>
                                    <tr><td colspan="6"><h3 class="text-danger font-weight-bold text-center">No comment available!</h3></td></tr>
                                <?php endif; ?>
                                <?php foreach ($projects as $project): ?>
                                    <tr class="active">
                                        <td>
                                            <?php foreach (explode(',', $project->images) as $key): ?>
                                                <img src="<?= base_url('assets/images/projects/' . $key); ?>" alt="" height="25">
                                            <?php endforeach; ?>
                                        </td>
                                        <td><?= $project->name; ?></td>
                                        <td><?= $project->location; ?></td>
                                        <td><?= ($project->publish == 1) ? '<span class="text-green">Yes</span>' : '<span class="text-red">No</span>'; ?></td>
                                        <td><?= unix_to_human($project->time); ?></td>
                                        <td>
                                            <a href="<?= base_url('action/proedit/' . $project->id); ?>.html"><button class="btn-sm btn-info"><i class="nav-icon fas fa-edit"></i></button></a>
                                            <a href="<?= base_url('action/prodlte/' . $project->id); ?>.html" onclick="return confirm('Are you sure?')"><button class="btn-sm btn-danger"><i class="far fa-trash-alt"></i></button></a>
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