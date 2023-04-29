<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 project-list">
            <div class="card bg-dark">
                <div class="row">
                    <ul class="nav nav-tabs border-tab d-flex justify-content-around" id="top-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link txt-white text-center" href="<?= base_url("wires/dashboard/" . encode($wire['id'])) ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link txt-white text-center" href="<?= base_url("wires/dashboard/material-certifications/" . encode($wire['id'])) ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">Material Certifications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link txt-primary text-center" href="<?= base_url("wires/dashboard/other-reports/" . encode($wire['id'])) ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">Inspection and Other Reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link txt-white text-center" href="<?= base_url("wires/dashboard/third-party-data/" . encode($wire['id'])) ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">3<sup>rd </sup>&nbsp;Party Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link txt-white text-center" href="<?= base_url("wires/dashboard/tech-sheets/" . encode($wire['id'])) ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">Tech Sheet</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5><?= $page['subtitle'] ?></h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="data-source-1" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Issued By</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($reports as $key => $report) {
                                ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $report['date'] ?></td>
                                        <td><?= $report['description'] ?></td>
                                        <td><?= $report['category'] ?></td>
                                        <td><?= $report['issued_by'] ?></td>
                                        <td>
                                            <ul class="action d-flex justify-content-around w-50 text-center mx-auto">
                                                <li class="view"><a target="_blank" href="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf"><i class="icon-eye"></i></a></li>
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