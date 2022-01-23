<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">About Us</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="<?= base_url('ecommerce.html'); ?>">Home</a></li>
                        <li class="active">About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content-wrapper">
    <div class="about-page-top-wrapper section-space">
        <div class="about-us-brief-wrapper section-space--small">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-5">
                        <h2 class="about-us-brief-title"><?= $other->title; ?></h2>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="about-us-brief-desc">
                            <p><?= $other->description; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-us-slider-wrapper section-space--small">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="about-us-slider theme-slick-slider" data-slick-setting='{
                             "slidesToShow": 1,
                             "slidesToScroll": 1,
                             "arrows": false,
                             "dots": true,
                             "autoplay": true,
                             "autoplaySpeed": 5000,
                             "speed": 500,
                             "prevArrow": {"buttonClass": "slick-prev", "iconClass": "fa fa-angle-left" },
                             "nextArrow": {"buttonClass": "slick-next", "iconClass": "fa fa-angle-right" }
                             }' data-slick-responsive='[
                             {"breakpoint":1501, "settings": {"slidesToShow": 1, "arrows": false} },
                             {"breakpoint":1199, "settings": {"slidesToShow": 1, "arrows": false} },
                             {"breakpoint":991, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} },
                             {"breakpoint":767, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} },
                             {"breakpoint":575, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} },
                             {"breakpoint":479, "settings": {"slidesToShow": 1, "arrows": false, "slidesToScroll": 1} }
                             ]'>
                            <?php foreach (explode(',', $other->photos) as $key): ?>
                            <div class="single-image">
                                <img src="<?= base_url('assets/images/others/' . $key); ?>" class="img-fluid" alt="1170x650">
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about-us-process-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-process">
                            <h3 class="title"> <span>01.</span> SERVICE</h3>
                            <p class="description"><?= $other->first; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-process">
                            <h3 class="title"> <span>02.</span> SELECTION</h3>
                            <p class="description"><?= $other->second; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-process">
                            <h3 class="title"> <span>03.</span> SATISFACTION</h3>
                            <p class="description"><?= $other->third; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-process">
                            <h3 class="title"> <span>04.</span> DELIVERY</h3>
                            <p class="description"><?= $other->forth; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="team-member-area section-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center">
                        <h2 class="section-title">MEET OUR TEAM</h2>
                        <p class="section-subtitle">Your Satisfaction defines our Success</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-member-wrapper">
                        <div class="row">
                            <?php foreach ($staffs as $staff): ?>
                                <div class="col-lg-3 col-sm-6">
                                    <div class="single-team-member">
                                        <div class="single-team-member__image">
                                            <img src="<?= base_url('assets/images/team/' . $staff->photo) ?>" class="img-fluid" alt="270x300">
                                        </div>
                                        <div class="single-team-member__content">
                                            <h3 class="name"><?= $staff->name; ?></h3>
                                            <h4 class="designation"><?= $staff->designation; ?></h4>
                                            <p class="short-desc"><?= $staff->speech; ?></p>
                                            <ul class="social-profiles">
                                                <li><a href="<?= $staff->facebook; ?>" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                                                <li><a href="<?= $staff->linkedin; ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                                                <li><a href="<?= $staff->instagram; ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                            </ul>
                                        </div>
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