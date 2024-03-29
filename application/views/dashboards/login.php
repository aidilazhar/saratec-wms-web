<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?= asset_url('images/favicon.png'); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= asset_url('images/favicon.png'); ?>" type="image/x-icon">
    <title>SARATEC | LOGIN</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/font-awesome.css") ?>">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/vendors/icofont.css") ?>">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/vendors/themify.css") ?>">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/vendors/flag-icon.css") ?>">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/vendors/feather-icon.css") ?>">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/vendors/bootstrap.css") ?>">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/style.css") ?>">
    <link id="color" rel="stylesheet" href="<?= base_url("assets/css/color-1.css") ?>" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/responsive.css") ?>">
</head>

<body>
    <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="loader-index"> <span></span></div>
        <svg>
            <defs></defs>
            <filter id="goo">
                <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
                <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
            </filter>
        </svg>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
        <div class="container-fluid p-0">
            <!-- Unlock page start-->
            <div class="authentication-main mt-0">
                <div class="row">
                    <div class="col-12">
                        <div class="login-card login-dark">
                            <div>
                                <div><a class="logo" href="<?= base_url($wire_name . '/login') ?>"><img class="img-fluid for-light" src="<?= base_url("assets/images/logo/logo.png") ?>" alt="looginpage"><img class="img-fluid for-dark" src="<?= base_url("assets/images/logo/logo_dark.png") ?>" alt="looginpage"></a></div>
                                <div class="login-main">
                                    <form class="theme-form" method="POST" action="<?= base_url($wire_name . '/unlock') ?>">
                                        <h4>Unlock Dashboard</h4>
                                        <div class="form-group">
                                            <label class="col-form-label">Enter your Password</label>
                                            <div class="form-input position-relative">
                                                <input class="form-control" type="password" name="password" required="" placeholder="*********">
                                                <div class="show-hide"><span class="show"> </span></div>
                                            </div>
                                            <small class="text-muted" for="checkbox1 mb-3">Kindly contact your admin to get password</small>
                                        </div>
                                        <div class="form-group mb-0">
                                            <button class="btn btn-primary btn-block w-100" type="submit">Unlock</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Unlock page end-->
            <!-- page-wrapper Ends-->
            <!-- latest jquery-->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <!-- Bootstrap js-->
            <script src="<?= base_url("assets/js/bootstrap/bootstrap.bundle.min.js") ?>
                ">
            </script>
            <!-- feather icon js-->
            <script src="<?= base_url("assets/js/icons/feather-icon/feather.min.js") ?>
                ">
            </script>
            <script src="<?= base_url("assets/js/icons/feather-icon/feather-icon.js") ?>
                ">
            </script>
            <!-- scrollbar js-->
            <!-- Sidebar jquery-->
            <script src="<?= base_url("assets/js/config.js") ?>
                ">
            </script>
            <!-- Plugins JS start-->
            <!-- Plugins JS Ends-->
            <!-- Theme js-->
            <script src="<?= base_url("assets/js/script.js") ?>
                ">
            </script>
            <!-- Plugin used-->
        </div>
    </div>
</body>

</html>