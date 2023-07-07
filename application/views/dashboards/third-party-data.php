<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 project-list">
            <?php
            $this->load->view('dashboards/header', compact('wire_name'))
            ?>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>TENSION & LINE SPEED & DEPTH vs TIMESTAMP</h5>
                        <div class=" d-flex justify-content-between">
                            <div class="input-group">
                                <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Type</button>
                                <ul class="dropdown-menu" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(0px, 40px);" data-popper-placement="bottom-start">
                                    <li><a class="dropdown-item <?php if ($prefix == 'mhsi_') {
                                                                    echo 'active';
                                                                } ?>" href="<?= base_url($wire_name . '/third-party-data/mhsi_') ?>">MHSI</a></li>
                                    <li><a class="dropdown-item <?php if ($prefix == 'mhi_') {
                                                                    echo 'active';
                                                                } ?>" href="<?= base_url($wire_name . '/third-party-data/mhi_') ?>">MHI</a></li>
                                </ul>
                                <input type="date" class="form-control filter-date" placeholder="Date">
                                <input type="time" class="form-control filter-time-from" placeholder="From">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="border-radius: 0;">to</span>
                                </div>
                                <input type="time" class="form-control filter-time-to" placeholder="To">
                                <div class="input-group-prepend">
                                    <button class="btn btn-primary filter-button" style="font-size: initial !important; border-top-left-radius: 0px; border-bottom-left-radius: 0px; ">Filter</button>
                                </div>
                            </div>
                            <button class="btn btn-danger reset-button d-inline-block">Reset</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                        </figure>
                        <!-- <div id="third-party-data-chart"></div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>