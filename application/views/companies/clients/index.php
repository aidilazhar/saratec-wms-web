<div class="container-fluid">
    <div class="row">
        <!-- HTML (DOM) sourced data  Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5><?= $page['subtitle'] ?></h5>
                    <a href="<?= base_url('companies/' . encode($company_id) . '/clients/create') ?>"><button class="btn btn-primary pull-right" type="button" data-bs-toggle="tooltip" title="" data-bs-original-title="btn btn-primary">Create Client</button></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="data-source-1" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($clients as $key => $client) {
                                ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $client['name'] ?></td>
                                        <td>
                                            <ul class="action d-flex justify-content-around w-50 text-center mx-auto">
                                                <li class="view"><a href="<?= base_url('companies/' . encode($company_id) . '/clients/' . encode($client['id'])) ?>"><i class="icon-eye"></i></a></li>
                                                <li class="edit"> <a href="<?= base_url('companies/' . encode($company_id) . '/clients/edit/' . encode($client['id'])) ?>"><i class="icofont icofont-ui-edit"></i></a></li>
                                                <li class="delete"><a href="<?= base_url('companies/' . encode($company_id) . '/clients/delete/' . encode($client['id'])) ?>"><i class="icofont icofont-trash"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>