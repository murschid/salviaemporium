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