<div class="container-fluid">
    <div class="row">
        <?php
        $this->load->view('wires/dashboards/header', compact('wire'))
        ?>
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