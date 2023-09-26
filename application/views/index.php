<style>
    .light-card {
        margin-bottom: 10px;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <?php
        foreach ($wires as $key => $wire) {
            if ($wire['wire_balances'] < 15999) {
                $color = "#dc3545";
            } elseif ($wire['wire_balances'] >= 16000 && $wire['wire_balances'] < 20000) {
                $color = "#ffc107";
            } else {
                $color = "#198754";
            }
        ?>
            <div class="col-lg-4 col-sm-6">
                <a href="<?= base_url('wires/dashboard/' . encode($wire['id'])) ?>/index">
                    <div class=" card height-equal" style="max-height: 300px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="text-center mb-3">
                                        <h5><?= $wire['name'] ?></h5>
                                    </div>
                                    <div class="recent-chart text-center">
                                        <div class="circle-container">
                                            <div class="progress-bar" style="background: radial-gradient(closest-side, white 79%, transparent 80% 100%), conic-gradient(<?= $color ?> <?= $wire['wire_balances_percent'] ?>%, pink 0);">
                                                <label>
                                                    <?= number_format($wire['wire_balances'], 2) ?> ft
                                                </label>
                                                <label>
                                                    <?= $wire['drums']['name'] ?>
                                                </label>
                                                <label>
                                                    <?= $wire['packages']['name'] ?>
                                                </label>
                                                <progress value="<?= $wire['wire_balances_percent'] ?>" min="0" max="100" style="visibility:hidden;height:0;width:0;"></progress>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

            </div>
        <?php
        }
        ?>

    </div>
</div>