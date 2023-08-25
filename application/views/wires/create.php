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
                                    <label class="col-form-label pt-0">Wire ID</label>
                                    <input required name="name" class="form-control input-name" type="text" placeholder="Enter name">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">URL</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><?= base_url() ?></span>
                                        <input required name="url" class="form-control input-url" type="text" placeholder="Enter URL">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Size</label>
                                    <select required class="form-control" name="size">
                                        <option value="0.092">0.092</option>
                                        <option value="0.108">0.108</option>
                                        <option value="0.125">0.125</option>
                                        <option value="0.140">0.140</option>
                                        <option value="0.160">0.160</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Range</label>
                                    <input required name="range" class="form-control" type="text" placeholder="Enter initial length">
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
                                    <label class="col-form-label pt-0">Brand</label>
                                    <input required name="brand" class="form-control" type="text" placeholder="Enter brand">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Initial Length</label>
                                    <input required name="initial_length" class="form-control" type="text" placeholder="Enter initial length">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Grade</label>
                                    <select required class="form-control" name="grade">
                                        <option value="Carbon Steel">Carbon Steel</option>
                                        <option value="Duplex SS">Duplex SS</option>
                                        <option value="Super Duplex SS">Super Duplex SS</option>
                                        <option value="High Alloy Austenitic SS">High Alloy Austenitic SS</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Manufacturer</label>
                                    <input required name="manufacturer" class="form-control" type="text" placeholder="Enter manufacturer">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Company</label>
                                    <select required name="company_id" class="form-select digits company-input">
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
                                    <label class="col-form-label pt-0">Client</label>
                                    <select required name="client_id" class="form-select clients-input">
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
                                    <label class="col-form-label pt-0">Material Certifications (PDF only)</label>
                                    <input accept="application/pdf" name="material_certifications" class="form-control" type="file">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Eddy Current (PDF only)</label>
                                    <input accept="application/pdf" name="tech_sheet" class="form-control" type="file">
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