<div class="breadcrumb-area section-space--breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="breadcrumb-wrapper">
                    <h2 class="page-title">Contact Us</h2>
                    <ul class="breadcrumb-list">
                        <li><a href="<?= base_url('ecommerce.html'); ?>">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content-wrapper">
    <!--<div class="box-layout-map-area section-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box-layout-map-container">
                        <div class="google-map" id="google-map-three"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>-->
    <div class="contact-icon-text-area section-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-icon-text-wrapper">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="single-contact-icon-text">
                                    <div class="single-contact-icon-text__icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <h3 class="single-contact-icon-text__title">ADDRESS</h3>
                                    <p class="single-contact-icon-text__value"><?= $other->first; ?></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="single-contact-icon-text">
                                    <div class="single-contact-icon-text__icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <h3 class="single-contact-icon-text__title">PHONE NUMBER</h3>
                                    <p class="single-contact-icon-text__value"><?= $other->second; ?></p>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="single-contact-icon-text">
                                    <div class="single-contact-icon-text__icon">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <h3 class="single-contact-icon-text__title">MAIL ADDRESS</h3>
                                    <p class="single-contact-icon-text__value"><?= $other->third; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="contact-form-content-area section-space--contact-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-form-content-wrapper">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="contact-form-wrapper">
                                    <?= form_open('action/contactdatasave', array('id' => 'contact-form')); ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="Full Name *" name="name" minlength="3" maxlength="30" required="">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="email" placeholder="Email *" name="email" minlength="9" maxlength="30" required="">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="Mobile *" name="mobile" minlength="11" maxlength="14" required="">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="Subject *" name="subject" minlength="3" maxlength="100" required="">
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea rows="5" placeholder="Message *" name="message" minlength="3" maxlength="900" required=""></textarea>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" class="theme-button">SEND A MESSAGE</button>
                                        </div>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="contact-form-content">
                                    <p><?= $other->description; ?></p>
                                    <ul class="social-links">
                                        <li><a href="https://www.facebook.com/"><i class="fa fa-facebook-square"></i></a></li>
                                        <li><a href="https://www.plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="https://www.twitter.com/"><i class="fa fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.22&amp;key=AIzaSyChs2QWiAhnzz0a4OEhzqCXwx_qA9ST_lE"></script>
<!-- Map JS -->
<script>
    google.maps.event.addDomListener(window, 'load', init3);
    function init3() {
        var mapOptions = {
            zoom: 16,
            scrollwheel: false,
            center: new google.maps.LatLng(23.8750248, 90.3764135), // Dhaka
            styles: [{
                    "featureType": "all",
                    "elementType": "all",
                    "stylers": [{
                            "saturation": -100
                        },
                        {
                            "gamma": 0.5
                        }
                    ]
                }]
        };
        var mapElement = document.getElementById('google-map-three');
        var map = new google.maps.Map(mapElement, mapOptions);
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(23.8750248, 90.3764135),
            map: map,
            title: 'Salvia',
            icon: "<?= base_url('assets/img/icons/map_marker.png'); ?>"
        });
    }
</script>