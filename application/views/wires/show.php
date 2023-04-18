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
                                <label class="col-form-label pt-0" for="exampleInputEmail1">Company</label>
                                <input disabled value="<?= $company['name'] ?>" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0" for="exampleInputEmail1">Client</label>
                                <input disabled value="<?= $client['name'] ?>" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0" for="exampleInputEmail1">Name</label>
                                <input disabled value="<?= $wire['name'] ?>" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0" for="exampleInputEmail1">Package</label>
                                <select disabled class="form-select digits" id="exampleFormControlSelect9">
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
                                <select disabled class="form-select digits" id="exampleFormControlSelect9">
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
                                <input disabled value="<?= $wire['size'] ?>" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter size">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0" for="exampleInputEmail1">Brand</label>
                                <input disabled value="<?= $wire['brand'] ?>" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter brand">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0" for="exampleInputEmail1">Grade</label>
                                <input disabled value="<?= $wire['grade'] ?>" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter grade">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0" for="exampleInputEmail1">Manufacturer</label>
                                <input disabled value="<?= $wire['manufacturer'] ?>" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter manufacturer">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>