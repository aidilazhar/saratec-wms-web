<div class="container-fluid">
    <div class="row">
        <!-- HTML (DOM) sourced data  Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5><?= $page['subtitle'] ?></h5>
                    <a href="<?= base_url("wires/" . encode($wire_id) . "/trials/create") ?>"><button class="btn btn-primary pull-right" type="button" data-bs-toggle="tooltip" title="" data-bs-original-title="btn btn-primary">Create Trial</button></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="data-source-1" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Operator</th>
                                    <th>Supervisor</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($trials as $key => $trial) {
                                ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $trial['date'] ?>, <?= $trial['time'] ?></td>
                                        <td><?= $trial['operator']['name'] ?></td>
                                        <td><?= $trial['supervisor']['name'] ?></td>
                                        <td>
                                            <ul class="action d-flex justify-content-around w-50 text-center mx-auto">
                                                <li class="view"><a href="<?= base_url('wires/' . encode($trial['wire_id']) . '/trials/' . encode($trial['id'])) ?>"><i class="icon-eye"></i></a></li>
                                                <li class="edit"> <a href="<?= base_url('wires/' . encode($trial['wire_id']) . '/trials/edit/' . encode($trial['id'])) ?>"><i class="icon-pencil-alt"></i></a></li>
                                                <li class="delete"><a href="<?= base_url('wires/' . encode($trial['wire_id']) . '/trials/delete/' . encode($trial['id'])) ?>"><i class="icon-trash"></i></a></li>
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