<div class="container-fluid">
    <div class="row">
        <?php
        $this->load->view('wires/dashboards/header', compact('wire'))
        ?>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Wire's Material Certifications</h5>
                </div>
                <div class="card-body text-center mx-auto">
                    <?php
                    if (!is_null($base64_material_ceritification)) {
                    ?>
                        <div class="d-flex justify-content-between mb-2">
                            <button class="btn btn-square btn-primary" type="button" title="" data-bs-original-title="btn btn-square btn-primary btn-lg" onclick="RenderPDF('<?= $base64_material_ceritification ?>', -1, 'pdfview_material_certifications')">
                                <i class="icon-arrow-left"></i>
                            </button>
                            <div>
                                Page
                                <span id="pageNum" class="mt-2">1</span>
                                /
                                <span id="pageLength" class="mt-2">1</span>
                            </div>
                            <button class="btn btn-square btn-primary" type="button" title="" data-bs-original-title="btn btn-square btn-primary btn-lg" onclick="RenderPDF('<?= $base64_material_ceritification ?>', 1, 'pdfview_material_certifications')">
                                <i class="icon-arrow-right"></i>
                            </button>
                        </div>
                        <canvas style="width: 100%;" id="pdfview_material_certifications"></canvas>
                    <?php
                    } else {
                    ?>
                        <label>No material certifications found</label>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Wire's Eddy Current</h5>
                </div>
                <div class="card-body text-center mx-auto">
                    <?php
                    if (!is_null($base64_eddy_current)) {
                    ?>
                        <div class="d-flex justify-content-between mb-2">
                            <button class="btn btn-square btn-primary" type="button" title="" data-bs-original-title="btn btn-square btn-primary btn-lg" onclick="RenderPDF('<?= $base64_eddy_current ?>', -1, 'pdfview_eddy_current')">
                                <i class="icon-arrow-left"></i>
                            </button>
                            <div>
                                Page
                                <span id="pageNum" class="mt-2">1</span>
                                /
                                <span id="pageLength" class="mt-2">1</span>
                            </div>
                            <button class="btn btn-square btn-primary" type="button" title="" data-bs-original-title="btn btn-square btn-primary btn-lg" onclick="RenderPDF('<?= $base64_eddy_current ?>', 1, 'pdfview_eddy_current')">
                                <i class="icon-arrow-right"></i>
                            </button>
                        </div>
                        <canvas style="width: 100%;" id="pdfview_eddy_current"></canvas>
                    <?php
                    } else {
                    ?>
                        <label>No eddy current found</label>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>