<div class="container-fluid">
    <div class="row">
        <?php
        $this->load->view('wires/dashboards/header', compact('wire'))
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
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Issued By</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($reports as $key => $report) {
                                ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= date('d M Y', strtotime($report['issued_at'])) ?></td>
                                        <td><?= $report['description'] ?></td>
                                        <td><?= $report['category'] ?></td>
                                        <td>
                                            <?= $report['issued_by'] ?>
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