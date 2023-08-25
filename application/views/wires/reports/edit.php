<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <form action="<?= base_url('wires/' . encode($wire_id) . '/reports/update/' . encode($report_id)) ?>" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $page['subtitle'] ?></h5>
                            </div>
                            <div class="card-body row">
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Name</label>
                                    <input required value="<?= $report['name'] ?>" name="name" class="form-control" type="text" placeholder="Enter name">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Description</label>
                                    <input required value="<?= $report['description'] ?>" name="description" class="form-control" type="text" placeholder="Enter description">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Category</label>
                                    <select name="category" class="form-control">
                                        <option <?php if ($report['category'] == "Inspection Report") {
                                                    echo "selected";
                                                } ?> value="Inspection Report">Inspection Report</option>
                                        <option <?php if ($report['category'] == "Problem Report") {
                                                    echo "selected";
                                                } ?> value="Problem Report">Problem Report</option>
                                        <option <?php if ($report['category'] == "Investigation Report") {
                                                    echo "selected";
                                                } ?> value="Investigation Report">Investigation Report</option>
                                        <option <?php if ($report['category'] == "Lab Test") {
                                                    echo "selected";
                                                } ?> value="Lab Test">Lab Test</option>
                                        <option <?php if ($report['category'] == "Others") {
                                                    echo "selected";
                                                } ?> value="Others">Others</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Issued By</label>
                                    <input required value="<?= $report['issued_by'] ?>" name="issued_by" class="form-control" type="text" placeholder="Enter Issued By">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">Issued At</label>
                                    <input required class="form-control digits" id="example-datetime-local-input" type="datetime-local" required name="issued_at" value="<?= date('Y-m-d H:i:s', strtotime($report['issued_at'])) ?>">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0">File</label>
                                    <input required name="report" class="form-control" type="file" placeholder="File">
                                    <?php
                                    if ($report['url'] != null || $report['url']  != '') {
                                    ?>
                                        <a target="_blank" href="<?= temp_url($report['url']) ?>">
                                            <p class="mb-0"><small>View File</small></p>
                                        </a>
                                    <?php
                                    }
                                    ?>
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