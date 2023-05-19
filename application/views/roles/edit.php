<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?= base_url("roles/store") ?>" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $page['subtitle'] ?></h5>
                            </div>
                            <div class="card-body row">
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Name</label>
                                    <input value="<?= $role['name'] ?>" class="form-control" type="text" placeholder="Enter name">
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="<?= base_url("roles") ?>"><button class="btn btn-secondary">Cancel</button></a>
                                <a href="<?= base_url("roles") ?>"><button class="btn btn-primary">Submit</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>