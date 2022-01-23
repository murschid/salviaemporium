<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Matched Products</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="<?= base_url('ecommerce.html'); ?>">Home</a></li>
                        <li class="active">Nothing Found</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content-wrapper">
    <div class="top-rated-product-wrapper section-space">
        <div class="product-double-row-area">
            <div class="container">
                <div class="row">
                    <span class="nosearchf font-weight-bold"><?= $error ? $error : 'No Match Found!'; ?></span>
                    <div class="col-12 nosearchfound"></div>
                </div>
            </div>
        </div>
    </div>
</div>