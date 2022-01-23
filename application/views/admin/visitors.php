<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Visitor's Information &nbsp;&nbsp;<a href="<?= base_url('action/markseen.html'); ?>"><button type="button" class="btn btn-sm btn-danger">Mark All Seen</button></a></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Visitors</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example_" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><i class="nav-icon fas fa-users"></i></th>
                                    <th>IP</th>
                                    <th>Country</th>
                                    <th>Website</th>
                                    <th>Total</th>
                                    <th>Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($messages) <= 0): ?>
                                    <tr><td colspan="6"><h3 class="text-danger font-weight-bold text-center">No visitor available!</h3></td></tr>
                                <?php endif; ?>
                                <?php foreach ($messages as $message): ?>
                                    <tr>
                                        <?php if ($message->seen == 0) : ?>
                                            <td><i class="nav-icon fas fa-user"></i></td>
                                        <?php else: ?>
                                            <td><i class="nav-icon far fa-user"></i></td>
                                        <?php endif; ?>
                                        <td><?= $message->ip; ?></td>
                                        <td><?= $message->country; ?></td>
                                        <td><?= ($message->web == 0) ? 'Office' : 'Shop'; ?></td>
                                        <td><?= $message->count; ?></td>
                                        <td><?= timespan($message->time, now(), 1); ?> ago</td>
                                        <td>
                                            <a href="<?= base_url('action/viview/' . $message->id); ?>.html"><button class="btn-sm btn-info"><i class="nav-icon fas fa-eye"></i></button></a>
                                            <a href="<?= base_url('action/vdelete/' . $message->id); ?>.html" onclick="return confirm('Are you sure?')"><button class="btn-sm btn-danger"><i class="far fa-trash-alt"></i></button></a>
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