<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?= base_url("wells/store") ?>" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $page['subtitle'] ?></h5>
                            </div>
                            <div class="card-body row">
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Name</label>
                                    <div class="input-group">
                                        <input name="name1" class="form-control name-1" type="text" maxlength="6">
                                        <span class="input-group-text">-</span>
                                        <input name="name2" class="form-control name-2" type="text">
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Field</label>
                                    <select name="field_id" class="form-select digits">
                                        <?php
                                        foreach ($fields as $field) {
                                        ?>
                                            <option value="<?= $field['id'] ?>"><?= $field['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Tubing Size</label>
                                    <input name="tubing_size" class="form-control" type="text" placeholder="Enter tubing size">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Max Angle</label>
                                    <input name="max_angle" class="form-control" type="text" placeholder="Enter tubing size">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Type</label>
                                    <select name="type" class="form-select digits">
                                        <option value="Gas Well">Gas Well</option>
                                        <option value="Oil Well">Oil Well</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Schematic</label>
                                    <input name="schematic" class="form-control" type="file">
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