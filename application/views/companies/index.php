<div class="container-fluid">
    <div class="row">
        <!-- HTML (DOM) sourced data  Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5><?= $page['subtitle'] ?></h5>
                    <?php
                    if (permission('Create Companies')) {
                    ?>
                        <a href="<?= base_url("companies/create") ?>"><button class="btn btn-primary pull-right" type="button" data-bs-toggle="tooltip" title="" data-bs-original-title="btn btn-primary">Create Company</button></a>
                    <?php
                    }
                    ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="data-table" id="data-source-1" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($companies as $key => $company) {
                                ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $company['name'] ?></td>
                                        <td>
                                            <ul class="action d-flex justify-content-around w-50 text-center mx-auto">
                                                <?php
                                                if (permission('Manage Clients')) {
                                                ?>
                                                    <li class="dashboard">
                                                        <a href="<?= base_url('companies/' . encode($company['id']) . '/clients') ?>">
                                                            <i class="icofont icofont-company"></i>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                if (permission('Manage Company\'s Users')) {
                                                ?>
                                                    <li class="warning">
                                                        <a href="<?= base_url('companies/' . encode($company['id']) . '/users') ?>">
                                                            <i class="icofont icofont-users"></i>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                if (permission('Show Companies')) {
                                                ?>
                                                    <li class="view">
                                                        <a href="<?= base_url('companies/' . encode($company['id'])) ?>">
                                                            <i class="icon-eye"></i>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                if (permission('Edit Companies')) {
                                                ?>
                                                    <li class="edit">
                                                        <a href="<?= base_url('companies/edit/' . encode($company['id'])) ?>">
                                                            <i class="icofont icofont-ui-edit"></i>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                if (permission('Delete Companies')) {
                                                ?>
                                                    <li class="delete">
                                                        <a href="<?= base_url('companies/delete/' . encode($company['id'])) ?>">
                                                            <i class="icofont icofont-trash"></i>
                                                        </a>
                                                    </li>
                                                <?php
                                                }
                                                ?>
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