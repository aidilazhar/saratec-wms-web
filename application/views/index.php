<div class="container-fluid">
    <div class="row">
        <?php
        foreach ($wires as $key => $wire) {
        ?>
            <div class="col-xl-6">
                <div class="card height-equal">
                    <div class="card-header" style="padding: 15px;">
                        <div class="header-top">
                            <h5><?= $wire['name'] ?> (<?= $wire['companies']['name'] ?>)</h5>
                            <a href="<?= base_url('wires/dashboard/' . encode($wire['id'])) ?>"><button class="btn btn-success">View Wire</button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 row">
                                <div class="col-md-12">
                                    <div class="light-card balance-card">
                                        <div> <span class="f-light">Brand</span>
                                            <h6 class="mt-1 mb-0"><?= $wire['brand'] ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="light-card balance-card">
                                        <div> <span class="f-light">Wire OD</span>
                                            <h6 class="mt-1 mb-0"><?= $wire['size'] ?>"</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="light-card balance-card">
                                        <div> <span class="f-light">Length (New)</span>
                                            <h6 class="mt-1 mb-0"><?= number_format($wire['initial_length']) ?></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="light-card balance-card">
                                        <div> <span class="f-light">1<sup>st</sup> spooling date</span>
                                            <h6 class="mt-1 mb-0"><?= $wire['spooling_date'] ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="recent-chart text-center">
                                    <div id="radial-<?= $key + 1 ?>"></div>
                                    <h1></h1>
                                </div>
                                <div class="balance-profile">
                                    <ul>
                                        <li>
                                            <div class="balance-item success">
                                                <div class="balance-icon-wrap">
                                                    <i data-feather="hash"></i>
                                                </div>
                                                <div>
                                                    <span class="f-12 f-light">Wire Balance(ft)</span>
                                                    <h5><?= number_format($wire['wire_balances']) ?></h5>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="balance-item success">
                                                <div class="balance-icon-wrap">
                                                    <i data-feather="clock"></i>
                                                </div>
                                                <div>
                                                    <span class="f-12 f-light">Wire Running</span>
                                                    <h5><?= number_format($wire['total_running_number_hours']) ?> hours</h5>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-light">
                                        <thead>
                                            <tr>
                                                <th scope="col">Date</th>
                                                <th scope="col">Operators</th>
                                                <th scope="col">Drum</th>
                                                <th scope="col">Well Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($wire) && !empty($wire['last_entry'])) {
                                            ?>
                                                <tr>
                                                    <td style="background-color: white; color: initial;" scope="row"><?= date('d M Y', strtotime($wire['last_entry']['issued_at'])) ?></td>
                                                    <td style="background-color: white; color: initial;"><?= $wire['last_entry']['operator_name'] ?></td>
                                                    <td style="background-color: white; color: initial;"><?= $wire['last_entry']['drum_name'] ?></td>
                                                    <td style="background-color: white; color: initial;"><?= $wire['last_entry']['well_name'] ?></td>
                                                </tr>
                                            <?php
                                            } else {
                                            ?>
                                                <tr>
                                                    <td class="text-center" colspan="6">No data found</td>
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
        <?php
        }
        ?>

    </div>
</div>