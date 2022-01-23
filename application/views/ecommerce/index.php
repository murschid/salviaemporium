<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= isset($title) ? $title : 'SALVIA | EMPORIUM'?></title>
        <meta name="description" content='<?= isset($description) ? $description : 'Slavia Emporium is a large online shop in Bangladesh. We deliver our product all over the country.'; ?>'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?= base_url('assets/ecommerce/img/favicon.png'); ?>">
        <link href="<?= base_url('assets/ecommerce/css/vendors.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/ecommerce/css/style.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/ecommerce/css/responsive.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/ecommerce/revolution/css/settings.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/ecommerce/revolution/css/navigation.css'); ?>" rel="stylesheet">
        <link href="<?= base_url('assets/ecommerce/revolution/custom-setting.css'); ?>" rel="stylesheet">
        <link href="https://fonts.maateen.me/siyam-rupali/font.css" rel="stylesheet">
        <script src="<?= base_url('assets/ecommerce/js/vendors.js'); ?>"></script>
        <?php if ($this->session->userdata('language') == 'bengali'): ?>
            <style>body, p, a, h1, h2, h3, h4, h5, h6{font-family:'SiyamRupali', Arial, sans-serif !important;}</style>
        <?php endif; ?>
        <script> var baseurl = '<?= base_url(); ?>';</script>
        <script> var loggedid = '<?= $this->session->userdata('customer_auth')['id']; ?>';</script>
    </head>
    <body>
        <?php $this->load->view('ecommerce/modal/toasts'); ?>
        <?php $this->session->flashdata('toast') ? $this->load->view('ecommerce/modal/toast') : ''; ?>
        <?php $this->load->view('ecommerce/navbar'); ?>
        <?php $this->load->view($view); ?>
        <?php $this->load->view('ecommerce/footer'); ?>
        <?php $this->load->view('ecommerce/mobile-menu'); ?>
        <?php $this->load->view('ecommerce/others'); ?>
        <?php $this->load->view('ecommerce/myaccount/myscript'); ?>

        <button class="scroll-top"><i class="fa fa-angle-up"></i></button>
        <script src="<?= base_url('assets/ecommerce/js/active.js'); ?>"></script>
        <script src="<?= base_url('assets/ecommerce/revolution/js/jquery.themepunch.revolution.min.js'); ?>"></script>
        <script src="<?= base_url('assets/ecommerce/revolution/js/jquery.themepunch.tools.min.js'); ?>"></script>
        <script src="<?= base_url('assets/ecommerce/revolution/revolution-active.js'); ?>"></script>
        <script src="<?= base_url('assets/ecommerce/revolution/js/extensions/revolution.extension.kenburn.min.js'); ?>"></script>
        <script src="<?= base_url('assets/ecommerce/revolution/js/extensions/revolution.extension.slideanims.min.js'); ?>"></script>
        <script src="<?= base_url('assets/ecommerce/revolution/js/extensions/revolution.extension.actions.min.js'); ?>"></script>
        <script src="<?= base_url('assets/ecommerce/revolution/js/extensions/revolution.extension.layeranimation.min.js'); ?>"></script>
        <script src="<?= base_url('assets/ecommerce/revolution/js/extensions/revolution.extension.navigation.min.js'); ?>"></script>
        <script src="<?= base_url('assets/ecommerce/revolution/js/extensions/revolution.extension.parallax.min.js'); ?>"></script>
    </body>
</html>