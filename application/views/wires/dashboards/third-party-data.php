<?php
if ($from == 'index') {
    $url = 'index';
} else {
    $url = '';
}
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 project-list">
            <?php
            $this->load->view('wires/dashboards/header', compact('wire'))
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
                                                                } ?>" href="<?= base_url('wires/dashboard/third-party-data/' . encode($wire['id']) . '/mhsi_/' . $url) ?>">MHSI</a></li>
                                    <li><a class="dropdown-item <?php if ($prefix == 'mhi_') {
                                                                    echo 'active';
                                                                } ?>" href="<?= base_url('wires/dashboard/third-party-data/' . encode($wire['id']) . '/mhi_/' . $url) ?>">MHI</a></li>
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
                        <?php
                        if (!is_null($smart_monitor_id)) {
                        ?>
                            <figure class="highcharts-figure">
                                <div id="container"></div>
                            </figure>
                        <?php
                        }
                        ?>
                        <table class="data-table" id="data-source-1" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Well</th>
                                    <th>Client</th>
                                    <th>Operator</th>
                                    <th>Type of Job</th>
                                    <th>Cut off (ft)</th>
                                    <th># of Jar</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($smart_monitors as $key => $smart_monitor) {
                                ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= date('d M Y, h:i A', strtotime($smart_monitor['trial']['issued_at'])) ?></td>
                                        <td><?= $smart_monitor['trial']['well_name'] ?></td>
                                        <td><?= $smart_monitor['trial']['client_name'] ?></td>
                                        <td>
                                            <?= $smart_monitor['trial']['operator_name'] ?>
                                        </td>
                                        <td>
                                            <?= $smart_monitor['trial']['job_type_name'] ?>
                                        </td>
                                        <td>
                                            <?= $smart_monitor['trial']['cut_off'] ?>
                                        </td>
                                        <td>
                                            <?= $smart_monitor['trial']['jar_number'] ?>
                                        </td>
                                        <td>
                                            <ul class="action d-flex justify-content-around w-50 text-center mx-auto">
                                                <li class="view"><a href="<?= base_url("wires/dashboard/third-party-data/" . encode($wire['id'])) . '/mhsi_/' . $url ?>?smart_monitor=<?= encode($smart_monitor['id']) ?>"><i class="icon-bar-chart"></i></a></li>
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