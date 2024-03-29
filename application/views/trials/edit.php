<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?= base_url("wires/" . encode($wire_id) . "/trials/update/" . encode($trial['id'])) ?>" method="POST" novalidate onsubmit="return validateForm()" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $page['subtitle'] ?></h5>
                            </div>
                            <div class="card-body row">
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Date</label>
                                    <input required class="form-control digits" id="example-datetime-local-input" type="datetime-local" required name="issued_at" value="<?= date('Y-m-d H:i:s', strtotime($trial['issued_at'])) ?>">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Shift</label>
                                    <select required name="shift" class="form-select shift-options">
                                        <option <?php if ($trial['shift'] == 'day') {
                                                    echo 'selected';
                                                } ?> value="day">Day</option>
                                        <option <?php if (!$has_shift_night) {
                                                    echo 'disabled ';
                                                }
                                                if ($trial['shift'] == 'night' && $has_shift_night) {
                                                    echo 'selected';
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
                                            <option <?php if ($selected_shift['operator_id'] == $operator['id']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $operator['id'] ?>"><?= $operator['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" name="operator_id" value="<?= $selected_shift['operator_id'] ?>" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Assistant Operator 1</label>
                                    <select disabled required class="form-select clients-input assistant1-id">
                                        <?php
                                        foreach ($assistants as $assistant) {
                                        ?>
                                            <option <?php if ($selected_shift['assistant1_id'] == $assistant['id']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $assistant['id'] ?>"><?= $assistant['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" name="assistant1_id" value="<?= $selected_shift['assistant1_id'] ?>" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Assistant Operator 2</label>
                                    <select disabled required class="form-select clients-input assistant2-id">
                                        <?php
                                        foreach ($assistants as $assistant) {
                                        ?>
                                            <option <?php if ($selected_shift['assistant2_id'] == $assistant['id']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $assistant['id'] ?>"><?= $assistant['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" name="assistant2_id" value="<?= $selected_shift['assistant2_id'] ?>" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Assistant Operator 3</label>
                                    <select disabled required class="form-select clients-input assistant3-id">
                                        <?php
                                        foreach ($assistants as $assistant) {
                                        ?>
                                            <option <?php if ($selected_shift['assistant3_id'] == $assistant['id']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $assistant['id'] ?>"><?= $assistant['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" name="assistant3_id" value="<?= $selected_shift['assistant3_id'] ?>" />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Supervisor</label>
                                    <input required name="supervisor_name" value="<?= $trial['supervisor_name'] ?>" class="form-control" type="text" placeholder="Enter supervisor">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Client</label>
                                    <select required name="client_id" class="form-select digits">
                                        <option disabled selected value="">--PLEASE SELECT--</option>
                                        <?php
                                        foreach ($clients as $client) {
                                        ?>
                                            <option <?php if ($client['id'] == $trial['client_id']) {
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
                                        <option disabled selected value="">--PLEASE SELECT--</option>
                                        <?php
                                        foreach ($packages as $package) {
                                        ?>
                                            <option <?php if ($package['id'] == $trial['package_id']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $package['id'] ?>"><?= $package['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Drum No</label>
                                    <select required name="drum_id" class="form-select digits">
                                        <option disabled selected value="">--PLEASE SELECT--</option>
                                        <?php
                                        foreach ($drums as $drum) {
                                        ?>
                                            <option <?php if ($drum['id'] == $trial['drum_id']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $drum['id'] ?>"><?= $drum['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Wrap Test</label>
                                    <select required name="wrap_test" class="form-control">
                                        <option <?php if ($trial['wrap_test'] == 'N/A') {
                                                    echo 'selected';
                                                } ?>>N/A</option>
                                        <option <?php if ($trial['wrap_test'] == 'Pass') {
                                                    echo 'selected';
                                                } ?>>Pass</option>
                                        <option <?php if ($trial['wrap_test'] == 'Acceptable Crack') {
                                                    echo 'selected';
                                                } ?>>Acceptable Crack</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Pull Test Value</label>
                                    <input required name="pull_test" value="<?= $trial['pull_test'] ?>" class="form-control" type="number" placeholder="Enter pull test value" min="0" max="9999">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">X (inches)</label>
                                    <input value="<?= $trial['x_inch'] ?>" required name="x_inch" class="form-control" type="text" placeholder="Enter X (in)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Y (inches)</label>
                                    <input required name="y_inch" value="<?= $trial['y_inch'] ?>" class="form-control" type="text" placeholder="Enter Y (in)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Cut Off (ft)</label>
                                    <input required name="cut_off" value="<?= $trial['cut_off'] ?>" class="form-control" type="text" placeholder="Enter Cut Off (ft)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Well Name</label>
                                    <select required name="well_id" class="form-select digits">
                                        <?php
                                        foreach ($wells as $well) {
                                        ?>
                                            <option <?php if ($well['id'] == $trial['well_id']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $well['id'] ?>"><?= $well['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Type of Job</label>
                                    <select required name="job_type_id" class="form-select digits">
                                        <?php
                                        foreach ($job_types as $job_type) {
                                        ?>
                                            <option <?php if ($job_type['id'] == $trial['job_type_id']) {
                                                        echo 'selected';
                                                    } ?> value="<?= $job_type['id'] ?>"><?= $job_type['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">No of Jar</label>
                                    <input required name="jar_number" value="<?= $trial['jar_number'] ?>" class="form-control" type="number" placeholder="Enter No of Jar" min="0">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Max Pull (lbs)</label>
                                    <input required name="max_pull" value="<?= $trial['max_pull'] ?>" class="form-control" type="number" placeholder="Enter Max Pull (lbs)" min="0">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Max Depth (ft)</label>
                                    <input required name="max_depth" value="<?= $trial['max_depth'] ?>" class="form-control" type="number" placeholder="Enter Pull Test" min="0">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Duration (mins)</label>
                                    <input required name="duration" value="<?= $trial['duration'] ?>" class="form-control" type="number" placeholder="Enter Duration (mins)" min="0">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Smart Monitor Logged</label>
                                    <div class="media-body switch-md">
                                        <label class="switch">
                                            <input required <?php if (!is_null($trial['smart_monitor_id'])) {
                                                                echo 'checked';
                                                            } ?> name="smart_monitor" type="checkbox" class="smart-monitor"><span class="switch-state"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Smart Monitor CSV</label>
                                    <input <?php
                                            if (is_null($trial['smart_monitor_id'])) {
                                            ?> disabled <?php }
                                                        ?> name="smart_monitor_csv" class="form-control smart-monitor-csv" type="file">
                                    <?php
                                    if (!is_null($trial['smart_monitor_id'])) {
                                    ?>
                                        <a target="_blank" href="<?= temp_url($trial['smart_monitor_url']) ?>">
                                            <p class="mb-0"><?= $trial['smart_monitor_name'] ?></p>
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Special Note</label>
                                    <textarea name="remarks" class="form-control" rows="5" cols="5" placeholder="Enter special note"><?= $trial['remarks'] ?></textarea>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Job Status</label>
                                    <select required name="job_status" class="form-select digits">
                                        <option <?php if ($trial['job_status'] == 'complete') {
                                                    echo 'selected';
                                                } ?> value="complete">Complete</option>
                                        <option <?php if ($trial['job_status'] == 'rerun') {
                                                    echo 'selected';
                                                } ?> value="rerun">Rerun</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="<?= base_url("wires/" . encode($wire_id)) . '/trials' ?>">
                                    <button type="button" class="btn btn-secondary">Cancel</button>
                                </a>
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>