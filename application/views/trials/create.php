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
                                    <input name="issued_at" class="form-control digits" type="datetime-local" value="<?= date('Y-m-d h:i:s') ?>">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Shift</label>
                                    <select required name="shift" class="form-select shift-options">
                                        <option selected value="day">Day</option>
                                        <option <?php if (!$has_shift_night) {
                                                    echo 'disabled';
                                                } ?> value="night">Night</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Operator</label>
                                    <select disabled <?php if (auth()->role_id == ROLE_OPERATOR) {
                                                            echo 'disabled';
                                                        } ?> required class="form-select digits operator-id">
                                        <option disabled selected value="">--PLEASE SELECT--</option>
                                        <?php
                                        foreach ($operators as $operator) {
                                        ?>
                                            <option <?php if ($operator['id'] == auth()->id) {
                                                        echo 'selected';
                                                    } elseif ($shift_day['operator_id'] == $operator['id']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $operator['id'] ?>"><?= $operator['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" name="operator_id" value="<?= $shift_day['operator_id'] ?>" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Assistant Operator 1</label>
                                    <select disabled required class="form-select clients-input assistant1-id">
                                        <?php
                                        foreach ($assistants as $assistant) {
                                        ?>
                                            <option <?php if ($shift_day['assistant1_id'] == $assistant['id']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $assistant['id'] ?>"><?= $assistant['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" name="assistant1_id" value="<?= $shift_day['assistant1_id'] ?>" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Assistant Operator 2</label>
                                    <select disabled required class="form-select clients-input assistant2-id">
                                        <?php
                                        foreach ($assistants as $assistant) {
                                        ?>
                                            <option <?php if ($shift_day['assistant2_id'] == $assistant['id']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $assistant['id'] ?>"><?= $assistant['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" name="assistant2_id" value="<?= $shift_day['assistant2_id'] ?>" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Assistant Operator 3</label>
                                    <select disabled required class="form-select clients-input assistant3-id">
                                        <?php
                                        foreach ($assistants as $assistant) {
                                        ?>
                                            <option <?php if ($shift_day['assistant3_id'] == $assistant['id']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $assistant['id'] ?>"><?= $assistant['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" name="assistant3_id" value="<?= $shift_day['assistant3_id'] ?>" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Supervisor</label>
                                    <input required name="supervisor_name" value="<?= $last_supervisor ?>" class="form-control" type="text" placeholder="Enter supervisor">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Client</label>
                                    <select disabled required name="client_id" class="form-select digits">
                                        <option disabled selected value="">--PLEASE SELECT--</option>
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
                                    <input type="hidden" name="client_id" value="<?= $wire['client_id'] ?>">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Package</label>
                                    <select disabled required name="package_id" class="form-select digits">
                                        <option disabled selected value="">--PLEASE SELECT--</option>
                                        <?php
                                        foreach ($packages as $row) {
                                        ?>
                                            <option <?php if ($wire['package_id'] == $row['id']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" name="package_id" value="<?= $wire['package_id'] ?>">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Drum No</label>
                                    <select disabled required name="drum_id" class="form-select digits">
                                        <?php
                                        foreach ($drums as $drum) {
                                        ?>
                                            <option <?php if ($wire['drum_id'] == $drum['id']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $drum['id'] ?>"><?= $drum['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" name="drum_id" value="<?= $wire['drum_id'] ?>">
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
                                    <input required name="pull_test" value="" class="form-control" type="number" placeholder="Enter pull test value" min="0" max="9999">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">X (inches)</label>
                                    <input required name="x_inch" value="" class="form-control" type="number" placeholder="Enter X (in)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Y (inches)</label>
                                    <input required name="y_inch" value="" class="form-control" type="number" placeholder="Enter Y (in)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Cut Off (ft)</label>
                                    <input required name="cut_off" value="" class="form-control" type="number" placeholder="Enter Cut Off (ft)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Well Name <span style="color: red">*</span></label>
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
                                                <th style="width: 15%;">Type of Job <span style="color: red">*</span></th>
                                                <th style="width: 10%;">No of Jar <span style="color: red">*</span></th>
                                                <th style="width: 10%;">Max Pull (lbs) <span style="color: red">*</span></th>
                                                <th style="width: 10%;">Max Depth (ft) <span style="color: red">*</span></th>
                                                <th style="width: 10%;">Duration (mins) <span style="color: red">*</span></th>
                                                <th style="width: 15%;">Smart Monitor Logged</th>
                                                <th style="width: 15%;">Special Note</th>
                                                <th style="width: 10%;">Job Status <span style="color: red">*</span></th>
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
                                                    <input required name="jar_number[]" value="" class="form-control" type="number">
                                                </td>
                                                <td>
                                                    <input required name="max_pull[]" value="" class="form-control" type="number">
                                                </td>
                                                <td>
                                                    <input required name="max_depth[]" value="" class="form-control" type="number">
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
                                                    <button disabled class="btn btn-light smart-monitor-csv-validate mt-3" type="button">
                                                        Validate
                                                    </button>
                                                    <br>
                                                    <span class="badge rounded-pill badge-success csv-passed d-none">Passed</span>
                                                    <span class="badge rounded-pill badge-danger csv-failed d-none">Failed</span>
                                                    <input name="csv-result[]" class="csv-result" type="hidden" value="0">
                                                </td>
                                                <td>
                                                    <textarea name="remarks[]" class="form-control" rows="5" cols="3"></textarea>
                                                </td>
                                                <td>
                                                    <select required name="job_status[]" class="form-select digits">
                                                        <option value="Complete">Complete</option>
                                                        <option value="Rerun">To Rerun</option>
                                                        <option value="Rerun">Abandoned</option>
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