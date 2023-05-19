<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?= base_url('companies/' . encode($company_id) . '/users/update/' . encode($user['id'])) ?>" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $page['subtitle'] ?></h5>
                            </div>
                            <div class="card-body row">
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Name</label>
                                    <input name="name" value="<?= $user['name'] ?>" class="form-control" type="text" placeholder="Enter name">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Username</label>
                                    <input name="username" value="<?= $user['username'] ?>" class="form-control" type="text" placeholder="Enter name">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Contact</label>
                                    <input name="contact" value="<?= $user['contact'] ?>" class="form-control" type="text" placeholder="Enter email">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Role</label>
                                    <select name="role_id" class="form-select digits">
                                        <?php
                                        foreach ($roles as $role) {
                                            if ($role['id'] == $user['role_id']) {
                                        ?>
                                                <option selected value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Email address</label>
                                    <input name="email" value="<?= $user['email'] ?>" class="form-control" type="email" placeholder="Enter email">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Password</label>
                                    <input name="password" class="form-control" type="password" placeholder="Password">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Retype Password</label>
                                    <input name="repassword" class="form-control" type="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="<?= base_url('companies/' . encode($company_id) . '/users') ?>"><button type="button" class="btn btn-secondary">Cancel</button></a>
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>