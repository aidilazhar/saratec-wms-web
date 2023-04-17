<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <form class="theme-form" action="<?= base_url("wires/store") ?>" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $page['subtitle'] ?></h5>
                            </div>
                            <div class="card-body row">
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Date</label>
                                    <input value="<?= date('Y-m-d') ?>" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter name">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Supervisor</label>
                                    <select class="form-select digits" id="exampleFormControlSelect9">
                                        <?php
                                        foreach ($supervisors as $supervisor) {
                                        ?>
                                            <option value="<?= $supervisor['id'] ?>"><?= $supervisor['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Client</label>
                                    <select class="form-select digits" id="exampleFormControlSelect9">
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
                                    <select class="form-select digits" id="exampleFormControlSelect9">
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
                                    <select class="form-select digits" id="exampleFormControlSelect9">
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
                                    <select class="form-control">
                                        <option>N/A</option>
                                        <option>Pass</option>
                                        <option>Acceptable Crack</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Pull Test</label>
                                    <select class="form-control">
                                        <option>N/A</option>
                                        <option>0 - 999 lbs</option>
                                        <option>1,000 - 1,999 lbs</option>
                                        <option>2,000 - 2,999 lbs</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Max Depth</label>
                                    <input value="" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter Pull Test">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">X (in)</label>
                                    <input value="" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter X (in)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Y (in)</label>
                                    <input value="" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter Y (in)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Cut Off (ft)</label>
                                    <input value="" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter Cut Off (ft)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Well Name</label>
                                    <input value="" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter Well Name">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Type of Job</label>
                                    <select class="form-select digits" id="exampleFormControlSelect9">
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
                                    <input value="" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter No of Jar">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Max Pull (lbs)</label>
                                    <input value="" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter Max Pull (lbs)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Duration (mins)</label>
                                    <input value="" class="form-control" id="exampleInputEmail1" type="number" aria-describedby="emailHelp" placeholder="Enter Duration (mins)">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Smart Monitor Logged</label>
                                    <div class="media-body switch-md">
                                        <label class="switch">
                                            <input type="checkbox"><span class="switch-state"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Special Note</label>
                                    <textarea class="form-control" rows="5" cols="5" placeholder="Enter special note"></textarea>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="<?= base_url("wires/" . encode($wire_id)) . '/trials' ?>">
                                    <button type="button" class="btn btn-secondary">Back</button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>