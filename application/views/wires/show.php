<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5><?= $page['subtitle'] ?></h5>
                        </div>
                        <div class="card-body row">
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0">Company</label>
                                <input disabled value="<?= $company['name'] ?>" class="form-control" type="text" placeholder="Enter name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0">Client</label>
                                <input disabled value="<?= $client['name'] ?>" class="form-control" type="text" placeholder="Enter name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0">Name</label>
                                <input disabled value="<?= $wire['name'] ?>" class="form-control" type="text" placeholder="Enter name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0">Package</label>
                                <input disabled value="<?= $package['name'] ?>" class="form-control" type="text" placeholder="Enter size">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0">Drum</label>
                                <input disabled value="<?= $drum['name'] ?>" class="form-control" type="text" placeholder="Enter size">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0">Size</label>
                                <input disabled value="<?= $wire['size'] ?>" class="form-control" type="text" placeholder="Enter size">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0">Brand</label>
                                <input disabled value="<?= $wire['brand'] ?>" class="form-control" type="text" placeholder="Enter brand">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0">Grade</label>
                                <input disabled value="<?= $wire['grade'] ?>" class="form-control" type="text" placeholder="Enter grade">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0">Manufacturer</label>
                                <input disabled value="<?= $wire['manufacturer'] ?>" class="form-control" type="text" placeholder="Enter manufacturer">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0">Material Certifications</label>
                                <?php
                                if ($wire['material_certifications'] != null || $wire['material_certifications']  != '') {
                                ?>
                                    <a target="_blank" href=" <?= asset_url($wire['material_certifications']) ?>">
                                        <p class="mb-0"><?= explode("/", $wire['material_certifications'])[count(explode("/", $wire['material_certifications'])) - 1] ?></p>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0">Eddy Current</label>
                                <?php
                                if ($wire['tech_sheet'] != null || $wire['tech_sheet']  != '') {
                                ?>
                                    <a target="_blank" href="<?= asset_url($wire['tech_sheet']) ?>">
                                        <p class="mb-0"><?= explode("/", $wire['tech_sheet'])[count(explode("/", $wire['tech_sheet'])) - 1] ?></p>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>