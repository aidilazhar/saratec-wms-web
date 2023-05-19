<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5><?= $page['subtitle'] ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 col-md-6">
                                <label class="col-form-label pt-0">Name</label>
                                <input name="name" disabled value="<?= $company['name'] ?>" class="form-control" type="text" placeholder="Enter name">
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="<?= base_url("companies") ?>"><button class="btn btn-secondary">Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>