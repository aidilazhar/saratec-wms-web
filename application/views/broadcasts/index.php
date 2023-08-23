<div class="container-fluid">
    <div class="row">
        <!-- HTML (DOM) sourced data  Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5><?= $page['subtitle'] ?></h5>
                    <?php
                    if (permission('Create Broadcasts')) {
                    ?>
                        <a href="<?= base_url("broadcasts/create") ?>"><button class="btn btn-primary pull-right" type="button" data-bs-toggle="tooltip" title="" data-bs-original-title="btn btn-primary">Create Broadcast</button></a>
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
                                foreach ($broadcasts as $key => $broadcast) {
                                ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $broadcast['message'] ?></td>
                                        <td>
                                            <ul class="action d-flex justify-content-around w-50 text-center mx-auto">
                                                <?php
                                                if (permission('Show Broadcasts')) {
                                                ?>
                                                    <li class="view"><a href="<?= base_url('broadcasts/' . encode($broadcast['id'])) ?>"><i class="icon-eye"></i></a></li>
                                                <?php
                                                }
                                                if (permission('Edit Broadcasts')) {
                                                ?>
                                                    <li class="edit"> <a href="<?= base_url('broadcasts/edit/' . encode($broadcast['id'])) ?>"><i class="icofont icofont-ui-edit"></i></a></li>
                                                <?php
                                                }
                                                if (permission('Delete Broadcasts')) {
                                                ?>
                                                    <li class="delete"><a href="<?= base_url('broadcasts/delete/' . encode($broadcast['id'])) ?>"><i class="icofont icofont-trash"></i></a></li>
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