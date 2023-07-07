<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?= base_url("users/store") ?>" method="POST">
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
                                    <label class="col-form-label pt-0">Username</label>
                                    <input required name="username" class="form-control" type="text" placeholder="Enter name">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Contact</label>
                                    <input required name="contact" class="form-control" type="text" placeholder="Enter contact">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Role</label>
                                    <select required name="role_id" class="form-select digits">
                                        <?php
                                        foreach ($roles as $role) {
                                        ?>
                                            <option value="<?= $role['id'] ?>"><?= $role['name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Email address</label>
                                    <input required name="email" class="form-control" type="email" placeholder="Enter email">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Password</label>
                                    <input required name="password" class="form-control" type="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="<?= base_url("users") ?>"><button type="button" class="btn btn-secondary">Cancel</button></a>
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>