<div class="container-fluid">
    <div class="row">
        <!-- HTML (DOM) sourced data  Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5><?= $page['subtitle'] ?></h5>
                    <?php
                    if (permission('Create Trials')) {
                    ?>
                        <a href="<?= base_url("wires/" . encode($wire_id) . "/trials/create") ?>"><button class="btn btn-primary pull-right" type="button" data-bs-toggle="tooltip" title="" data-bs-original-title="btn btn-primary">Create Record</button></a>
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
                                    <th>Job Type</th>
                                    <th>Wrap Test</th>
                                    <th>Pull Test</th>
                                    <th>X(inches)</th>
                                    <th>Y(inches)</th>
                                    <th>Duration(s)</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($trials as $key => $trial) {
                                ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= date('d M Y h:i A', strtotime($trial['issued_at'])) ?></td>
                                        <td><?= $trial['job_type_name'] ?></td>
                                        <td><?= $trial['wrap_test'] ?></td>
                                        <td><?= $trial['pull_test'] ?></td>
                                        <td><?= $trial['x_inch'] ?></td>
                                        <td><?= $trial['y_inch'] ?></td>
                                        <td><?= $trial['duration'] ?></td>
                                        <td>
                                            <ul class="action d-flex justify-content-around w-50 text-center mx-auto">
                                                <?php
                                                if (permission('Show Trials')) {
                                                ?>
                                                    <li class="view"><a href="<?= base_url('wires/' . encode($trial['wire_id']) . '/trials/' . encode($trial['id'])) ?>"><i class="icon-eye"></i></a></li>
                                                <?php
                                                }
                                                if (permission('Edit Trials')) {
                                                ?>
                                                    <li class="edit"> <a href="<?= base_url('wires/' . encode($trial['wire_id']) . '/trials/edit/' . encode($trial['id'])) ?>"><i class="icofont icofont-ui-edit"></i></a></li>
                                                <?php
                                                }
                                                if (permission('Delete Trials')) {
                                                ?>
                                                    <li class="delete"><a href="<?= base_url('wires/' . encode($trial['wire_id']) . '/trials/delete/' . encode($trial['id'])) ?>"><i class="icofont icofont-trash"></i></a></li>
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