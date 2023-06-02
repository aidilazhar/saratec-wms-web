<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 project-list">
            <div class="card bg-dark">
                <div class="row">
                    <ul class="nav nav-tabs border-tab d-flex justify-content-around" id="top-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link txt-primary text-center" href="<?= base_url("wires/dashboard/" . encode($wire['id'])) ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link txt-white text-center" href="<?= base_url("wires/dashboard/material-certifications/" . encode($wire['id'])) ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">Material Certifications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link txt-white text-center" href="<?= base_url("wires/dashboard/other-reports/" . encode($wire['id'])) ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">Inspection and Other Reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link txt-white text-center" href="<?= base_url("wires/dashboard/third-party-data/" . encode($wire['id'])) ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">3<sup>rd </sup>&nbsp;Party Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link txt-white text-center" href="<?= base_url("wires/dashboard/tech-sheets/" . encode($wire['id'])) ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">Eddy Current</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card course-box widget-course">
                <div class="card-body">
                    <div class="d-flex justify-content-around">
                        <div>
                            <h6 class="mb-0">Wire ID: </h6><span class="f-light"><?= $wire['name'] ?></span>
                        </div>
                        <div>
                            <h6 class="mb-0">Brand</h6><span class="f-light"><?= $wire['brand'] ?></span>
                        </div>
                        <div>
                            <h6 class="mb-0">Wire OD</h6><span class="f-light"><?= $wire['size'] ?></span>
                        </div>
                        <div>
                            <h6 class="mb-0">Length</h6><span class="f-light"><?= $wire['initial_length'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card small-widget">
                <div class="card-body primary">
                    <span class="">Current Cut-Off Rate</span>
                    <small class="d-block f-light">Exclude Spooling</small>
                    <div class="d-flex align-items-end gap-1">
                        <h4><?= number_format($dashboard['current_cut_off_rate'], 2) ?></h4><span class="font-primary f-12 f-w-500"><span>FT/Run</span></span>
                    </div>
                    <div class="bg-gradient">
                        <i style="font-size: 30px; font-weight: 100;" class="icon-pulse"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card small-widget">
                <div class="card-body warning">
                    <span class="">Average Run Duration</span>
                    <small class="d-block f-light">Exclude Spooling</small>
                    <div class="d-flex align-items-end gap-1">
                        <h4><?= number_format($dashboard['average_run_duration'], 2) ?></h4><span class="font-primary f-12 f-w-500"><span>Hour/Run</span></span>
                    </div>
                    <div class="bg-gradient">
                        <i style="font-size: 30px; font-weight: 100;" class="icon-timer"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card small-widget">
                <div class="card-body secondary">
                    <span class="">Average Tension</span>
                    <small class="d-block f-light">Exclude Spooling</small>
                    <div class="d-flex align-items-end gap-1">
                        <h4><?= number_format($dashboard['average_tension'], 2) ?></h4><span class="font-primary f-12 f-w-500"><span>lbs</span></span>
                    </div>
                    <div class="bg-gradient">
                        <i style="font-size: 30px; font-weight: 100;" class="icon-signal"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card small-widget">
                <div class="card-body success">
                    <span class="">% of Max Tension Applied</span>
                    <small class="d-block f-light">exceeds 1000lbs</small>
                    <div class="d-flex align-items-end gap-1">
                        <h4><?= $dashboard['max_tension_applied'] ?></h4><span class="font-primary f-12 f-w-500"><span>%</span></span>
                    </div>
                    <div class="bg-gradient">
                        <i style="font-size: 30px; font-weight: 100;" class="icon-dashboard"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card course-box widget-course">
                <div class="card-body">
                    <div class="course-widget">
                        <div class="course-icon warning">
                            <h4 class="mb-0"><?= $dashboard['total_number_run'] ?></h4>
                        </div>
                        <div>
                            <h6 class="mb-0">Total number run</h6><span class="f-light">Exclude spooling</span>
                        </div>
                    </div>
                </div>
                <ul class="square-group">
                    <li class="square-1 warning"></li>
                    <li class="square-1 primary"></li>
                    <li class="square-2 warning1"></li>
                    <li class="square-3 danger"></li>
                    <li class="square-4 light"></li>
                    <li class="square-5 warning"></li>
                    <li class="square-6 success"></li>
                    <li class="square-7 success"></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card course-box widget-course">
                <div class="card-body">
                    <div class="course-widget">
                        <div class="course-icon warning">
                            <i style="font-size: 30px; font-weight: 100; fill: none" data-feather="users"></i>
                        </div>
                        <div>
                            <li class="d-flex">
                                <div>
                                    <?php
                                    $names = '';
                                    foreach ($clients as $key => $client) {
                                        $names .= $client['name'] . ', ';
                                    }
                                    $names = substr($names, 0, -1);
                                    ?>
                                    <h6 class="mb-0">Clients</h6><span class="f-light"><?= $names ?></span>
                                </div>
                            </li>
                        </div>
                    </div>
                </div>
                <ul class="square-group">
                    <li class="square-1 warning"></li>
                    <li class="square-1 primary"></li>
                    <li class="square-2 warning1"></li>
                    <li class="square-3 danger"></li>
                    <li class="square-4 light"></li>
                    <li class="square-5 warning"></li>
                    <li class="square-6 success"></li>
                    <li class="square-7 success"></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card course-box widget-course">
                <div class="card-body d-flex justify-content-between">
                    <div class="course-widget">
                        <div class="course-icon warning">
                            <h4 class="mb-0"><?= $dashboard['total_running_number_hours'] ?></h4>
                        </div>
                        <div>
                            <h6 class="mb-0">Total running number</h6><span class="f-light">hours</span>
                        </div>
                    </div>
                    <div>
                        <h1 style="font-weight: 100;">
                            /
                        </h1>
                    </div>
                    <div class="course-widget">
                        <div class="course-icon warning">
                            <h4 class="mb-0"><?= $dashboard['total_running_number_days'] ?></h4>
                        </div>
                        <div>
                            <h6 class="mb-0">Total running number</h6><span class="f-light">days</span>
                        </div>
                    </div>
                </div>
                <ul class="square-group">
                    <li class="square-1 warning"></li>
                    <li class="square-1 primary"></li>
                    <li class="square-2 warning1"></li>
                    <li class="square-3 danger"></li>
                    <li class="square-4 light"></li>
                    <li class="square-5 warning"></li>
                    <li class="square-6 success"></li>
                    <li class="square-7 success"></li>
                </ul>
            </div>
        </div>
        <div class="col-6">
            <div class="card height-equal">
                <div class="card-header card-no-border">
                    <div class="header-top">
                        <h5>Wire on Drum</h5>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="recent-chart">
                                <div id="wire-on-drum"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 row">
                            <div class="col-sm-12">
                                <div class=" light-card balance-card widget-hover">
                                    <div class="svg-box">
                                        <i class="icon-ruler-alt-2" style="font-size: 1.5rem"></i>
                                    </div>
                                    <div> <span class="f-light">Wire Balance (ft)</span>
                                        <h6 class="mt-1 mb-0"><?= $dashboard['wire_balances'] ?></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="light-card balance-card widget-hover">
                                    <div class="svg-box">
                                        <i class="icon-ruler-alt" style="font-size: 1.5rem"></i>
                                    </div>
                                    <div> <span class="f-light">Not Expose to Well Cond.</span>
                                        <h6 class="mt-1 mb-0"><?= $dashboard['not_exposed_to_well_cond'] ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card height-equal">
                <div class="card-header card-no-border">
                    <div class="header-top">
                        <h5 class="m-0">Well Name</h5>
                    </div>
                </div>
                <div class="card-body pt-0 campaign-table">
                    <div class="recent-table table-responsive currency-table">
                        <table class="table well-name">
                            <thead>
                                <tr>
                                    <th class="f-light">Well Name</th>
                                    <th class="f-light"># of Run</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($wells as $well) {
                                ?>
                                    <tr>
                                        <td>
                                            <?= $well['name'] ?>
                                        </td>
                                        <td><?= $well['total'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Type of Jobs</h5>
                </div>
                <div class="card-body" style="padding-top: 0px">
                    <div id="type-of-jobs"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class=" card">
                <div class="card-header">
                    <h5>Cut Off(ft)</h5>
                </div>
                <div class="card-body">
                    <div id="cut-off-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class=" card">
                <div class="card-header">
                    <h5>Max Pull(lbs)</h5>
                </div>
                <div class="card-body">
                    <div id="max-pull-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class=" card">
                <div class="card-header">
                    <h5>Number of Jar</h5>
                </div>
                <div class="card-body">
                    <div id="jar-number-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Laser OD History 1</h5>
                    <span>New wire - Completed on 24 April 2023</span>
                </div>
                <div class="card-body">
                    <div id="laser-od-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Latest Data Entries</h5>
                </div>
                <div class="card-body">
                    <div class="table table-responsive currency-table">
                        <table class="data-table" id="data-source-1" style="width:100%">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Date and Time</td>
                                    <td>Job Date</td>
                                    <td>Operator</td>
                                    <td>Drum Number</td>
                                    <td>Type of Job</td>
                                    <td>Well Name</td>
                                    <td>Cut off(ft)</td>
                                    <td>Max Pull(lbs)</td>
                                    <td>Number of Jar</td>
                                    <td>Special Note</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($trials as $key => $trial) {
                                ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= date('d M Y, h:i A') ?></td>
                                        <td><?= date('d M Y') ?></td>
                                        <td><?= $trial['operator_name'] ?></td>
                                        <td><?= $trial['drum_name'] ?></td>
                                        <td><?= $trial['job_type_name'] ?></td>
                                        <td><?= $trial['well_name'] ?></td>
                                        <td><?= $trial['cut_off'] ?></td>
                                        <td><?= $trial['max_pull'] ?></td>
                                        <td><?= $trial['jar_number'] ?></td>
                                        <td><?= $trial['remarks'] ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>