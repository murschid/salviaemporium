<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="<?= base_url('assets/comingsoon/img/favicon.png'); ?>">
        <title><?= $title ? $title : 'Coming | Soon' ?></title>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
        <link href="<?= base_url('assets/css/bootstrap_v4.3.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/css/fontawesome/css/all.min.css') ?>" rel="stylesheet" type="text/css">
        <link href="<?= base_url('assets/comingsoon/css/coming-soon.css'); ?>" rel="stylesheet">
        <script src="<?= base_url('assets/js/jquery.js'); ?>"></script> 
    </head>
    <body>
        <div class="logpreloader"></div>
        <div class="overlay"></div>
        <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop"><source src="<?= base_url('assets/comingsoon/video/bg.mp4'); ?>" type="video/mp4"></video>
        <div class="masthead">
            <div class="masthead-bg"></div>
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 my-auto">
                        <div class="masthead-content text-white py-5 py-md-0">
                            <h1 class="mb-3">Coming Soon!</h1>
                            <p class="mb-5">We're working hard to finish the development of this site. Our targeted launching date is <strong><?= $date ? $date : 'Next Month' ?></strong>! Sign up for updates using the form below!</p>
                            <div class="input-group mb-3 input-group-newsletter">
                                <input type="email" class="form-control" placeholder="username@domain.com" required="">
                                <div class="input-group-append"><button type="submit" class="btn btn-secondary">NOTIFY US</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="social-icons">
            <ul class="list-unstyled text-center mb-0">
                <li class="list-unstyled-item"><a href="http://murshidraj.me" target="_blank"><i class="fab fa-internet-explorer"></i></a></li>
                <li class="list-unstyled-item"><a href="https://facebook.com/lagamhin" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                <li class="list-unstyled-item"><a href="https://www.instagram.com/raj_cse" target="_blank"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
        <script type="text/javascript">
            $(window).on('load', function () {
                $('.logpreloader').fadeOut('slow');
            });
        </script>
    </body>
</html>
