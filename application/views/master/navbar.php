<div class="sidebar-wrapper" sidebar-layout="stroke-svg">
    <div>
        <div class="logo-wrapper">
            <a href="<?= base_url("") ?>">
                <img style="max-height: 40px;" class=" img-fluid for-light" src="<?= base_url("assets/images/logo/logo.png") ?>" alt=""><img style="max-width: 150px" class="img-fluid for-dark" src="<?= base_url("assets/images/logo/logo_dark.png") ?>" alt="">
            </a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="index.html"><img style="max-width: 30px" class="img-fluid" src="<?= base_url("assets/images/logo/logo-icon.png") ?>" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="index.html">
                            <img class="img-fluid" src="<?= base_url("assets/images/logo/logo-icon.png") ?>" alt="">
                        </a>
                        <div class="mobile-back text-end">
                            <span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
                        </div>
                    </li>
                    <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="<?= base_url("/") ?>">
                            <svg class="stroke-icon">
                                <use href="<?= base_url("assets/svg/icon-sprite.svg#stroke-home") ?>"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="<?= base_url("assets/svg/icon-sprite.svg#fill-home") ?>"></use>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="<?= base_url("wires") ?>">
                            <svg class="stroke-icon">
                                <use href="<?= base_url("assets/svg/icon-sprite.svg#stroke-task") ?>"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="<?= base_url("assets/svg/icon-sprite.svg#fill-task") ?>"></use>
                            </svg>
                            <span>Wires</span>
                        </a>
                    </li>
                    <!-- <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="<?= base_url("packages") ?>">
                            <svg class="stroke-icon">
                                <use href="<?= base_url("assets/svg/icon-sprite.svg#stroke-board") ?>"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="<?= base_url("assets/svg/icon-sprite.svg#fill-board") ?>"></use>
                            </svg>
                            <span>Packages</span>
                        </a>
                    </li> -->
                    <!-- <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="<?= base_url("job-types") ?>">
                            <svg class="stroke-icon">
                                <use href="<?= base_url("assets/svg/icon-sprite.svg#stroke-knowledgebase") ?>"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="<?= base_url("assets/svg/icon-sprite.svg#fill-knowledgebase") ?>"></use>
                            </svg>
                            <span>Job Types</span>
                        </a>
                    </li> -->
                    <!-- <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="<?= base_url("drums") ?>">
                            <svg class="stroke-icon">
                                <use href="<?= base_url("assets/svg/icon-sprite.svg#stroke-support-tickets") ?>"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="<?= base_url("assets/svg/icon-sprite.svg#fill-support-tickets") ?>"></use>
                            </svg>
                            <span>Drums</span>
                        </a>
                    </li> -->
                    <!-- <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="<?= base_url("clients") ?>">
                            <svg class="stroke-icon">
                                <use href="<?= base_url("assets/svg/icon-sprite.svg#stroke-social") ?>"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="<?= base_url("assets/svg/icon-sprite.svg#fill-social") ?>"></use>
                            </svg>
                            <span>Clients</span>
                        </a>
                    </li> -->
                    <!-- <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="<?= base_url("users") ?>">
                            <svg class="stroke-icon">
                                <use href="<?= base_url("assets/svg/icon-sprite.svg#stroke-user") ?>"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="<?= base_url("assets/svg/icon-sprite.svg#fill-user") ?>"></use>
                            </svg>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title link-nav" href="<?= base_url("roles") ?>">
                            <svg class="stroke-icon">
                                <use href="<?= base_url("assets/svg/icon-sprite.svg#stroke-blog") ?>"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="<?= base_url("assets/svg/icon-sprite.svg#fill-blog") ?>"></use>
                            </svg>
                            <span>Roles</span>
                        </a>
                    </li> -->
                    <li class="sidebar-list">
                        <i class="fa fa-thumb-tack"></i>
                        <a class="sidebar-link sidebar-title" href="#">
                            <svg class="stroke-icon">
                                <use href="<?= base_url("assets/svg/icon-sprite.svg#stroke-others") ?>"></use>
                            </svg>
                            <svg class="fill-icon">
                                <use href="<?= base_url("assets/svg/icon-sprite.svg#fill-others") ?>"></use>
                            </svg><span>Admin</span>
                        </a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?= base_url("packages") ?>">Packages</a></li>
                            <li><a href="<?= base_url("job-types") ?>">Job Types</a></li>
                            <li><a href="<?= base_url("drums") ?>">Drums</a></li>
                            <li><a href="<?= base_url("companies") ?>">Companies</a></li>
                            <li><a href="<?= base_url("users") ?>">Users</a></li>
                            <li><a href="<?= base_url("roles") ?>">Roles</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>