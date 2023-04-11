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
                                <label class="col-form-label pt-0" for="exampleInputEmail1">Name</label>
                                <input disabled value="<?= $wire['name'] ?>" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter name">
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="<?= base_url("wires") ?>"><button class="btn btn-secondary">Cancel</button></a>
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>