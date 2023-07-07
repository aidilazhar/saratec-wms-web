<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?= base_url("wells/update/" . encode($well['id'])) ?>" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $page['subtitle'] ?></h5>
                            </div>
                            <div class="card-body row">
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Name</label>
                                    <div class="input-group">
                                        <input required value="<?= $well['names'][0] ?>" name="name1" class="form-control name-1" type="text" maxlength="6">
                                        <span class="input-group-text">-</span>
                                        <input required value="<?= $well['names'][1] ?>" name="name2" class="form-control name-2" type="text">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Field</label>
                                    <select required name="field_id" class="form-select digits">
                                        <?php
                                        foreach ($fields as $field) {
                                        ?>
                                            <option <?php
                                                    if ($field['id'] == $well['field_id']) {
                                                        echo 'selected';
                                                    }
                                                    ?> value="<?= $field['id'] ?>"><?= $field['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Tubing Size</label>
                                    <input required value="<?= $well['tubing_size'] ?>" name="tubing_size" class="form-control" type="text" placeholder="Enter tubing size">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Max Angle</label>
                                    <input required value="<?= $well['max_angle'] ?>" name="max_angle" class="form-control" type="text" placeholder="Enter tubing size">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Type</label>
                                    <select required name="type" class="form-select digits">
                                        <option <?php
                                                if ($well['type'] == 'Gas Well') {
                                                    echo 'selected';
                                                }
                                                ?> value="Gas Well">Gas Well</option>
                                        <option <?php
                                                if ($well['type'] == 'Oil Well') {
                                                    echo 'selected';
                                                }
                                                ?> value="Oil Well">Oil Well</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Schematic</label>
                                    <input required name="schematic" class="form-control" type="file">
                                    <?php
                                    if ($well['schematic'] != null || $well['schematic']  != '') {
                                    ?>
                                        <a target="_blank" href="<?= temp_url($well['schematic']) ?>">
                                            <p class="mb-0"><small><?= explode("/", $well['schematic'])[count(explode("/", $well['schematic'])) - 1] ?></small></p>
                                        </a>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="<?= base_url("wells") ?>"><button type="button" class="btn btn-secondary">Cancel</button></a>
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>