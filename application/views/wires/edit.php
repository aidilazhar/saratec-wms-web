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
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Company</label>
                                    <select class="form-select digits company-input" id="exampleFormControlSelect9">
                                        <?php
                                        foreach ($companies as $company) {
                                            if ($company['id'] == $wire['company_id']) {
                                        ?>
                                                <option selected value="<?= $company['id'] ?>"><?= $company['name'] ?></option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="<?= $company['id'] ?>"><?= $company['name'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Client</label>
                                    <select class="form-select clients-input" id="exampleFormControlSelect9">
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
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Name</label>
                                    <input value="<?= $wire['name'] ?>" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter name">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Package</label>
                                    <select class="form-select digits" id="exampleFormControlSelect9">
                                        <?php
                                        foreach ($packages as $package) {
                                            if ($package['id'] == $wire['package_id']) {
                                        ?>
                                                <option selected value="<?= $package['id'] ?>"><?= $package['name'] ?></option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="<?= $package['id'] ?>"><?= $package['name'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Drum</label>
                                    <select class="form-select digits" id="exampleFormControlSelect9">
                                        <?php
                                        foreach ($drums as $drum) {
                                            if ($drum['id'] == $wire['drum_id']) {
                                        ?>
                                                <option selected value="<?= $drum['id'] ?>"><?= $drum['name'] ?></option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="<?= $drum['id'] ?>"><?= $drum['name'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Size</label>
                                    <input value="<?= $wire['size'] ?>" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter size">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Brand</label>
                                    <input value="<?= $wire['brand'] ?>" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter brand">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Grade</label>
                                    <input value="<?= $wire['grade'] ?>" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter grade">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Manufacturer</label>
                                    <input value="<?= $wire['manufacturer'] ?>" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter manufacturer">
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="<?= base_url("wires") ?>"><button class="btn btn-secondary">Cancel</button></a>
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>