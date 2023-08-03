<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?= base_url("wires/update/" . encode($wire['id'])) ?>" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $page['subtitle'] ?></h5>
                            </div>
                            <div class="card-body row">
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Wire ID</label>
                                    <input name="name" value="<?= $wire['name'] ?>" class="form-control" type="text" placeholder="Enter name" disabled>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">URL</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1"><?= base_url() ?></span>
                                        <input required name="url" value="<?= $wire['url'] ?>" class="form-control input-url" type="text" placeholder="Enter URL">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Size</label>
                                    <input name="size" value="<?= $wire['size'] ?>" class="form-control" type="text" placeholder="Enter size" disabled>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Brand</label>
                                    <input name="brand" value="<?= $wire['brand'] ?>" class="form-control" type="text" placeholder="Enter brand" disabled>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Grade</label>
                                    <input name="grade" value="<?= $wire['grade'] ?>" class="form-control" type="text" placeholder="Enter grade" disabled>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Manufacturer</label>
                                    <input name="manufacturer" value="<?= $wire['manufacturer'] ?>" class="form-control" type="text" placeholder="Enter manufacturer" disabled>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Company</label>
                                    <select disabled name="company_id" class="form-select digits company-input">
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
                                    <label class="col-form-label pt-0">Drum</label>
                                    <select name="drum_id" class="form-select digits">
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
                                    <label class="col-form-label pt-0">Package</label>
                                    <select name="package_id" class="form-select digits">
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
                                    <label class="col-form-label pt-0">Client</label>
                                    <select name="client_id" class="form-select clients-input">
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
                                    <label class="col-form-label pt-0">Material Certifications</label>
                                    <input accept="application/pdf" name="material_certifications" class="form-control" type="file">
                                    <?php
                                    if ($wire['material_certifications'] != null || $wire['material_certifications']  != '') {
                                    ?>
                                        <a target="_blank" href=" <?= temp_url($wire['material_certifications']) ?>">
                                            <p class="mb-0"><small><?= explode("/", $wire['material_certifications'])[count(explode("/", $wire['material_certifications'])) - 1] ?></small></p>
                                        </a>
                                    <?php
                                    }
                                    ?>

                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Eddy Current</label>
                                    <input accept="application/pdf" name="tech_sheet" class="form-control" type="file">
                                    <?php
                                    if ($wire['tech_sheet'] != null || $wire['tech_sheet']  != '') {
                                    ?>
                                        <a target="_blank" href="<?= temp_url($wire['tech_sheet']) ?>">
                                            <p class="mb-0"><small><?= explode("/", $wire['tech_sheet'])[count(explode("/", $wire['tech_sheet'])) - 1] ?></small></p>
                                        </a>
                                    <?php
                                    }
                                    ?>
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