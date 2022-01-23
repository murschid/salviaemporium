<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Read Message</h3>
                            <div class="card-tools">
                                <a class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
                                <a class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="mailbox-read-info">
                                <h5>Subject: <?= $message->subject; ?></h5>
                                <h6>From: <?= $message->name; ?>, Mobile: <?= $message->mobile; ?><span class="mailbox-read-time float-right">Time: <?= timespan($message->time, now(), 3); ?> ago</span></h6>
                            </div>
                            <div class="mailbox-controls with-border text-center">
                                <div class="btn-group">
                                    <a href="<?= base_url('action/delete/' . $message->id); ?>.html" onclick="return confirm('Are you sure?')"><button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete"><i class="far fa-trash-alt"></i></button></a>
                                    <a href="mailto:<?= $message->email . '?Subject=Re:' . $message->subject; ?>" target="_blank"><button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply"><i class="fas fa-reply"></i></button></a>
                                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Print"><i class="fas fa-print"></i></button>
                                </div>
                            </div>
                            <div class="mailbox-read-message"><?= $message->message; ?></div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>
    </section>
</div>