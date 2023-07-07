<div class="container-fluid">
    <div class="row">
        <!-- HTML (DOM) sourced data  Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5><?= $page['subtitle'] ?></h5>
                    <?php
                    if (permission('Add Lab Tests')) {
                    ?>
                        <a href="<?= base_url('wires/' . encode($wire['id']) . '/lab-tests/create') ?>"><button class="btn btn-primary pull-right" type="button" data-bs-toggle="tooltip" title="" data-bs-original-title="btn btn-primary">Add Lab Test</button></a>
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
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Job Status</th>
                                    <th>Report Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($lab_tests as $key => $lab_test) {
                                ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= date('d M Y', strtotime($lab_test['issued_at'])) ?></td>
                                        <td><?= $lab_test['description'] ?></td>
                                        <td><?= $lab_test['job_status'] ?></td>
                                        <td><?= $lab_test['report_status'] ?></td>
                                        <td>
                                            <ul class="action d-flex justify-content-around w-50 text-center mx-auto">
                                                <?php
                                                if (permission('Edit Lab Tests')) {
                                                ?>
                                                    <li class="edit"> <a href="<?= base_url('wires/' . encode($lab_test['wire_id']) . '/lab-tests/edit/' . encode($lab_test['id'])) ?>"><i class="icofont icofont-ui-edit"></i></a></li>
                                                <?php
                                                }
                                                if (permission('Delete Lab Tests')) {
                                                ?>
                                                    <li class="delete"><a href="<?= base_url('wires/' . encode($lab_test['wire_id']) . '/lab-tests/delete/' . encode($lab_test['id'])) ?>"><i class="icofont icofont-trash"></i></a></li>
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