<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User's Information</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">All Users</h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width:200px;">
                                <input type="text" id="produsearch" onkeyup="searchUser($(this).val())" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append"><button type="button" class="btn btn-default"><i class="fas fa-search"></i></button></div>
                            </div>
                        </div>
                    </div>
                    <div id="ajaxproduct" class="card-body table-responsive p-0" style="height:600px;">
                        <table id="example_" class="table table-bordered table-striped table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Status</th>
                                    <th>Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($users) <= 0): ?>
                                    <tr><td colspan="6"><h3 class="text-danger font-weight-bold text-center">No users available!</h3></td></tr>
                                <?php endif; ?>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= $user->name; ?></td>
                                        <td><?= $user->email; ?></td>
                                        <td><?= $user->mobile; ?></td>
                                        <td><?= ($user->active == 1) ? '<span class="badge badge-mn badge-success">Active</span>' : '<span class="badge badge-mn badge-danger">Inactive</span>'; ?></td>
                                        <td><?= timespan($user->time, now(), 1); ?> ago</td>
                                        <td>
                                            <a href="<?= base_url('action/useredit/' . $user->id); ?>.html"><button class="btn-sm btn-info"><i class="nav-icon fas fa-edit"></i></button></a>
                                            <?php if ($this->session->userdata('adminauth')['role'] == 'admin'): ?>
                                                <a href="<?= base_url('action/userdelete/' . $user->id); ?>.html" onclick="return confirm('Are you sure?')"><button class="btn-sm btn-danger"><i class="far fa-trash-alt"></i></button></a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer clearfix"><?= $pagination; ?></div>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    function searchUser(user) {
        $.ajax({
            url: baseurl + 'action/searchuser',
            method: 'POST',
            type: 'html',
            data: {'nameorid': user},
            success: function (result) {
                $('#ajaxproduct').html(result);
            }
        });
    }
</script>