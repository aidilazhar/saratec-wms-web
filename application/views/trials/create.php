<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?= base_url("wires/" . encode($wire_id) . "/trials/store") ?>" method="POST" novalidate onsubmit="return validateForm()" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $page['subtitle'] ?></h5>
                            </div>
                            <div class="card-body row">
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Date</label>
                                    <input class="form-control digits" id="example-datetime-local-input" type="datetime-local" required name="issued_at" value="<?= date('Y-m-d H:i:s') ?>">
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
                                    <select required name="well_id" class="form-select digits">
                                        <?php
                                        foreach ($wells as $well) {
                                        ?>
                                            <option <?php if ($well['id'] == $wire['client_id']) {
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
                                            <option value="<?= $job_type['id'] ?>"><?= $job_type['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">No of Jar</label>
                                    <input required name="jar_number" value="" class="form-control" type="text" placeholder="Enter No of Jar">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Max Pull (lbs)</label>
                                    <input required name="max_pull" value="" class="form-control" type="text" placeholder="Enter Max Pull (lbs)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Max Depth (ft)</label>
                                    <input required name="max_depth" value="" class="form-control" type="text" placeholder="Enter Pull Test">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Duration (mins)</label>
                                    <input required name="duration" value="" class="form-control" type="number" placeholder="Enter Duration (mins)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Smart Monitor Logged</label>
                                    <div class="media-body switch-md">
                                        <label class="switch">
                                            <input name="smart_monitor" type="checkbox" class="smart-monitor"><span class="switch-state"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Smart Monitor CSV</label>
                                    <input disabled name="smart_monitor_csv" class="form-control smart-monitor-csv" type="file">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Special Note</label>
                                    <textarea name="remarks" class="form-control" rows="5" cols="5" placeholder="Enter special note"></textarea>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Job Status</label>
                                    <select required name="job_status" class="form-select digits">
                                        <option value="Complete">Complete</option>
                                        <option value="Rerun">Rerun</option>
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