<div class="container-fluid">
    <div class="row">
        <!-- HTML (DOM) sourced data  Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5><?= $page['subtitle'] ?></h5>
                    <?php
                    if (permission('Create Trials')) {
                    ?>
                        <a href="<?= base_url("wires/" . encode($wire_id) . "/trials/create") ?>"><button class="btn btn-primary pull-right" type="button" data-bs-toggle="tooltip" title="" data-bs-original-title="btn btn-primary">Create Record</button></a>
                    <?php
                    }
                    ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
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
                            <tbody>
                            </tbody>
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