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
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Date</label>
                                    <input class="form-control digits" id="example-datetime-local-input" type="datetime-local" required name="issued_at" value="<?= date('Y-m-d H:i:s') ?>">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Supervisor</label>
                                    <input required name="supervisor_name" value="<?= $last_supervisor ?>" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter supervisor">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Client</label>
                                    <select required name="client_id" class="form-select digits" id="exampleFormControlSelect9">
                                        <?php
                                        foreach ($clients as $client) {
                                        ?>
                                            <option value="<?= $client['id'] ?>"><?= $client['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Package</label>
                                    <select required name="package_id" class="form-select digits" id="exampleFormControlSelect9">
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
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Drum No</label>
                                    <select required name="drum_id" class="form-select digits" id="exampleFormControlSelect9">
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
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Wrap Test</label>
                                    <select required name="wrap_test" class="form-control">
                                        <option>N/A</option>
                                        <option>Pass</option>
                                        <option>Acceptable Crack</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Pull Test Value</label>
                                    <select required name="pull_test" class="form-control">
                                        <option>N/A</option>
                                        <option>0 - 999 lbs</option>
                                        <option>1,000 - 1,999 lbs</option>
                                        <option>2,000 - 2,999 lbs</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">X (inches)</label>
                                    <input required name="x_inch" value="" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter X (in)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Y (inches)</label>
                                    <input required name="y_inch" value="" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter Y (in)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Cut Off (ft)</label>
                                    <input required name="cut_off" value="" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter Cut Off (ft)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Well Name</label>
                                    <input required name="well_name" value="" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter Well Name">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Type of Job</label>
                                    <select required name="job_type_id" class="form-select digits" id="exampleFormControlSelect9">
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
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">No of Jar</label>
                                    <input required name="jar_number" value="" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter No of Jar">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Max Pull (lbs)</label>
                                    <input required name="max_pull" value="" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter Max Pull (lbs)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Max Depth (ft)</label>
                                    <input required name="max_depth" value="" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter Pull Test">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Duration (mins)</label>
                                    <input required name="duration" value="" class="form-control" id="exampleInputEmail1" type="number" aria-describedby="emailHelp" placeholder="Enter Duration (mins)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Smart Monitor Logged</label>
                                    <div class="media-body switch-md">
                                        <label class="switch">
                                            <input name="smart_monitor" type="checkbox" class="smart-monitor"><span class="switch-state"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Smart Monitor CSV</label>
                                    <input disabled name="smart_monitor_csv" class="form-control smart-monitor-csv" id="exampleInputEmail1" type="file" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Special Note</label>
                                    <textarea name="remarks" class="form-control" rows="5" cols="5" placeholder="Enter special note"></textarea>
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