<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?= base_url('wires/' . encode($wire_id) . '/lab-tests/store') ?>" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $page['subtitle'] ?></h5>
                            </div>
                            <div class="card-body row">
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Date</label>
                                    <input required name="issued_at" class="form-control" type="date" placeholder="Enter Date">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Description</label>
                                    <input required name="description" class="form-control" type="text" placeholder="Enter description">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Job Status</label>
                                    <input required name="job_status" class="form-control" type="text" placeholder="Enter job status">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Report Status</label>
                                    <input required name="report_status" class="form-control" type="text" placeholder="Enter report status">
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="<?= base_url('wires/' . encode($wire_id) . '/lab-tests') ?>"><button type="button" class="btn btn-secondary">Cancel</button></a>
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>