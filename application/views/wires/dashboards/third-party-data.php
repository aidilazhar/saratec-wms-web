<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 project-list">
            <?php
            $this->load->view('wires/dashboards/header', compact('wire'))
            ?>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>TENSION & LINE SPEED & DEPTH vs TIMESTAMP</h5>
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