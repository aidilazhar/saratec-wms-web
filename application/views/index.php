<div class="container-fluid">
    <div class="row">
        <?php
        foreach ($wires as $wire) {
        ?>
            <div class="col-xl-6">
                <div class="card height-equal">
                    <div class="card-header" style="padding: 15px;">
                        <div class="header-top">
                            <h5>CWR-1278</h5>
                            <a href="<?= base_url('wires/dashboard/' . encode($wire['id'])) ?>"><button class="btn btn-success">View Wire</button></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 row">
                                <div class="col-xl-12 col-md-6 col-sm-4">
                                    <div class="light-card balance-card">
                                        <div> <span class="f-light">Brand</span>
                                            <h6 class="mt-1 mb-0">SUPA75</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 col-sm-4">
                                    <div class="light-card balance-card">
                                        <div> <span class="f-light">Wire OD</span>
                                            <h6 class="mt-1 mb-0">0.108"</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 col-sm-4">
                                    <div class="light-card balance-card">
                                        <div> <span class="f-light">Length</span>
                                            <h6 class="mt-1 mb-0"> 25,267 FT(New)</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-md-6 col-sm-4">
                                    <div class="light-card balance-card">
                                        <div> <span class="f-light">1<sup>st</sup> Spooling</span>
                                            <h6 class="mt-1 mb-0"><?= date('d M Y') ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="recent-chart text-center">
                                    <div id="radial-2"></div>
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
                                                    <h5>16,945</h5>
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
                                                    <h5>210 hours</h5>
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
                                                <th scope="col">Job Date</th>
                                                <th scope="col">Operators</th>
                                                <th scope="col">Package</th>
                                                <th scope="col">Drum</th>
                                                <th scope="col">Type of Job</th>
                                                <th scope="col">Well Name</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="background-color: white; color: initial;" scope="row"><?= date('d M Y') ?></td>
                                                <td style="background-color: white; color: initial;">Azman</td>
                                                <td style="background-color: white; color: initial;">Vest-1</td>
                                                <td style="background-color: white; color: initial;">D5</td>
                                                <td style="background-color: white; color: initial;">FlapperProbeCheck</td>
                                                <td style="background-color: white; color: initial;">A-27L</td>
                                            </tr>
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