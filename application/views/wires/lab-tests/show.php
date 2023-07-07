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
                                <label class="col-form-label pt-0">Name</label>
                                <input disabled value="<?= $user['name'] ?>" class="form-control" type="text" placeholder="Enter name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0">Username</label>
                                <input disabled value="<?= $user['username'] ?>" class="form-control" type="text" placeholder="Enter name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0">Contact</label>
                                <input disabled value="<?= $user['contact'] ?>" class="form-control" type="email" placeholder="Enter email">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0">Role</label>
                                <input disabled value="<?= $user['role']['name'] ?>" class="form-control" type="email" placeholder="Enter email">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0">Email address</label>
                                <input value="<?= $user['email'] ?>" disabled class="form-control" type="email" placeholder="Enter email">
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="<?= base_url('companies/' . encode($company_id) . '/users') ?>"><button class="btn btn-secondary">Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>