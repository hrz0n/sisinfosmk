<nav class="navbar header-navbar pcoded-header">
    <div class="navbar-wrapper">
        <div class="navbar-logo">
            <a class="mobile-menu" id="mobile-collapse" href="#!">
                <i class="feather icon-menu"></i>
            </a>
            <a href="<?= base_url('admin/index.html');?>">
                <img class="img-fluid" src="<?= base_url('images/logo.png'); ?>" alt="Theme-Logo" />
            </a>
            <a class="mobile-options">
                <i class="feather icon-more-horizontal"></i>
            </a>
        </div>
        <div class="navbar-container">
            <ul class="nav-left">
                <li class="header-search">
                    <div class="main-search morphsearch-search">
                        NAMA SEKOLAH NEGERI
                    </div>
                </li>
                
            </ul>
            <ul class="nav-right">
                <li class="user-profile header-notification">
                    <div class="dropdown-primary dropdown">
                        <div class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= base_url('images/nouser.png'); ?>" class="img-radius" alt="User-Profile-Image">
                            <span><?= session()->get('username'); ?></span>
                            <i class="feather icon-chevron-down"></i>
                        </div>
                        <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li>
                                <a id="btnlogout" href="<?= base_url('logout'); ?>">
                                    <i class="feather icon-log-out"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>