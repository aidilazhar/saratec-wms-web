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
            <div class="col-12">
                <div>
                    <div class="job-container">
                        <?php
                        $profile = profile();
                        foreach ($profile['jobs'] as $key => $job) {
                        ?>
                            <span class="job-span">
                                <?= $job['package_name'] ?>: <?= date('d/m/Y, h:i A', strtotime($job['datetime'])) ?> <?= $job['well_name'] ?> - <?= $job['job_type_name'] ?>
                            </span>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>