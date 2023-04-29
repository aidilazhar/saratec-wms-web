<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 col-xl-12">
            <div class="row">
                <div class="col-sm-12">
                    <form class="theme-form" action="<?= base_url('companies/' . encode($company_id) . '/clients/update/' . encode($client['id'])) ?>" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <h5><?= $page['subtitle'] ?></h5>
                            </div>
                            <div class="card-body row">
                                <div class="mb-3 col-md-6">
                                    <label class="col-form-label pt-0" for="exampleInputEmail1">Name</label>
                                    <input value="<?= $client['name'] ?>" class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter name">
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a href="<?= base_url('companies/' . encode($company_id) . '/clients') ?>"><button type="button" class="btn btn-secondary">Cancel</button></a>
                                <a href="<?= base_url('companies/' . encode($company_id) . '/clients') ?>"><button class="btn btn-primary">Submit</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>