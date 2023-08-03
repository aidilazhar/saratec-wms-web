<div class="page-header">
    <div class="header-wrapper row m-0">
        <form class="form-inline search-full col" action="#" method="get">
            <div class="form-group w-100">
                <div class="Typeahead Typeahead--twitterUsers">
                    <div class="u-posRelative">
                        <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
                        <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                    </div>
                    <div class="Typeahead-menu"></div>
                </div>
            </div>
        </form>
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
        <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
            <div class="d-flex h-100">
                <h6 class="mb-0 f-w-400"><span class="font-primary">Hi, <?= auth()->name ?>!</span></h6>
            </div>
        </div>
        <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
            <ul class="nav-menus">
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