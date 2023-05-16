<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?= base_url("wires/store") ?>" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()" novalidate>
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $page['subtitle'] ?></h5>
                            </div>
                            <div class="card-body row">
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Wire ID</label>
                                    <input required name="name" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter name">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Size</label>
                                    <input required name="size" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter size">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Brand</label>
                                    <input required name="brand" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter brand">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Grade</label>
                                    <input required name="grade" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter grade">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Manufacturer</label>
                                    <input required name="manufacturer" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter manufacturer">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Company</label>
                                    <select required name="company_id" class="form-select digits company-input" id="exampleFormControlSelect9">
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
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Drum</label>
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
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Client</label>
                                    <select required name="client_id" class="form-select clients-input" id="exampleFormControlSelect9">
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
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Material Certifications</label>
                                    <input name="material_certifications" class="form-control" id="exampleInputEmail1" type="file" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Eddy Current</label>
                                    <input name="tech_sheet" class="form-control" id="exampleInputEmail1" type="file" aria-describedby="emailHelp">
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="<?= base_url("wires") ?>"><button type="button" class="btn btn-secondary">Cancel</button></a>
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>