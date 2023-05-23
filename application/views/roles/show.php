<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5><?= $page['subtitle'] ?></h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="POST" action="<?= base_url('roles/' . encode($role_id) . '/permission-update') ?>">
                            <table class="table table-bordered" style="width:100%">
                                <tbody>
                                    <?php
                                    foreach ($permissions as $key => $permission) {
                                    ?>
                                        <tr style="background-color: #f2f3f7b3;">
                                            <th><?= $key ?></th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <?php
                                                    foreach ($permission as $key => $perm) {
                                                    ?>
                                                        <div class="col-4">
                                                            <input name="permission[]" <?php if (array_search($perm['id'], $perm_role) != '') {
                                                                                            echo 'checked';
                                                                                        } ?> class="form-check-input me-2" id="inlineCheckbox1" type="checkbox" value="<?= $perm['id'] ?>"> <?= $perm['name'] ?>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <button class="btn btn-primary mt-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>