<style>
    @media only screen and (max-width: 768px) {
        .small-section>.col-md-6 {
            padding-left: 0;
            padding-right: 0;
        }
    }
</style>

<div class="container-fluid">
    <div class="row">
        <?php
        $this->load->view('wires/dashboards/header', compact('wire'))
        ?>
        <div class="col-lg-12">
            <div class="card course-box widget-course">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 text-center margin-bottom-2">
                            <h6 class="mb-0">Wire ID: </h6><span class="f-light"><?= $wire['name'] ?></span>
                        </div>
                        <div class="col-md-3 col-sm-6 text-center margin-bottom-2">
                            <h6 class="mb-0">Brand</h6><span class="f-light"><?= $wire['brand'] ?></span>
                        </div>
                        <div class="col-md-3 col-sm-6 text-center margin-bottom-2">
                            <h6 class="mb-0">Wire OD</h6><span class="f-light"><?= $wire['size'] ?> "</span>
                        </div>
                        <div class="col-md-3 col-sm-6 text-center margin-bottom-2">
                            <h6 class="mb-0">Length</h6><span class="f-light"><?= number_format($wire['initial_length'], 2) ?> ft</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header card-no-border">
                    <div class="header-top">
                        <h5>Wire on Drum</h5>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="recent-chart mx-auto text-center" style="display: flex; justify-content: center; align-items: center;">
                                <div id="wire-on-drum"></div>
                            </div>
                        </div>
                        <div class="col-md-5 d-block">
                            <div class="light-card balance-card widget-hover mb-3">
                                <div>
                                    <span class="d-block">First Spooling Date</span>
                                    <span class="f-light mt-1 mb-0"><?= $dashboard['first_spooling_date'] ?></span>
                                </div>
                            </div>
                            <div class="light-card balance-card widget-hover mb-3">
                                <div>
                                    <span class="d-block">Drum & Package</span>
                                    <span class="f-light mt-1 mb-0"><?= $wire['drums']['name'] ?>, <?= $wire['packages']['name'] ?></span>
                                </div>
                            </div>
                            <div class="light-card balance-card widget-hover mb-3">
                                <div>
                                    <span class="d-block">Description</span>
                                    <span class="f-light mt-1 mb-0">
                                        Size: <?= number_format($wire['size'], 4) ?>"<br>
                                        <?= $wire['brand'] ?><br>
                                        New Length <?= number_format($wire['initial_length']) ?>ft
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 row mx-auto small-section">
            <div class="col-md-6">
                <div class="card small-widget">
                    <div class="card-body primary">
                        <span class="">Current Cut-Off Rate</span>
                        <small class="d-block f-light">Exclude Spooling</small>
                        <div class="d-flex align-items-end gap-1">
                            <h4><?= number_format($dashboard['current_cut_off_rate'], 2) ?></h4><span class="font-primary f-12 f-w-500"><span>FT/Run</span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card small-widget">
                    <div class="card-body warning">
                        <span class="">Average Run Duration</span>
                        <small class="d-block f-light">Exclude Spooling</small>
                        <div class="d-flex align-items-end gap-1">
                            <h4><?= number_format($dashboard['average_run_duration'], 2) ?></h4><span class="font-primary f-12 f-w-500"><span>Hour/Run</span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card small-widget">
                    <div class="card-body success">
                        <span class="">Total number run</span>
                        <small class="d-block f-light">Exclude spooling</small>
                        <div class="d-flex align-items-end gap-1">
                            <h4><?= $dashboard['total_number_run'] ?></h4></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card small-widget">
                    <div class="card-body secondary">
                        <span class="">Average Tension</span>
                        <small class="d-block f-light">Exclude Spooling</small>
                        <div class="d-flex align-items-end gap-1">
                            <h4><?= number_format($dashboard['average_tension']) ?></h4><span class="font-primary f-12 f-w-500"><span>lbs</span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card small-widget">
                    <div class="card-body success">
                        <span class="">% of Max Tension Applied</span>
                        <small class="d-block f-light">exceeds 1000lbs</small>
                        <div class="d-flex align-items-end gap-1">
                            <h4><?= $dashboard['max_tension_applied'] ?></h4><span class="font-primary f-12 f-w-500"><span>%</span></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card small-widget">
                    <div class="card-body success">
                        <span class="">Total Running</span>
                        <small class="d-block f-light">Exclude spooling</small>
                        <div class="d-flex align-items-end gap-1">
                            <h4><?= $dashboard['total_running_number_hours'] ?></h4><span class="font-primary f-12 f-w-500"><span>hours</span></span>
                            |
                            <h4><?= $dashboard['total_running_number_days'] ?></h4><span class="font-primary f-12 f-w-500"><span>days</span></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header card-no-border">
                    <div class="header-top">
                        <h5 class="m-0">Clients</h5>
                    </div>
                </div>
                <div class="card-body apex-chart">
                    <div id="client-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
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
                                    <th class="f-light">Schematic</th>
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
                                        <td>
                                            <?php
                                            if ($well['schematic']  != '-' && $well['schematic']  != '' && $well['schematic']  != null) {
                                            ?>
                                                <a target="_blank" href="<?= temp_url($well['schematic']) ?>"><i style="color: #FFAA05;" class="icon-files"></i></a>
                                            <?php
                                            } else {
                                                echo "-";
                                            }
                                            ?>
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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>Type of Jobs</h5>
                </div>
                <div class="card-body" style="padding-top: 0px">
                    <div id="type-of-jobs"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class=" card">
                <div class="card-header">
                    <h5>Cut Off (ft) & Max Pull (lbs) & Number of Jar</h5>
                </div>
                <div class="card-body">
                    <div id="cut-off-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5>On-site OD Check </h5>
                </div>
                <div class="card-body">
                    <figure class="highcharts-figure">
                        <div id="container"></div>
                    </figure>
                    <div class="d-inline-block text-center mx-auto w-100">
                        <div class="d-inline-block mx-auto" style="margin-left: 20px; margin-right: 20px; width: 100px">
                            <div class="text-center mx-auto" style="border: none; border-top: 1px dashed black; background-color: #fff; height: 2px; width: 50px; margin-bottom: 3px;">
                            </div>
                            <div class="text-center">Baseline</div>
                        </div>
                        <div class="d-inline-block text-center" style="margin-left: 20px; margin-right: 20px; width: 100px">
                            <div class="text-center mx-auto" style="border: none; border-top: 1px dashed red; background-color: #fff; height: 2px; width: 50px; margin-bottom: 3px;">
                            </div>
                            <div class="text-center">Min Tolerance</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Task Planning</h5>
                </div>
                <div class="card-body">
                    <div class="table table-responsive">
                        <table class="table data-table" id="data-source-1" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Job Status</th>
                                    <th>Report Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($lab_tests as $key => $lab_test) {
                                ?>
                                    <tr>
                                        <th><?= $key + 1 ?></th>
                                        <td><?= date('d M Y', strtotime($lab_test['issued_at'])) ?></td>
                                        <td><?= $lab_test['description'] ?></td>
                                        <td><?= $lab_test['job_status'] ?></td>
                                        <td><?= $lab_test['report_status'] ?></td>
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
        <div class="col-lg-12">
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
                                    <th>Assistant 1</th>
                                    <th>Assistant 2</th>
                                    <th>Assistant 3</th>
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
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column checkbox-solid-dark" type="checkbox" checked value="1" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Date</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input checked class="form-check-input mt-0 filter-column" type="checkbox" value="2" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Operator</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="3" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Assistant 1</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="4" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Assistant 2</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="5" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Assistant 3</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="6" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Supervisor</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="7" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Client</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="8" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Package</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input checked class="form-check-input mt-0 filter-column" type="checkbox" value="9" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Drum</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input checked class="form-check-input mt-0 filter-column" type="checkbox" value="10" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Type of Job</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="11" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Wrap Test</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="12" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Pull Test</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="13" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">X inches</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="14" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Y inches</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input checked class="form-check-input mt-0 filter-column" type="checkbox" value="15" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Cut Off</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input checked class="form-check-input mt-0 filter-column" type="checkbox" value="16" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Well Name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input checked class="form-check-input mt-0 filter-column" type="checkbox" value="17" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Jar Number</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input checked class="form-check-input mt-0 filter-column" type="checkbox" value="18" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Max Pull</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="19" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Max Depth</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="20" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Duration</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="21" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Smart Monitor</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input checked class="form-check-input mt-0 filter-column" type="checkbox" value="22" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Remarks</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group rounded-0 border-0 shadow-none">
                        <div class="input-group-text">
                            <input class="form-check-input mt-0 filter-column" type="checkbox" value="23" aria-label="Checkbox for following text input">
                        </div>
                        <label class="form-check-label mt-2" style="color: black !important;">Job Status</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>