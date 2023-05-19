<div class="container-fluid">
    <div class="row">
        <!-- HTML (DOM) sourced data  Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5><?= $page['subtitle'] ?></h5>
                    <a href="<?= base_url("fields/create") ?>"><button class="btn btn-primary pull-right" type="button" data-bs-toggle="tooltip" title="" data-bs-original-title="btn btn-primary">Create Field</button></a>
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
                                foreach ($fields as $key => $field) {
                                ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $field['name'] ?></td>
                                        <td>
                                            <ul class="action d-flex justify-content-around w-50 text-center mx-auto">
                                                <li class="view"><a href="<?= base_url('fields/' . encode($field['id'])) ?>"><i class="icon-eye"></i></a></li>
                                                <li class="edit"> <a href="<?= base_url('fields/edit/' . encode($field['id'])) ?>"><i class="icofont icofont-ui-edit"></i></a></li>
                                                <li class="delete"><a href="<?= base_url('fields/delete/' . encode($field['id'])) ?>"><i class="icofont icofont-trash"></i></a></li>
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