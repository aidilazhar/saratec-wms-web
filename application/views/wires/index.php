<div class="container-fluid">
    <div class="row">
        <!-- HTML (DOM) sourced data  Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5><?= $page['subtitle'] ?></h5>
                    <?php
                    if (permission('Edit Wires')) {
                    ?>
                        <a href="<?= base_url("wires/create") ?>"><button class="btn btn-primary pull-right" type="button" data-bs-toggle="tooltip" title="" data-bs-original-title="btn btn-primary">Create Wire</button></a>
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
                                    <th>URL</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($wires as $key => $wire) {
                                ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $wire['name'] ?></td>
                                        <td>
                                            <a target="_blank" href="<?= base_url() ?><?= $wire['url'] ?>/dashboard"><?= base_url() ?><?= $wire['url'] ?>/dashboard</a>
                                        </td>
                                        <td>
                                            <ul class="action d-flex justify-content-around w-50 text-center mx-auto">
                                                <?php
                                                if (permission('Manage Trials')) {
                                                ?>
                                                    <li class="dashboard"><a href="<?= base_url('wires/' . encode($wire['id'])) . '/trials' ?>"><i class="icon-agenda"></i></a></li>
                                                <?php
                                                }
                                                if (permission('View Dashboard')) {
                                                ?>
                                                    <li class="warning"><a href="<?= base_url('wires/dashboard/' . encode($wire['id'])) ?>"><i class="icon-bar-chart"></i></a></li>
                                                <?php
                                                }
                                                if (permission('Manage Documents')) {
                                                ?>
                                                    <li class="dashboard""><a href=" <?= base_url('wires/' . encode($wire['id'])) . '/reports' ?>"><i style="color: #FFAA05;" class="icon-files"></i></a></li>
                                                <?php
                                                }
                                                if (permission('Manage Lab Tests')) {
                                                ?>
                                                    <li class="dashboard""><a href=" <?= base_url('wires/' . encode($wire['id'])) . '/lab-tests' ?>"><i style="color: #FFAA05;" class="icon-agenda"></i></a></li>
                                                <?php
                                                }
                                                if (permission('Show Wires')) {
                                                ?>
                                                    <li class="view"><a href="<?= base_url('wires/' . encode($wire['id'])) ?>"><i class="icon-eye"></i></a></li>
                                                <?php
                                                }
                                                if (permission('Edit Wires')) {
                                                ?>
                                                    <li class="edit"> <a href="<?= base_url('wires/edit/' . encode($wire['id'])) ?>"><i class="icofont icofont-ui-edit"></i></a></li>
                                                <?php
                                                }
                                                if (permission('Delete Wires')) {
                                                ?>
                                                    <li class="delete"><a href="<?= base_url('wires/delete/' . encode($wire['id'])) ?>"><i class="icofont icofont-trash"></i></a></li>
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