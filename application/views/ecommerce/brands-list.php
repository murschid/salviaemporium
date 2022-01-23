<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Shop by Brand</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="<?= base_url('ecommerce.html'); ?>">Home</a></li>
                        <li class="active">Shop by Brand</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content-wrapper">
    <div class="featured-brand section-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="featured-brand-wrapper">
                        <div class="row align-items-center">
                            <?php foreach ($brands as $brand): ?>
                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <div class="single-brand">
                                        <a href="<?= base_url('ecommerce/brand/' . $brand->id); ?>.html">
                                            <img src="<?= base_url('assets/images/brands/' . $brand->image); ?>" title="<?= $brand->brand; ?>" class="img-fluid brands-40" alt="100x70">
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>