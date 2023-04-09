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
                                <label class="col-form-label pt-0" for="exampleInputEmail1">Name</label>
                                <input disabled value="<?= $job_type['name'] ?>" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter name">
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="<?= base_url("job-types") ?>"><button class="btn btn-secondary">Back</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>