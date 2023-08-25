<div class="container-fluid" style="margin-top: 150px;">
    <div class="row">
        <?php
        $this->load->view('dashboards/header', compact('wire_name'))
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
                        <div class="d-flex justify-content-between">
                            <button style="width: 200px" class="btn btn-square btn-primary btn-lg mb-2" type="button" title="" data-bs-original-title="btn btn-square btn-primary btn-lg" onclick="RenderPDF('<?= $base64_material_ceritification ?>', -1, 'pdfview_material_certifications')">Prev</button>
                            <div>
                                Page
                                <span id="pageNum" class="mt-2">1</span>
                                /
                                <span id="pageLength" class="mt-2">1</span>
                            </div>
                            <button style="width: 200px" class="btn btn-square btn-primary btn-lg mb-2" type="button" title="" data-bs-original-title="btn btn-square btn-primary btn-lg" onclick="RenderPDF('<?= $base64_material_ceritification ?>', 1, 'pdfview_material_certifications')">Next</button>
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
                        <div class="d-flex justify-content-between">
                            <button style="width: 200px" class="btn btn-square btn-primary btn-lg mb-2" type="button" title="" data-bs-original-title="btn btn-square btn-primary btn-lg" onclick="RenderPDF('<?= $base64_eddy_current ?>', -1, 'pdfview_eddy_current')">Prev</button>
                            <div>
                                Page
                                <span id="pageNum" class="mt-2">1</span>
                                /
                                <span id="pageLength" class="mt-2">1</span>
                            </div>
                            <button style="width: 200px" class="btn btn-square btn-primary btn-lg mb-2" type="button" title="" data-bs-original-title="btn btn-square btn-primary btn-lg" onclick="RenderPDF('<?= $base64_eddy_current ?>', 1, 'pdfview_eddy_current')">Next</button>
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