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
                                        ?>
                                            <option value="<?= $company['id'] ?>"><?= $company['name'] ?></option>
                                        <?php
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
                                    <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter name">
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
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Drum</label>
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
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Size</label>
                                    <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter size">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Brand</label>
                                    <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter brand">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Grade</label>
                                    <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter grade">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Manufacturer</label>
                                    <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter manufacturer">
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