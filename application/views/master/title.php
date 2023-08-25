<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 d-flex">
                <?php
                if (!is_null($page['back'])) {
                ?>
                    <a href="<?= $page['back'] ?>">
                        <i class="icofont icofont-arrow-left text-decoration-none" style="font-size: 30px; margin-right: 20px; color: black"></i>
                    </a>
                <?php
                }
                ?>
                <h3>

                    <?= $page['title'] ?>
                </h3>
            </div>
            <!-- <div class="col-12">
                <div class="w-100" style="position: relative; display: inline-block">
                    <div class="advertisement">
                        <?php
                        $profile = profile();
                        foreach ($profile['jobs'] as $key => $job) {
                        ?>
                            <span style="display: inline-block">
                                Out new update has been release.
                            </span>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>