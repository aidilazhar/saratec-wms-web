<style>
    .smart-monitor-label.label-disabled {
        display: none;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?= base_url("wires/" . encode($wire_id) . "/trials/store") ?>" method="POST" novalidate enctype="multipart/form-data" class="trial-form">
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $page['subtitle'] ?></h5>
                            </div>
                            <div class="card-body row">
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Date</label>
                                    <input name="issued_at" class="form-control digits" type="date" value="<?= date('Y-m-d') ?>">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Operator</label>
                                    <select <?php if (auth()->role_id == ROLE_OPERATOR) {
                                                echo 'disabled';
                                            } ?> required name="operator_id" class="form-select digits">
                                        <?php
                                        foreach ($operators as $operator) {
                                        ?>
                                            <option <?php if ($operator['id'] == auth()->id) {
                                                        echo 'selected';
                                                    } ?> value="<?= $operator['id'] ?>"><?= $operator['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Supervisor</label>
                                    <input required name="supervisor_name" value="<?= $last_supervisor ?>" class="form-control" type="text" placeholder="Enter supervisor">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Client</label>
                                    <select required name="client_id" class="form-select digits">
                                        <?php
                                        foreach ($clients as $client) {
                                        ?>
                                            <option <?php if ($client['id'] == $wire['client_id']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $client['id'] ?>"><?= $client['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Package</label>
                                    <select required name="package_id" class="form-select digits">
                                        <?php
                                        foreach ($packages as $package) {
                                        ?>
                                            <option value="<?= $package['id'] ?>"><?= $package['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Drum No</label>
                                    <select required name="drum_id" class="form-select digits">
                                        <?php
                                        foreach ($drums as $drum) {
                                        ?>
                                            <option value="<?= $drum['id'] ?>"><?= $drum['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Wrap Test</label>
                                    <select required name="wrap_test" class="form-control">
                                        <option>N/A</option>
                                        <option>Pass</option>
                                        <option>Acceptable Crack</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Pull Test Value</label>
                                    <select required name="pull_test" class="form-control">
                                        <option>N/A</option>
                                        <option>0 - 999 lbs</option>
                                        <option>1,000 - 1,999 lbs</option>
                                        <option>2,000 - 2,999 lbs</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">X (inches)</label>
                                    <input required name="x_inch" value="" class="form-control" type="text" placeholder="Enter X (in)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Y (inches)</label>
                                    <input required name="y_inch" value="" class="form-control" type="text" placeholder="Enter Y (in)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Cut Off (ft)</label>
                                    <input required name="cut_off" value="" class="form-control" type="text" placeholder="Enter Cut Off (ft)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Well Name</label>
                                    <div class="input-group">
                                        <input required name="well_prefix" class="typeahead form-control well-name-prefix" type="text">
                                        <span class="input-group-text"> - </span>
                                        <input required name="well_postfix" class="typeahead form-control well-name-postfix" type="text">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <hr>
                                    <div class="w-100 text-right">
                                        <button type="button" class="btn btn-primary mb-3 add-entry" style="float: right;">
                                            Add
                                        </button>
                                    </div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-center bg-light">
                                                <th style="width: 15%;">Type of Job</th>
                                                <th style="width: 10%;">No of Jar</th>
                                                <th style="width: 10%;">Max Pull (lbs)</th>
                                                <th style="width: 10%;">Max Depth (ft)</th>
                                                <th style="width: 10%;">Duration (mins)</th>
                                                <th style="width: 15%;">Smart Monitor Logged</th>
                                                <th style="width: 15%;">Special Note</th>
                                                <th style="width: 10%;">Job Status</th>
                                                <th style="width: 5%;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="entry-body">
                                            <tr class="text-center entry-row">
                                                <td>
                                                    <select required name="job_type_id[]" class="form-select digits">
                                                        <?php
                                                        foreach ($job_types as $job_type) {
                                                        ?>
                                                            <option value="<?= $job_type['id'] ?>"><?= $job_type['name'] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input required name="jar_number[]" value="" class="form-control" type="text">
                                                </td>
                                                <td>
                                                    <input required name="max_pull[]" value="" class="form-control" type="text">
                                                </td>
                                                <td>
                                                    <input required name="max_depth[]" value="" class="form-control" type="text">
                                                </td>
                                                <td>
                                                    <input required name="duration[]" value="" class="form-control" type="number">
                                                </td>
                                                <td class="sm-csv">
                                                    <div class="media-body switch-md">
                                                        <label class="switch">
                                                            <input name="smart_monitor[]" type="checkbox" class="smart-monitor"><span class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                    <button for="smart-monitor-csv" disabled class="btn btn-light smart-monitor-button" type="button" value="Browse...">
                                                        Upload
                                                    </button>
                                                    <input required id="smart-monitor-csv" disabled name="smart_monitor_csv[]" accept=".xls, .xlsx, application/vnd.ms-excel" class="form-control smart-monitor-csv" type="file" style="display: none;" />
                                                    <small class="csv-name d-block"></small>
                                                    <input name="smart_monitor_hidden[]" type="hidden" class="smart-monitor-hidden" value="0">
                                                </td>
                                                <td>
                                                    <textarea name="remarks[]" class="form-control" rows="5" cols="3"></textarea>
                                                </td>
                                                <td>
                                                    <select required name="job_status[]" class="form-select digits">
                                                        <option value="Complete">Complete</option>
                                                        <option value="Rerun">To Rerun</option>
                                                    </select>
                                                </td>
                                                <td>

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="<?= base_url("wires/" . encode($wire_id)) . '/trials' ?>">
                                    <button type="button" class="btn btn-secondary">Cancel</button>
                                </a>
                                <button type="button" class="btn btn-primary submit-button">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('trials/create-hidden.php');
?>