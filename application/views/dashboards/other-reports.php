<div class="container-fluid" style="margin-top: 150px;">
    <div class="row">
        <?php
        $this->load->view('dashboards/header', compact('wire_name'))
        ?>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5><?= $page['subtitle'] ?></h5>
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
                                                <li class="view"><a target="_blank" href=" <?= temp_url($report['url']) ?>"><i class="icon-eye"></i></a></li>
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