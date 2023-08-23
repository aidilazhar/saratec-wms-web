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
    <div class="page-wrapper compact-sidebar compact-small material-icon" id="pageWrapper">
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
                        <div class="col-12">
                            <div class="card social-profile">
                                <div class="card-body">
                                    <div class="inbox-user mb-3 text-center">
                                        <div class="rounded-border">
                                            <img class="social-img" src="https://ui-avatars.com/api/?name=<?= auth()->name ?>&size=35&bold=true" alt="user">
                                        </div>
                                        <div>
                                            <h5 class="mb-1 d-block">
                                                <a href="social-app.html"><?= auth()->name ?></a>
                                            </h5>
                                            <span class="f-light"><?= auth()->roles['name'] ?></span>
                                        </div>
                                    </div>
                                    <!-- <div class="social-img-wrap">
                                        <div class="social-img"><img src="https://ui-avatars.com/api/?name=<?= auth()->name ?>&size=35&bold=true" alt="profile"></div>
                                    </div>
                                    <div class="social-details">
                                        <h5 class="mb-1"><a href="social-app.html"><?= auth()->name ?></a></h5><span class="f-light"><?= auth()->roles['name'] ?></span>
                                    </div> -->
                                    <hr>
                                    <?php
                                    $profile = profile();
                                    $shift = $profile['shift'];
                                    $activities = $profile['activities'];
                                    ?>
                                    <div style="text-align: left">
                                        <?php
                                        if (!empty($shift)) {
                                        ?>
                                            <span class="f-w-600 mb-2 d-block">Assignment:</span>
                                            <p>
                                                <b>Job #:</b> Pkg #2<br>
                                                <b>Shift:</b> <?= ucwords($shift['shift']) ?><br>
                                                <b>Operator:</b> <?= $shift['operator_id_data']['name'] ?><br>
                                                <b>Assistance 1:</b> <?= $shift['assistant1_id_data']['name'] ?><br>
                                                <b>Assistance 2:</b> <?= $shift['assistant2_id_data']['name'] ?><br>
                                                <b>Assistance 3:</b> <?= $shift['assistant3_id_data']['name'] ?><br>
                                                <b>Client:</b> <?= $shift['client']['name'] ?><br>
                                                <b>Client’s Rep:</b> <?= $shift['client']['representative'] ?>

                                            </p>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if (isset($activities[0])) {
                                        ?>
                                            <span class="f-w-600 mb-2 d-block">Latest activity:</span>
                                            <p>
                                                <?= date('d M Y, h:i A', strtotime($activities[0]['datetime'])) ?><br>
                                                <b> Type of job:</b> <?= $activities[0]['job_type_name'] ?><br>
                                                <b> Well:</b> <?= $activities[0]['well_name'] ?><br>
                                                <b> Status:</b> <?= $activities[0]['status'] ?>
                                            </p>
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if (isset($activities[1])) {
                                        ?>
                                            <span class="f-w-600 mb-2 d-block">Previous activity:</span>
                                            <p>
                                                <?= date('d M Y, h:i A', strtotime($activities[1]['datetime'])) ?><br>
                                                <b> Type of job:</b> <?= $activities[1]['job_type_name'] ?><br>
                                                <b> Well:</b> <?= $activities[1]['well_name'] ?><br>
                                                <b> Status:</b> <?= $activities[1]['status'] ?>
                                            </p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $broadcasts = broadcasts();
                        ?>
                        <div class="col-12 notification">
                            <div class="card">
                                <div class="card-body dark-timeline" style="height: 300px;">
                                    <?php
                                    if (count($broadcasts) > 0) {
                                    ?>
                                        <ul class="vertical-scroll" style="height: 100%">
                                            <?php foreach (broadcasts() as $key => $broadcast) {
                                            ?>
                                                <li class="d-flex">
                                                    <div class="activity-dot-primary"></div>
                                                    <div class="w-100 ms-3">
                                                        <p class="d-flex justify-content-between mb-2"><span class="date-content light-background"><?= date('d M Y h:i A', strtotime($broadcast['created_at'])) ?></span></p>
                                                        <p class="f-light"><?= $broadcast['message'] ?></p>
                                                    </div>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    <?php
                                    } else {
                                    ?>
                                        <p style="text-align: center">No message found</p>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
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