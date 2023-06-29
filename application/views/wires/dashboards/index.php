<div class="container-fluid">
    <div class="row">
        <?php
        $this->load->view('wires/dashboards/header', compact('wire'))
        ?>
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
                            <h6 class="mb-0">Wire OD</h6><span class="f-light"><?= $wire['size'] ?> "</span>
                        </div>
                        <div>
                            <h6 class="mb-0">Length</h6><span class="f-light"><?= number_format($wire['initial_length'], 2) ?></span>
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
                        <h4><?= number_format($dashboard['average_tension']) ?></h4><span class="font-primary f-12 f-w-500"><span>lbs</span></span>
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
                            <h6 class="mb-0">Total Running</h6><span class="f-light">hours</span>
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
                            <h6 class="mb-0">Total Running</h6><span class="f-light">days</span>
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
            <div class="card">
                <div class="card-header card-no-border">
                    <div class="header-top">
                        <h5>Wire on Drum</h5>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="recent-chart">
                                <div id="wire-on-drum"></div>
                            </div>
                        </div>
                        <div class="col-sm-12 row">
                            <div class="balance-profile">
                                <ul>
                                    <li>
                                        <div class="balance-item success">
                                            <div class="balance-icon-wrap">
                                                <i data-feather="hash"></i>
                                            </div>
                                            <div>
                                                <span class="f-12 f-light">Wire Balance(ft)</span>
                                                <h5><?= number_format($dashboard['wire_balances']) ?></h5>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="balance-item success">
                                            <div class="balance-icon-wrap">
                                                <i data-feather="clock"></i>
                                            </div>
                                            <div>
                                                <span class="f-12 f-light">Not Expose to Well Cond.</span>
                                                <h5><?= number_format($dashboard['not_exposed_to_well_cond']) ?> hours</h5>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
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
        <div class="col-sm-12">
            <div class=" card">
                <div class="card-header">
                    <h5>Cut Off (ft) & Max Pull (lbs) & Number of Jar</h5>
                </div>
                <div class="card-body">
                    <div id="cut-off-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>On-site OD Check </h5>
                </div>
                <div class="card-body">
                    <div id="onsite-od-check-chart"></div>
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
                        <table class="trials-datatable" id="data-source-1" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Create At</th>
                                    <th>Operator</th>
                                    <th>Supervisor</th>
                                    <th>Client</th>
                                    <th>Package</th>
                                    <th>Drum</th>
                                    <th>Job Type</th>
                                    <th>Wrap Test</th>
                                    <th>Pull Test</th>
                                    <th>X(inches)</th>
                                    <th>Y(inches)</th>
                                    <th>Cut Off</th>
                                    <th>Well Name</th>
                                    <th>Jar Number</th>
                                    <th>Max Pull</th>
                                    <th>Max Depth</th>
                                    <th>Duration(s)</th>
                                    <th>Smart Monitor</th>
                                    <th>Remarks</th>
                                    <th>Job Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-none filter-column-group">
    <div class="btn-group custom-filter">
        <button class="btn btn-outline-light dropdown-toggle txt-dark" type="button" data-bs-toggle="dropdown" aria-expanded="true">Filter</button>
        <div class="dropdown-menu dropdown-block text-start" data-popper-placement="bottom-start" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(-200px, 37px); font-size: 14px; width: 500px">
            <div class="row">
                <div class="col-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column checkbox-solid-dark" type="checkbox" checked value="1" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Date</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input checked class="form-check-input mt-0 filter-column" type="checkbox" value="2" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Operator</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="3" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Supervisor</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="4" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Client</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="5" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Package</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input checked class="form-check-input mt-0 filter-column" type="checkbox" value="6" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Drum</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input checked class="form-check-input mt-0 filter-column" type="checkbox" value="7" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Type of Job</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="8" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Wrap Test</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="9" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Pull Test</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="10" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">X inches</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="11" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Y inches</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input checked class="form-check-input mt-0 filter-column" type="checkbox" value="12" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Cut Off</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input checked class="form-check-input mt-0 filter-column" type="checkbox" value="13" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Well Name</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input checked class="form-check-input mt-0 filter-column" type="checkbox" value="14" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Jar Number</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input checked class="form-check-input mt-0 filter-column" type="checkbox" value="15" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Max Pull</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="16" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Max Depth</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="17" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Duration</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="18" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Smart Monitor</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input checked class="form-check-input mt-0 filter-column" type="checkbox" value="19" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Remarks</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="20" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Job Status</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>