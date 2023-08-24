<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?= base_url('wires/' . encode($wire_id) . '/reports/store') ?>" method="POST" enctype="multipart/form-data">
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
                                    <label class="col-form-label pt-0">Description</label>
                                    <input required name="description" class="form-control" type="text" placeholder="Enter description">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Category</label>
                                    <select name="category" class="form-control">
                                        <option value="Inspection Report">Inspection Report</option>
                                        <option value="Problem Report">Problem Report</option>
                                        <option value="Investigation Report">Investigation Report</option>
                                        <option value="Lab Test">Lab Test</option>
                                        <option value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Issued By</label>
                                    <input required name="issued_by" class="form-control" type="text" placeholder="Enter Issued By">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Issued At</label>
                                    <input required class="form-control digits" id="example-datetime-local-input" type="datetime-local" required name="issued_at" value="<?= date('Y-m-d H:i:s') ?>">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">File</label>
                                    <input required name="report" class="form-control" type="file" placeholder="File">
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="<?= base_url('wires/' . encode($wire_id) . '/reports') ?>"><button type="button" class="btn btn-secondary">Cancel</button></a>
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>