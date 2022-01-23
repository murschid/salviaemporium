<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin | Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?= base_url('assets/css/fontawesome/css/all.min.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/css/adminlte.css'); ?>">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <link rel="icon" href="<?= base_url('assets/images/favicona.png'); ?>" type="image/x-icon">
        <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    </head>
    <body class="hold-transition login-page">
        <div class="logpreloader"></div>
        <div class="login-box">
            <div class="login-logo"><b>Admin </b>Login</div>
            <div class="card">
                <div class="card-body login-card-body">
                    <?php $errors = $this->session->flashdata('errors'); ?>
                    <?php if (isset($errors)): ?>
                        <div class="alert alert-danger"><?= $errors; ?></div>
                    <?php endif; ?>
                    <p class="login-box-msg">Sign in to start your session</p>
                    <?= form_open('auth/signin'); ?>
                    <div class="input-group mb-3">
                        <input type="email" name="user" class="form-control" minlength="9" maxlength="30" placeholder="email@gmail.com" required="">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" minlength="6" maxlength="20" placeholder="******" required="">
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember">
                                <label for="remember">&nbsp;Remember Me</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-sm btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(window).on('load', function () {
                $('.logpreloader').fadeOut('slow');
            });
        </script>
    </body>
</html>
