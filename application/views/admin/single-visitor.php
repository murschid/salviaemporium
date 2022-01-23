<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Single Visitor</h3>
                            <div class="card-tools">
                                <a class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
                                <a class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="mailbox-read-info">
                                <h6><span class="mailbox-read-time float-left">Time: <?= timespan($message->time, now(), 3); ?> ago</span></h6>
                            </div>
                            <div class="mailbox-controls with-border text-center">
                                <div class="btn-group">
                                    <a href="<?= base_url('action/vdelete/' . $message->id); ?>.html" onclick="return confirm('Are you sure?')"><button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete"><i class="far fa-trash-alt"></i></button></a>
                                    <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print"><i class="fas fa-print"></i></button>
                                </div>
                            </div>
                            <div class="mailbox-read-message">
                                <h3>IP: <?= $message->ip; ?></h3>
                                <h6>From: <?= $message->country; ?></h6>
                                <h6>Region: <?= $message->region; ?></h6>
                                <h6>City: <?= $message->city; ?></h6>
                                <h6>Agent: <?= $message->agent; ?></h6>
                                <h6>Times: <?= $message->count; ?></h6>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>
    </section>
</div>