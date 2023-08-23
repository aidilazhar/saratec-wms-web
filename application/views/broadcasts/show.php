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
                            <div class="mb-3 col-md-12">
                                <label class="col-form-label pt-0">Message</label>
                                <div class="input-group">
                                    <textarea disabled required name="message" class="form-control"><?= $broadcast['message'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="<?= base_url("broadcasts") ?>"><button type="button" class="btn btn-secondary">Cancel</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>