<style>
    .form-switch .form-check-input.switch-warning:checked {
        background-color: #FFAA05;
        border-color: #FFAA05;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?= base_url("packages/store") ?>" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $page['subtitle'] ?></h5>
                            </div>
                            <div class="card-body row">
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Name</label>
                                    <input required name="name" class="form-control" type="text" placeholder="Enter name">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Drum 1 No</label>
                                    <select required name="drum1_id" class="form-select digits">
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
                                    <label class="col-form-label pt-0">Drum 2 No</label>
                                    <select required name="drum2_id" class="form-select digits">
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
                                <div class="mb-3 col-md-12 row mx-auto">
                                    <div class="col-md-6 p-4">
                                        <div class="card card-absolute">
                                            <div class="card-header bg-warning">
                                                <h5 class="txt-light">
                                                    <i class="icofont icofont-full-sunny"></i>
                                                    Day
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex list-behavior-1 align-items-center">
                                                    <div class="flex-grow-1 row">
                                                        <div class="mb-3 col-md-12">
                                                            <label class="col-form-label pt-0">Operator</label>
                                                            <select required name="day[operator_id]" class="form-select operators-input">
                                                                <?php
                                                                foreach ($operators as $operator) {
                                                                ?>
                                                                    <option value="<?= $operator['id'] ?>"><?= $operator['name'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="col-form-label pt-0">Assistant Operator 1</label>
                                                            <select required name="day[assistant1_id]" class="form-select assistants-input">
                                                                <?php
                                                                foreach ($assistants as $assistant) {
                                                                ?>
                                                                    <option value="<?= $assistant['id'] ?>"><?= $assistant['name'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="col-form-label pt-0">Assistant Operator 2</label>
                                                            <select required name="day[assistant2_id]" class="form-select assistants-input">
                                                                <?php
                                                                foreach ($assistants as $assistant) {
                                                                ?>
                                                                    <option value="<?= $assistant['id'] ?>"><?= $assistant['name'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="col-form-label pt-0">Assistant Operator 3</label>
                                                            <select required name="day[assistant3_id]" class="form-select assistants-input">
                                                                <?php
                                                                foreach ($assistants as $assistant) {
                                                                ?>
                                                                    <option value="<?= $assistant['id'] ?>"><?= $assistant['name'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-4">
                                        <div class="card card-absolute">
                                            <div class="card-header bg-dark">
                                                <h5 class="txt-light">
                                                    <i class="icofont icofont-full-night"></i>
                                                    Night
                                                    <div class="form-check form-switch" style="display: inline-block; padding-left: 3em;  vertical-align: middle">
                                                        <input class="form-check-input switch-warning check-size night-shift" type="checkbox" role="switch">
                                                    </div>
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex list-behavior-1 align-items-center">
                                                    <div class="flex-grow-1 row">
                                                        <div class="mb-3 col-md-12">
                                                            <label class="col-form-label pt-0">Operator</label>
                                                            <select disabled required name="night[operator_id]" class="form-select operators-input">
                                                                <?php
                                                                foreach ($operators as $operator) {
                                                                ?>
                                                                    <option value="<?= $operator['id'] ?>"><?= $operator['name'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="col-form-label pt-0">Assistant Operator 1</label>
                                                            <select disabled required name="night[assistant1_id]" class="form-select assistants-input">
                                                                <?php
                                                                foreach ($assistants as $assistant) {
                                                                ?>
                                                                    <option value="<?= $assistant['id'] ?>"><?= $assistant['name'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="col-form-label pt-0">Assistant Operator 2</label>
                                                            <select disabled required name="night[assistant2_id]" class="form-select assistants-input">
                                                                <?php
                                                                foreach ($assistants as $assistant) {
                                                                ?>
                                                                    <option value="<?= $assistant['id'] ?>"><?= $assistant['name'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 col-md-12">
                                                            <label class="col-form-label pt-0">Assistant Operator 3</label>
                                                            <select disabled required name="night[assistant3_id]" class="form-select assistants-input">
                                                                <?php
                                                                foreach ($assistants as $assistant) {
                                                                ?>
                                                                    <option value="<?= $assistant['id'] ?>"><?= $assistant['name'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <a href="<?= base_url("packages") ?>"><button type="button" class="btn btn-secondary">Cancel</button></a>
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>