<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?= getBaseUrl() ?>" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar  -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-" href="#" role="button">
                <i class="fas fa-"></i>
            </a>
            <div class="navbar--block">
                <form class="form-inline">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="" placeholder=""
                            aria-label="">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-"></i>
                            </button>
                            <button class="btn btn-navbar" type="button" data-widget="navbar-">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>

        <!-- Logout Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <img src="<?= getBaseUrl() . "assets/images/user.png" ?>" class="h-100 mr-1" alt="User Image">
                <?= $_SESSION['user']['username'] ?>
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                <form action="" method="POST" style="display:inline-block;"
                    onsubmit="return confirm('Apa anda yakin ingin keluar dari akun ini ?');">
                    <!-- CSRF token -->
                    <input type="hidden" value="logout" name="aksi">

                    <!-- A tag that acts as the logout button -->
                    <a href="#" onclick="this.closest('form').submit();" class="nav-link">
                        <i class="fas fa-right-from-bracket mr-5"></i>Logout
                    </a>
                </form>
            </div>
        </li>

    </ul>
</nav>
