<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?= isset($title) ? $title : 'IC | Admin' ?></title>
        <link rel="icon" href="<?= base_url('assets/images/favicona.png'); ?>" type="image/x-icon">
        <link rel="stylesheet" href="<?= base_url('assets/css/fontawesome/css/all.min.css') ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.min.css">
        <link rel="stylesheet" href="<?= base_url('assets/css/OverlayScrollbars.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/summernote-bs4.css'); ?>">
        <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <script> var baseurl = '<?= base_url(); ?>';</script>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            <?php $this->load->view('admin/navbar'); ?>
            <?php $this->load->view($view); ?>
            <?php $this->load->view('admin/settings-bar'); ?>
            <footer class="main-footer"><strong>Copyright &copy; <a>Sobujpata Group</a> - <?= date('Y'); ?></strong><div class="float-right d-none d-sm-inline-block"><b>Version: 1.0.1</b></div></footer>
        </div>
        <script src="<?= base_url('assets/js/jquery.overlayScrollbars.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/adminlte.js'); ?>"></script>
        <!--<script src="<?= base_url('assets/js/settings.js'); ?>"></script>-->
        <script src="<?= base_url('assets/js/jquery.mousewheel.js'); ?>"></script>
        <script src="<?= base_url('assets/js/raphael.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/jquery.mapael.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/summernote-bs4.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/html2pdf.min.js'); ?>"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <?php $this->load->view('admin/script'); ?>
    </body>
</html>
