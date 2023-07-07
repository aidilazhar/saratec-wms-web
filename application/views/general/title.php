<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6 d-flex">
                <?php
                if (!is_null($page['back'])) {
                ?>
                    <a href="<?= $page['back'] ?>">
                        <i class="icofont icofont-arrow-left text-decoration-none" style="font-size: 30px; margin-right: 20px; color: black"></i>
                    </a>
                <?php
                }
                ?>
                <h3><?= $page['title'] ?></h3>
            </div>
        </div>
    </div>
</div>