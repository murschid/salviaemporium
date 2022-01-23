<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title"><?= isset($subtitle) ? $subtitle : 'Policy'; ?></h2>
                    <ul class="breadcrumb-list">
                        <li><a href="<?= base_url('ecommerce.html'); ?>">Home</a></li>
                        <li class="active"><?= isset($subtitle) ? $subtitle : 'Policy'; ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content-wrapper">
    <div class="section-space">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <?= isset($howorder->body) ? $howorder->body : '<h1>Updating soon...</h1>'; ?>
                </div>
            </div>
        </div>
    </div>
</div>