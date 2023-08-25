<!DOCTYPE html>
<html lang="en">
<?php
if ($page['subtitle'] != null) {
    $page_title = strtoupper(SYSTEM_NAME . " | " . $page['title'] . ' - ' . $page['subtitle']);
} else {
    $page_title = strtoupper(SYSTEM_NAME . " | " . $page['title']);
}
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=" A WMS helps businesses manage their warehouse operations with greater efficiency and accuracy. Keep track of data, and save time with real-time visibility. Discover how a WMS can benefit your business.">
    <meta name="keywords" content="wms, saratec, system">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?= base_url("assets/images/favicon.png") ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url("assets/images/favicon.png") ?>" type="image/x-icon">
    <title><?= $page_title ?></title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">

    <?= $this->load->view('master/styles.php', '', TRUE) ?>
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
    <!-- page-wrapper StartMy Currencies-->
    <div class="page-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <?= $this->load->view('master/header', '', true) ?>
        <!-- Page Header Ends-->
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <?= $this->load->view('master/navbar', '', true) ?>
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                <?= $this->load->view('master/title', $page['title'], true) ?>
                <div class="row">
                    <div class="col-12 col-xl-9">
                        <?= $this->load->view($page['view'], '', true) ?>
                    </div>
                    <div class="row d-none d-xl-block col-3">
                        <?= $this->load->view('master/profile.php', '', TRUE) ?>
                    </div>
                </div>
            </div>
            <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
        <?= $this->load->view('master/footer', '', true) ?>
    </div>
    </div>
    <?= $this->load->view('master/scripts.php', '', true) ?>
</body>

</html>