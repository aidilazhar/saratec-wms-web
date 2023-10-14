<div class="col-12">
    <div class="card social-profile">
        <div class="card-body">
            <div class="inbox-user mb-3 text-center">
                <div class="rounded-border">
                    <img class="social-img" src="https://ui-avatars.com/api/?name=<?= auth()->name ?>&size=35&bold=true" alt="user">
                </div>
                <div>
                    <h5 class="mb-1 d-block">
                        <a href="social-app.html"><?= auth()->name ?></a>
                    </h5>
                    <span class="f-light"><?= auth()->roles['name'] ?></span>
                </div>
            </div>
            <!-- <div class="social-img-wrap">
                                        <div class="social-img"><img src="https://ui-avatars.com/api/?name=<?= auth()->name ?>&size=35&bold=true" alt="profile"></div>
                                    </div>
                                    <div class="social-details">
                                        <h5 class="mb-1"><a href="social-app.html"><?= auth()->name ?></a></h5><span class="f-light"><?= auth()->roles['name'] ?></span>
                                    </div> -->
            <hr>
            <?php
            $profile = profile();
            $shift = $profile['shift'];
            $activities = $profile['activities'];
            ?>
            <div style="text-align: left">
                <?php
                if (!empty($shift)) {
                ?>
                    <span class="f-w-600 mb-2 d-block">Assignment:</span>
                    <p>
                        <b>Job #:</b> <?= $shift['package']['name'] ?><br>
                        <b>Shift:</b> <?= ucwords($shift['shift']) ?><br>
                        <b>Operator:</b> <?= $shift['operator_id_data']['name'] ?><br>
                        <b>Assistance 1:</b> <?= $shift['assistant1_id_data']['name'] ?><br>
                        <b>Assistance 2:</b> <?= $shift['assistant2_id_data']['name'] ?><br>
                        <b>Assistance 3:</b> <?= $shift['assistant3_id_data']['name'] ?><br>
                        <b>Client:</b> <?= $shift['client']['name'] ?><br>
                        <b>Client’s Rep:</b> <?= $shift['client']['representative'] ?>

                    </p>
                <?php
                }
                ?>
                <?php
                if (isset($activities[0])) {
                ?>
                    <span class="f-w-600 mb-2 d-block">Latest activity:</span>
                    <p>
                        <?= date('d M Y, h:i A', strtotime($activities[0]['datetime'])) ?><br>
                        <b> Type of job:</b> <?= $activities[0]['job_type_name'] ?><br>
                        <b> Well:</b> <?= $activities[0]['well_name'] ?><br>
                        <b> Status:</b> <?= $activities[0]['status'] ?>
                    </p>
                <?php
                }
                ?>
                <?php
                if (isset($activities[1])) {
                ?>
                    <span class="f-w-600 mb-2 d-block">Previous activity:</span>
                    <p>
                        <?= date('d M Y, h:i A', strtotime($activities[1]['datetime'])) ?><br>
                        <b> Type of job:</b> <?= $activities[1]['job_type_name'] ?><br>
                        <b> Well:</b> <?= $activities[1]['well_name'] ?><br>
                        <b> Status:</b> <?= $activities[1]['status'] ?>
                    </p>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php
$broadcasts = broadcasts();
?>
<div class="col-12">
    <div class="card notification">
        <div class="card-body dark-timeline" style="height: 300px;">
            <?php
            if (count($broadcasts) > 0) {
            ?>
                <ul class="vertical-scroll" style="height: 100%">
                    <?php foreach (broadcasts() as $key => $broadcast) {
                    ?>
                        <li class="d-flex">
                            <div class="activity-dot-primary"></div>
                            <div class="w-100 ms-3">
                                <p class="d-flex justify-content-between mb-2"><span class="date-content light-background"><?= date('d M Y h:i A', strtotime($broadcast['created_at'])) ?></span></p>
                                <p class="f-light"><?= $broadcast['message'] ?></p>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            <?php
            } else {
            ?>
                <p style="text-align: center">No message found</p>
            <?php
            }
            ?>
        </div>
    </div>
</div>