<?php
if ($this->uri->segment(3) == 'third-party-data') {
    $dashboard = "txt-white";
    $material_certifications = "txt-white";
    $reports = "txt-white";
    $third_party_data = "txt-primary";
} else if ($this->uri->segment(3) == 'other-reports') {
    $dashboard = "txt-white";
    $material_certifications = "txt-white";
    $reports = "txt-primary";
    $third_party_data = "txt-white";
} else if ($this->uri->segment(3) == 'material-certifications') {
    $dashboard = "txt-white";
    $material_certifications = "txt-primary";
    $reports = "txt-white";
    $third_party_data = "txt-white";
} else {
    $dashboard = "txt-primary";
    $material_certifications = "txt-white";
    $reports = "txt-white";
    $third_party_data = "txt-white";
}

if ($from == 'index') {
    $url = 'index';
} else {
    $url = '';
}
?>
<div class="col-md-12 project-list">
    <div class="card bg-dark">
        <div class="row">
            <ul class="nav nav-tabs border-tab row" id="top-tab" role="tablist" style="margin-top: 0">
                <li class="nav-item col-sm-3 text-center">
                    <a class="nav-link <?= $dashboard ?> text-center" href="<?= base_url("wires/dashboard/" . encode($wire['id'])) . '/' . $url ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0; display: block">Dashboard</a>
                </li>
                <li class="nav-item col-sm-3 text-center">
                    <a class="nav-link  <?= $material_certifications ?> text-center" href="<?= base_url("wires/dashboard/material-certifications/" . encode($wire['id']) . '/' . $url) ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0; display: block">Material Certifications</a>
                </li>
                <li class="nav-item col-sm-3 text-center">
                    <a class="nav-link  <?= $reports ?> text-center" href="<?= base_url("wires/dashboard/other-reports/" . encode($wire['id'])) . '/' . $url ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0; display: block">Inspection and Other Reports</a>
                </li>
                <li class="nav-item col-sm-3 text-center">
                    <a class="nav-link  <?= $third_party_data ?> text-center" href="<?= base_url("wires/dashboard/third-party-data/" . encode($wire['id'])) . '/mhsi_/' . $url ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0; display: block">Data Log</a>
                </li>
            </ul>
        </div>
    </div>
</div>