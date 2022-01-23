<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User's Message</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Messages</li>
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
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($messages) <= 0): ?>
                                    <tr><td colspan="6"><h3 class="text-danger font-weight-bold text-center">No message available!</h3></td></tr>
                                <?php endif; ?>
                                <?php foreach ($messages as $message): ?>
                                    <tr>
                                        <td><?= ($message->seen == 0) ? '<i class="nav-icon fas fa-envelope">' : '<i class="nav-icon far fa-envelope-open"></i>'; ?></td>
                                        <td><?= $message->name; ?></td>
                                        <td><?= $message->email; ?></td>
                                        <td><?= $message->subject; ?></td>
                                        <td><?= timespan($message->time, now(), 1); ?> ago</td>
                                        <td>
                                            <a href="<?= base_url('action/view/' . $message->id); ?>.html"><button class="btn-sm btn-info"><i class="nav-icon fas fa-eye"></i></button></a>
                                            <a href="<?= base_url('action/delete/' . $message->id); ?>.html" onclick="return confirm('Are you sure?')"><button class="btn-sm btn-danger"><i class="far fa-trash-alt"></i></button></a>
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