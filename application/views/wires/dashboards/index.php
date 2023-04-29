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
                            <a class="nav-link txt-white text-center" href="<?= base_url("wires/dashboard/tech-sheets/" . encode($wire['id'])) ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">Tech Sheet</a>
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
                            <h6 class="mb-0">Wire ID: </h6><span class="f-light">CWR-1278</span>
                        </div>
                        <div>
                            <h6 class="mb-0">Brand</h6><span class="f-light">SUPA75</span>
                        </div>
                        <div>
                            <h6 class="mb-0">Wire OD</h6><span class="f-light">0.108"</span>
                        </div>
                        <div>
                            <h6 class="mb-0">Length</h6><span class="f-light">25145 FT (New)</span>
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
        <div class="col-sm-6">
            <div class="card course-box widget-course">
                <div class="card-body">
                    <div class="course-widget">
                        <div class="course-icon warning">
                            <h4 class="mb-0">5</h4>
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
        <div class="col-sm-6">
            <div class="card course-box widget-course">
                <div class="card-body d-flex justify-content-between">
                    <div class="course-widget">
                        <div class="course-icon warning">
                            <h4 class="mb-0">3</h4>
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
                            <h4 class="mb-0">0</h4>
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
                                <div id="recentchart"></div>
                            </div>
                        </div>
                        <div class="col-sm-6 row">
                            <div class="col-sm-12">
                                <div class=" light-card balance-card widget-hover">
                                    <div class="svg-box">
                                        <i class="icon-ruler-alt-2" style="font-size: 1.5rem"></i>
                                    </div>
                                    <div> <span class="f-light">Wire Balance (ft)</span>
                                        <h6 class="mt-1 mb-0">23, 075</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="light-card balance-card widget-hover">
                                    <div class="svg-box">
                                        <i class="icon-ruler-alt" style="font-size: 1.5rem"></i>
                                    </div>
                                    <div> <span class="f-light">X(in)</span>
                                        <h6 class="mt-1 mb-0">0.11</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card height-equal">
                <div class="card-header card-no-border">
                    <div class="header-top">
                        <h5 class="m-0">Clients</h5>
                    </div>
                </div>
                <div class="card-body pt-0 campaign-table">
                    <div class="recent-table table-responsive currency-table">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="border-icon facebook">
                                        <div>
                                            <img src="https://ui-avatars.com/api/?name=VE&bold=true&size=30" alt="">
                                        </div>
                                    </td>
                                    <td>VERTIGO</td>
                                </tr>
                                <tr>
                                    <td class="border-icon facebook">
                                        <div>
                                            <img src="https://ui-avatars.com/api/?name=EM&bold=true&size=30" alt="">
                                        </div>
                                    </td>
                                    <td>EMEPMI</td>
                                </tr>
                                <tr>
                                    <td class="border-icon facebook">
                                        <div>
                                            <img src="https://ui-avatars.com/api/?name=SH&bold=true&size=30" alt="">
                                        </div>
                                    </td>
                                    <td>SHELL</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card height-equal">
                <div class="card-header card-no-border">
                    <div class="header-top">
                        <h5 class="m-0">Well Name</h5>
                    </div>
                </div>
                <div class="card-body pt-0 campaign-table">
                    <div class="recent-table table-responsive currency-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="f-light">Well Name</th>
                                    <th class="f-light"># of Run</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Testing 1
                                    </td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>
                                        Testing 2
                                    </td>
                                    <td>75</td>
                                </tr>
                                <tr>
                                    <td>
                                        Testing 3
                                    </td>
                                    <td>52</td>
                                </tr>
                                <tr>
                                    <td>
                                        Testing 4
                                    </td>
                                    <td>21</td>
                                </tr>
                                <tr>
                                    <td>
                                        Testing 5
                                    </td>
                                    <td>42</td>
                                </tr>
                                <tr>
                                    <td>
                                        Testing 6
                                    </td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>
                                        Testing 7
                                    </td>
                                    <td>2</td>
                                </tr>
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
                <div class="card-body">
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
                    <div class="table table-responsive currency-table">
                        <table class="table">
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
                                for ($i = 0; $i < 5; $i++) {
                                ?>
                                    <tr>
                                        <td><?= $i + 1 ?></td>
                                        <td><?= date('d M Y, h:i A') ?></td>
                                        <td><?= date('d M Y') ?></td>
                                        <td><?= $this->operators[rand(0, count($this->operators) - 1)]['name'] ?></td>
                                        <td><?= $this->drums[rand(0, count($this->drums) - 1)]['name'] ?></td>
                                        <td><?= $this->job_types[rand(0, count($this->job_types) - 1)]['name'] ?></td>
                                        <td>Tua-14L</td>
                                        <td><?= rand(1, 10) ?></td>
                                        <td><?= rand(1, 10) ?></td>
                                        <td><?= rand(1, 10) ?></td>
                                        <td>-</td>
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
                    <h5>Latest Data Entries</h5>
                </div>
                <div class="card-body">
                    <div class="table table-responsive currency-table">
                        <table class="table">
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
                                for ($i = 0; $i < 10; $i++) {
                                ?>
                                    <tr>
                                        <td><?= $i + 1 ?></td>
                                        <td><?= date('d M Y, h:i A') ?></td>
                                        <td><?= date('d M Y') ?></td>
                                        <td><?= $this->operators[rand(0, count($this->operators) - 1)]['name'] ?></td>
                                        <td><?= $this->drums[rand(0, count($this->drums) - 1)]['name'] ?></td>
                                        <td><?= $this->job_types[rand(0, count($this->job_types) - 1)]['name'] ?></td>
                                        <td>Tua-14L</td>
                                        <td><?= rand(1, 10) ?></td>
                                        <td><?= rand(1, 10) ?></td>
                                        <td><?= rand(1, 10) ?></td>
                                        <td>-</td>
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