<header>
    <!-- tombol theme dark /light bootstrap icon-->
    

    <div class="px-3 py-2 border-bottom" style="background-color: #809D3C;">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="<?= getBaseUrl() ?>"
                    class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none text-uppercase fs-4">
                    <img src="<?= $logo ?>" alt="<?= $app_name ?> Logo" class="brand-image me-2" style="opacity: .8"
                        width="auto" height="70"> 
                </a>

                <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
                    <li>
                        <a href="<?= getBaseUrl() ?>" class="nav-link text-dark">
                            <i class="bi bi-house-fill d-block mx-auto mb-1 text-center"></i>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="?menu=produk" class="nav-link text-dark">
                            <i class="bi bi-grid-fill d-block mx-auto mb-1 text-center"></i>
                            Products
                        </a>
                    </li>
                    <li>
                        <a href="?menu=About" class="nav-link text-dark">
                            <i class="bi bi-file-person-fill d-block mx-auto mb-1 text-center"></i>
                            About Us
                        </a>
                    </li>
                    <?php if (!empty($_SESSION['user']) && empty($_SESSION['user']['id_pelanggan'])): ?>
                        <li>
                            <a href="dashboard.php" class="nav-link bg-warning text-black">
                                <i class="bi bi-speedometer d-block mx-auto mb-1 text-center"></i>
                                Dashboard
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="px-3 py-2 border-bottom mb-3" style="background-color: lightsteelblue;">
        <div class="container d-flex flex-wrap justify-content-center">
            <form action="?menu=produk" method="GET" class="col-12 col-lg-auto mb-2 mb-lg-0 me-lg-auto" role="search">
                <input type="hidden" value="produk" name="menu">
                <input type="search" class="form-control" placeholder="Search..." aria-label="Search" name="search">
            </form>

            <div class="text-end">
                <?php if (empty($_SESSION['user'])): ?>
                    <a href="login.php" class="btn btn-light text-dark me-2">Login</a>
                    <a href="register.php" class="btn btn-primary me-2">Sign-up</a>
                <?php else: ?>
                    <span class="me-2">Selamat Datang,
                        <b><?= htmlspecialchars($_SESSION['user']['username'] ?? 'User') ?></b></span>
                    <form action="" method="POST" style="display:inline-block;"
                        onsubmit="return confirm('Apa anda yakin ingin keluar dari akun ini ?');">
                        <input type="hidden" value="logout" name="aksi">
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="bi bi-person-fill-lock me-1"></i>Logout
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>
