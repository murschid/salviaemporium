<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customer's Comments</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Admin</a></li>
                        <li class="breadcrumb-item active">Comments</li>
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
                                    <th><i class="nav-icon fas fa-envelope-open"></i></th>
                                    <th>Name</th>
                                    <th>rating</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                    <th>Product ID</th>
                                    <th>Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($messages) <= 0): ?>
                                    <tr><td colspan="8"><h3 class="text-danger font-weight-bold text-center">No comment available!</h3></td></tr>
                                <?php endif; ?>
                                <?php foreach ($messages as $message): ?>
                                    <tr class="active">
                                        <?php if ($message->seen == 0) { ?>
                                            <td><i class="nav-icon fas fa-envelope"></i></td>
                                        <?php } else { ?>
                                            <td><i class="nav-icon far fa-envelope-open"></i></td>
                                        <?php } ?>
                                        <td><?= $message->name; ?></td>
                                        <td><?= $message->rating; ?></td>
                                        <td><?= substr($message->comment, 0, 30); ?></td>
                                        <td><?= ($message->publish == 0) ? '<span class="badge badge-mn badge-danger">Pending</span>' : '<span class="badge badge-mn badge-success">Published</span>'; ?></td>
                                        <td><?= $message->product_id; ?></td>
                                        <td><?= timespan($message->time, now(), 1); ?> ago</td>
                                        <td>
                                            <a href="<?= base_url('action/revedit/' . $message->id); ?>.html"><button class="btn-sm btn-info"><i class="nav-icon fas fa-eye"></i></button></a>
                                            <a href="<?= base_url('action/revdlte/' . $message->id); ?>.html" onclick="return confirm('Are you sure?')"><button class="btn-sm btn-danger"><i class="far fa-trash-alt"></i></button></a>
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