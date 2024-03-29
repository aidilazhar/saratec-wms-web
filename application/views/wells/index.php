<div class="container-fluid">
    <div class="row">
        <!-- HTML (DOM) sourced data  Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5><?= $page['subtitle'] ?></h5>
                    <?php
                    if (permission('Create Wells')) {
                    ?>
                        <a href="<?= base_url("wells/create") ?>"><button class="btn btn-primary pull-right" type="button" data-bs-toggle="tooltip" title="" data-bs-original-title="btn btn-primary">Create Well</button></a>
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
                                foreach ($wells as $key => $well) {
                                ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $well['name'] ?></td>
                                        <td>
                                            <ul class="action d-flex justify-content-around w-50 text-center mx-auto">
                                                <?php
                                                if (permission('Show Wells')) {
                                                ?>
                                                    <li class="view"><a href="<?= base_url('wells/' . encode($well['id'])) ?>"><i class="icon-eye"></i></a></li>
                                                <?php
                                                }
                                                if (permission('Edit Wells')) {
                                                ?>
                                                    <li class="edit"> <a href="<?= base_url('wells/edit/' . encode($well['id'])) ?>"><i class="icofont icofont-ui-edit"></i></a></li>
                                                <?php
                                                }
                                                if (permission('Delete Wells')) {
                                                ?>
                                                    <li class="delete"><a href="#" data-href="<?= base_url('wells/delete/' . encode($well['id'])) ?>"><i class="icofont icofont-trash"></i></a></li>
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