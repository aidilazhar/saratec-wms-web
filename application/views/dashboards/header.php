<?php
if ($this->uri->segment(2) == 'third-party-data') {
    $dashboard = "txt-white";
    $material_certifications = "txt-white";
    $reports = "txt-white";
    $third_party_data = "txt-primary";
} else if ($this->uri->segment(2) == 'other-reports') {
    $dashboard = "txt-white";
    $material_certifications = "txt-white";
    $reports = "txt-primary";
    $third_party_data = "txt-white";
} else if ($this->uri->segment(2) == 'material-certifications') {
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
?>
<div class="col-md-12 project-list">
    <div class="card bg-dark">
        <div class="row">
            <ul class="nav nav-tabs border-tab d-flex justify-content-around" id="top-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link <?= $dashboard ?> text-center" href="<?= base_url($wire_name . "/dashboard/") ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $material_certifications ?> text-center" href="<?= base_url($wire_name . "/material-certifications") ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">Material Certifications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $reports ?> text-center" href="<?= base_url($wire_name . "/other-reports/") ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">Inspection and Other Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $third_party_data ?> text-center" href="<?= base_url($wire_name . "/third-party-data/") ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">3<sup>rd </sup>&nbsp;Party Data</a>
                </li>
            </ul>
        </div>
    </div>
</div>