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
                            <a class="nav-link txt-primary text-center" href="<?= base_url("wires/dashboard/material-certifications/" . encode($wire['id'])) ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">Material Certifications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link txt-white text-center" href="<?= base_url("wires/dashboard/other-reports/" . encode($wire['id'])) ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">Inspection and Other Reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link txt-white text-center" href="<?= base_url("wires/dashboard/third-party-data/" . encode($wire['id'])) ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">3<sup>rd </sup>&nbsp;Party Data</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link txt-white text-center" href="<?= base_url("wires/dashboard/tech-sheets/" . encode($wire['id'])) ?>" role="tab" aria-controls="top-home" aria-selected="false" style="padding: 5px 0 5px 0">Eddy Current</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 text-center mx-auto">
            <div class="d-flex justify-content-between">
                <button style="width: 200px" class="btn btn-square btn-primary btn-lg mb-2" type="button" title="" data-bs-original-title="btn btn-square btn-primary btn-lg" onclick="RenderPDF('<?= $base64 ?>', -1)">Prev</button>
                <div>
                    Page
                    <span id="pageNum" class="mt-2">1</span>
                    /
                    <span id="pageLength" class="mt-2">1</span>
                </div>
                <button style="width: 200px" class="btn btn-square btn-primary btn-lg mb-2" type="button" title="" data-bs-original-title="btn btn-square btn-primary btn-lg" onclick="RenderPDF('<?= $base64 ?>', 1)">Next</button>
            </div>
            <canvas style="width: 100%;" id="pdfview"></canvas>
        </div>
    </div>
</div>