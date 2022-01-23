<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <title><?= isset($title) ? $title : 'Innovative Consultant' ?></title>
        <link rel="icon" href="<?= base_url('assets/images/favicon.png'); ?>" type="image/x-icon">
        <link href="<?= base_url('assets/css/bootstrap_v4.3.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/plugins/revolution/css/settings.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url('assets/plugins/revolution/css/layers.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url('assets/plugins/revolution/css/navigation.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/responsive.css'); ?>" rel="stylesheet">
        <script src="<?= base_url('assets/js/jquery.js'); ?>"></script> 
        <script src="<?= base_url('assets/js/bootstrap_v4.3.js'); ?>"></script>
    </head>
    <body>
        <div class="logpreloader"></div>
        <div class="page-wrapper">
            <div class="header-span"></div>
            <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="<?= base_url('index.html'); ?>"><img src="<?= base_url('assets/images/logo_sp.png'); ?>" alt="Logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item <?= isset($homecls) ? $homecls : ''; ?>"><a class="nav-link" href="<?= base_url('index.html'); ?>">HOME<span class="sr-only">(current)</span></a></li>
                        <li class="nav-item <?= isset($aboutcls) ? $aboutcls : ''; ?>"><a class="nav-link" href="<?= base_url('about.html'); ?>">ABOUT US</a></li>
                        <li class="nav-item <?= isset($servicecls) ? $servicecls : ''; ?>"><a class="nav-link" href="<?= base_url('services.html'); ?>">SERVICE</a></li>
                        <li class="nav-item <?= isset($portfcls) ? $portfcls : ''; ?>"><a class="nav-link" href="<?= base_url('projects.html'); ?>">WORKS</a></li>
                        <li class="nav-item <?= isset($contactcls) ? $contactcls : ''; ?>"><a class="nav-link" href="<?= base_url('contact.html'); ?>">CONTACT US</a></li>
                        <li class="nav-item"><a class="nav-link" href="https://salviaemporium.com" target="_blank"><span class="badge badge-secondary mybadge">SHOP</span></a></li>
                    </ul>
                </div>
            </nav>
            <div class="left-info-bar">
                <div class="number">CALL US: 01712-741844</div>
                <ul class="social-icon-one">
                    <li><a href="#" target="_blank"><span class="fa fa-facebook-square"></span></a></li>
                    <li><a href="#" target="_blank"><span class="fa fa-linkedin-square"></span></a></li>
                    <li><a href="#" target="_blank"><span class="fa fa-twitter-square"></span></a></li>
                    <li><a href="#" target="_blank"><span class="fa fa-google-plus-square"></span></a></li>
                </ul>
            </div>
            <?php $this->load->view($view); ?>
            <footer class="main-footer">
                <div class="auto-container">
                    <div class="widgets-section">
                        <div class="clearfix row">
                            <div class="big-column col-md-7 col-sm-12 col-xs-12">
                                <div class="row clearfix">
                                    <div class="footer-column col-md-4 col-sm-4 col-xs-12">
                                        <div class="footer-widget logo-widget">
                                            <div class="logo">
                                                <a href="<?= base_url('index.html'); ?>" class="footer_logo"><img src="<?= base_url('assets/images/logo_sp.png'); ?>" alt="Footer" /></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer-column col-md-8 col-sm-8 col-xs-12">
                                        <div class="footer-widget address-widget">
                                            <h2>Our Address</h2>
                                            <ul>
                                                <li>24/1, Nalbhog Main Road (Rupayan City Gate), Uttara-12, Dhaka-1230</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="big-column col-md-5 col-sm-12 col-xs-12">
                                <div class="row clearfix">
                                    <div class="footer-column col-md-12 col-sm-12 col-xs-12">
                                        <div class="footer-widget links-widget">
                                            <h2>Copyright</h2>
                                            <div class="copyright">Copyright &copy; Sobujpata Group - <?= date('Y'); ?>. All Rights Reserved. <br><span class="murshid">Developed By - <a href="http://murshidraj.me" target="_blank">Murshid</a></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>
        <!--Start Revolution Slider-->
        <script src="<?= base_url('assets/plugins/revolution/js/jquery.themepunch.revolution.min.js'); ?>"></script>
        <script src="<?= base_url('assets/plugins/revolution/js/jquery.themepunch.tools.min.js'); ?>"></script>
        <script src="<?= base_url('assets/plugins/revolution/js/extensions/revolution.extension.actions.min.js'); ?>"></script>
        <script src="<?= base_url('assets/plugins/revolution/js/extensions/revolution.extension.carousel.min.js'); ?>"></script>
        <script src="<?= base_url('assets/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js'); ?>"></script>
        <script src="<?= base_url('assets/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js'); ?>"></script>
        <script src="<?= base_url('assets/plugins/revolution/js/extensions/revolution.extension.migration.min.js'); ?>"></script>
        <script src="<?= base_url('assets/plugins/revolution/js/extensions/revolution.extension.navigation.min.js'); ?>"></script>
        <script src="<?= base_url('assets/plugins/revolution/js/extensions/revolution.extension.parallax.min.js'); ?>"></script>
        <script src="<?= base_url('assets/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js'); ?>"></script>
        <script src="<?= base_url('assets/plugins/revolution/js/extensions/revolution.extension.video.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/main-slider-script.js'); ?>"></script>
        <!--End Revolution Slider-->
        <script src="<?= base_url('assets/js/jquery.fancybox.js'); ?>"></script>
        <script src="<?= base_url('assets/js/owl.js'); ?>"></script>
        <script src="<?= base_url('assets/js/wow.js'); ?>"></script>
        <script src="<?= base_url('assets/js/isotope.js'); ?>"></script>
        <script src="<?= base_url('assets/js/mixitup.js'); ?>"></script>
        <script src="<?= base_url('assets/js/appear.js'); ?>"></script>
        <script src="<?= base_url('assets/js/script.js'); ?>"></script>
        <script src="http://maps.google.com/maps/api/js?key=AIzaSyBKS14AnP3HCIVlUpPKtGp7CbYuMtcXE2o"></script>
        <script src="<?= base_url('assets/js/map-script.js'); ?>"></script>
    </body>
</html>