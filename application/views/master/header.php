<div class="page-header">
    <div class="header-wrapper row m-0">
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper">
                <a href="<?= base_url('') ?>">
                    <img class="img-fluid" src="<?= base_url("assets/images/logo/logo.png") ?>" alt="">
                </a>
            </div>
            <div class="toggle-sidebar">
                <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
            </div>
        </div>
        <div class="nav-right col-xxl-10 col-xl-10 col-md-10 col-10 pull-right right-header p-0 ms-auto">
            <ul class="nav-menus">
                <img style="height: 50px;" class=" mx-auto text-center" src="<?= base_url("assets/images/logo/logo.png") ?>" alt="">
                <li class="profile-nav onhover-dropdown pe-0 py-0">
                    <div class="media profile-media"><img class="b-r-10" src="https://ui-avatars.com/api/?name=<?= auth()->name ?>&size=35&bold=true" alt="">
                        <div class=" media-body"><span><?= auth()->username ?></span>
                            <p class="mb-0 font-roboto"><?= auth()->role_name ?> <i class="middle fa fa-angle-down"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        <li><a href="<?= base_url('logout') ?>"><i data-feather="log-out"> </i><span>Logout</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>