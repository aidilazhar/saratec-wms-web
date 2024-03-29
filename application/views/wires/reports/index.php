<div class="container-fluid">
    <div class="row">
        <!-- HTML (DOM) sourced data  Starts-->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5><?= $page['subtitle'] ?></h5>
                    <?php
                    if (permission('Add Documents')) {
                    ?>
                        <a href="<?= base_url('wires/' . encode($wire['id']) . '/reports/create') ?>"><button class="btn btn-primary pull-right" type="button" data-bs-toggle="tooltip" title="" data-bs-original-title="btn btn-primary">Add Report</button></a>
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
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Issued At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($reports as $key => $report) {
                                ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $report['name'] ?></td>
                                        <td><?= $report['description'] ?></td>
                                        <td><?= $report['category'] ?></td>
                                        <td>
                                            <?= date('d M Y, h:i A', strtotime($report['issued_at'])) ?>
                                        </td>
                                        <td>
                                            <ul class="action d-flex justify-content-around w-50 text-center mx-auto">
                                                <?php
                                                if (permission('View Documents')) {
                                                ?>
                                                    <li class="view"><a target="_blank" href=" <?= temp_url($report['url']) ?>"><i class="icon-eye"></i></a></li>
                                                <?php
                                                }
                                                if (permission('Edit Documents')) {
                                                ?>
                                                    <li class="edit"><a href="<?= base_url('wires/' . encode($report['wire_id']) . '/reports/edit/' . encode($report['id'])) ?>"><i class="icofont icofont-ui-edit"></i></a></li>
                                                <?php
                                                }
                                                if (permission('Delete Documents')) {
                                                ?>
                                                    <li class="delete"><a href="#" data-href="<?= base_url('wires/' . encode($report['wire_id']) . '/reports/delete/' . encode($report['id'])) ?>"><i class="icofont icofont-trash"></i></a></li>
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