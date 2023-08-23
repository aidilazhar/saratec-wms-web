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
                                    <select readonly required class="form-control" name="size">
                                        <option <?php if ($wire['size'] == '0.092') {
                                                    echo 'selected';
                                                } ?> value="0.092">0.092</option>
                                        <option <?php if ($wire['size'] == '0.108') {
                                                    echo 'selected';
                                                } ?> value="0.108">0.108</option>
                                        <option <?php if ($wire['size'] == '0.125') {
                                                    echo 'selected';
                                                } ?> value="0.125">0.125</option>
                                        <option <?php if ($wire['size'] == '0.140') {
                                                    echo 'selected';
                                                } ?> value="0.140">0.140</option>
                                        <option <?php if ($wire['size'] == '0.160') {
                                                    echo 'selected';
                                                } ?> value="0.160">0.160</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Brand</label>
                                    <input name="brand" value="<?= $wire['brand'] ?>" class="form-control" type="text" placeholder="Enter brand" disabled>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Grade</label>
                                    <select readonly required class="form-control" name="grade">
                                        <option <?php if ($wire['grade'] == 'Carbon Steel') {
                                                    echo 'selected';
                                                } ?> value="Carbon Steel">Carbon Steel</option>
                                        <option <?php if ($wire['grade'] == 'Duplex SS') {
                                                    echo 'selected';
                                                } ?> value="Duplex SS">Duplex SS</option>
                                        <option <?php if ($wire['grade'] == 'Super Duplex SS') {
                                                    echo 'selected';
                                                } ?> value="Super Duplex SS">Super Duplex SS</option>
                                        <option <?php if ($wire['grade'] == 'High Alloy Austenitic SS') {
                                                    echo 'selected';
                                                } ?> value="High Alloy Austenitic SS">High Alloy Austenitic SS</option>
                                    </select>
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
                                <!-- <div class="mb-3 col-md-6">
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
                                </div> -->
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Drum No</label>
                                    <select required name="drum_id" class="form-select digits">
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
                                            ?>
                                        <?php
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