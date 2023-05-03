<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" A WMS helps businesses manage their warehouse operations with greater efficiency and accuracy. Keep track of data, and save time with real-time visibility. Discover how a WMS can benefit your business.">
    <meta name="keywords" content="wms, saratec, system">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?= base_url('assets/images/favicon.png'); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.png'); ?>" type="image/x-icon">
    <title>SARATEC | LOGIN</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/font-awesome.css'); ?>">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/vendors/icofont.css'); ?>">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/vendors/themify.css'); ?>">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/vendors/flag-icon.css'); ?>">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/vendors/feather-icon.css'); ?>">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/vendors/bootstrap.css'); ?>">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>">
    <link id="color" rel="stylesheet" href="<?= base_url('assets/css/color-1.css'); ?>" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/responsive.css'); ?>">
</head>

<body>
    <!-- login page start-->
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card login-dark">
                    <div>
                        <div><a class="logo" href="index.html"><img style="max-width: 150px;" class="img-fluid for-light" src="<?= base_url('assets/images/logo/logo.png') ?>" alt="looginpage"><img style="max-width: 200px;" class="img-fluid for-dark" src="<?= base_url('assets/images/logo/logo_dark.png') ?>" alt="looginpage"></a></div>
                        <div class="login-main">
                            <form action="<?= base_url('authenticate') ?>" method="POST">
                                <h4>Sign in to account</h4>
                                <p>Enter your email & password to login</p>
                                <div class="form-group">
                                    <label class="col-form-label">Email Address</label>
                                    <input name="email" class="form-control" type="email" required="" placeholder="Test@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input name="password" class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                                        <div class="show-hide"><span class="show"> </span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- latest jquery-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Bootstrap js-->
        <script src="<?= base_url('assets/js/bootstrap/bootstrap.bundle.min.js') ?>"></script>
        <!-- feather icon js-->
        <script src="<?= base_url('assets/js/icons/feather-icon/feather.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/icons/feather-icon/feather-icon.js') ?>"></script>
        <!-- scrollbar js-->
        <!-- Sidebar jquery-->
        <script src="<?= base_url('assets/js/config.js') ?>"></script>
        <!-- Plugins JS start-->
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="<?= base_url('assets/js/script.js') ?>"></script>
        <!-- Plugin used-->
    </div>
</body>

</html>