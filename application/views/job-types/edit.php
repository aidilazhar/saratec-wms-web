<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <form class="theme-form" action="<?= base_url("job-types/update/" . encode($job_type['id'])) ?>" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $page['subtitle'] ?></h5>
                            </div>
                            <div class="card-body row">
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Name</label>
                                    <input name="name" value="<?= $job_type['name'] ?>" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter name">
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="<?= base_url("job-types") ?>"><button type="button" class="btn btn-secondary">Cancel</button></a>
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>