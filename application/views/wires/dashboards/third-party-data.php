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
                            <a class="nav-link txt-white text-center" href="<?= base_url("wires/dashboard/other-reports/" . encode($wire['id'])) ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">Inspection and Other Reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link txt-primary text-center" href="<?= base_url("wires/dashboard/third-party-data/" . encode($wire['id'])) ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">3<sup>rd </sup>&nbsp;Party Data</a>
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
                <div class="card-header">
                    <h5>TENSION vs TIMESTAMP</h5>
                    <span>Start date: <?= date('d M Y', strtotime("-1 month")) ?></span>
                    <span>Last updated: <?= date('d M Y') ?></span>
                </div>
                <div class="card-body">
                    <div id="tension-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>DEPTH vs TIMESTAMP</h5>
                    <span>Start date: <?= date('d M Y', strtotime("-1 month")) ?></span>
                    <span>Last updated: <?= date('d M Y') ?></span>
                </div>
                <div class="card-body">
                    <div id="depth-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>LINE SPEED vs TIMESTAMP</h5>
                    <span>Start date: <?= date('d M Y', strtotime("-1 month")) ?></span>
                    <span>Last updated: <?= date('d M Y') ?></span>
                </div>
                <div class="card-body">
                    <div id="line-speed-chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>