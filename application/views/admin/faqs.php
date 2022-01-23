<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>F.A.Q &nbsp;&nbsp;<a href="<?= base_url('admin/addfaq.html'); ?>"><button type="button" class="btn btn-sm btn-danger">Add New FAQ</button></a></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard.html'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">F.A.Q</li>
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
                                    <th>Title</th>
                                    <th>Type</th>
                                    <th>Visibility</th>
                                    <th>Time</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($faqs) <= 0): ?>
                                    <tr><td colspan="6"><h3 class="text-danger font-weight-bold text-center">No F.A.Q Available!</h3></td></tr>
                                <?php endif; ?>
                                <?php foreach ($faqs as $faq): ?>
                                    <tr>
                                        <td><?= $faq->title; ?></td>
                                        <td>
                                            <?php if ($faq->name == 1) : echo 'Shipping information'; ?>
                                            <?php elseif ($faq->name == 2) : echo 'Payment information'; ?>
                                            <?php elseif ($faq->name == 3) : echo 'Orders and Returns'; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td><?= ($faq->publish == 1) ? '<span class="badge badge-success">Published</span>' : '<span class="badge badge-danger">Unpublished</span>'; ?></td>
                                        <td><?= timespan($faq->time, now(), 1); ?> ago</td>
                                        <td>
                                            <a href="<?= base_url('action/faqedit/' . $faq->id); ?>.html"><button class="btn-sm btn-info"><i class="nav-icon fas fa-edit"></i></button></a>
                                            <a href="<?= base_url('action/faqdelete/' . $faq->id); ?>.html" onclick="return confirm('Are you sure?')"><button class="btn-sm btn-danger"><i class="far fa-trash-alt"></i></button></a>
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