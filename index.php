<?php
ob_start();
session_start();
include_once './config/app.php';

// Initialize CSRF token if not set
$_SESSION['csrf_token'] ??= bin2hex(random_bytes(32));

$auth = new AuthController();
$cHome = new HomeController($_SERVER['QUERY_STRING']);

$contentPath = $cHome->getContentPath();

// Handle logout action
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['aksi']) && $_POST['aksi'] === 'logout') {
        $auth->keluar();
        header("Location: ./");  // Redirect after logout
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#712cf9">
    <title>Rindu Pokat</title>
    <link rel="icon" type="image/x-icon" href="<?= $logo ?>">
    <!-- bootstrap CDN CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- custom css untuk tampilan user -->
    <link href="./assets/css/home.css" rel="stylesheet">

    <!-- Datatables CSS -->
    <link href="https://cdn.datatables.net/v/bs4/dt-2.1.8/datatables.min.css" rel="stylesheet">

    <!-- theme dark/light -->
    <script src="./assets/js/color-themes.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <!-- bootstrap CDN JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Datatables -->
    <script src="https://cdn.datatables.net/v/bs4/dt-2.1.8/datatables.min.js"></script>
</head>

<body>
    <?php include_once './views/home/layouts/navbar.php' ?>

    <!-- Main content -->
    <div class="content">
        <?php
        if (!$contentPath) {
            include './views/home/layouts/404.php';
        } elseif ($contentPath) {
            include $contentPath;
        }
        ?>
    </div>
    <?php include_once './views/home/layouts/footer.php' ?>

    <!-- Sweetalert2 Message -->
    <?php if (isset($_SESSION["message"]) && isset($_SESSION["icon_message"])) { ?>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: '<?= ucfirst($_SESSION['icon_message']); ?>',
                    text: '<?= $_SESSION['message']; ?>',
                    icon: '<?= $_SESSION['icon_message']; ?>',
                })
            });
        </script>
    <?php
        unset($_SESSION["icon_message"]);
        unset($_SESSION["message"]);
    } ?>

    <!-- Modal Structure -->
    <div class="modal fade" id="produkModal" tabindex="-1" aria-labelledby="produkModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="produkModalLabel"><b>Detail Produk</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img id="modal-product-photo" class="img-fluid" alt="silahkan login untuk melihat detail produk">
                        </div>
                        <div class="col-md-6">
                            <h2 id="modal-product-name" class="fw-bold fs-2"></h2>
                            <span class="badge text-bg-primary" id="modal-product-category"></span>
                            <p id="modal-product-description" class="lead"></p>
                            <span class="text-body-secondary text-dark mt-3 fs-6" id="modal-product-stock"></span>
                            <h2 class="text-success fs-2 fw-semibold" id="modal-product-price"></h2>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="d-flex justify-content-end">
                        <form action="" method="POST" style="display:inline-block;"
                            <input type="hidden" name="id_produk" id="modal-product-id"></input>
                            <?php if (isset($_SESSION['user'])): ?>
                                <div class="social-icons-container">
                                <p class="bg-success" style="margin-right: 20px; display: inline-block; font-weight: bold; color: white;">
                                    <i class="bi bi-cart-plus-fill me-1"></i> Mulai Pembelian DI
                                </p>
                                    <a class="social-icon" href="https://gofood.co.id/banjarmasin/restaurant/rindu-pokat-banjarmasin-utara-sungaiandai-d76ef6b8-b294-41f7-84e4-d6b35fc56290" target="_blank">
                                        <img class="socialIcon image-block" src="assets/images/gofood-icon.png" alt="Gofood" style="width:50px; height:auto; border:2px solid #ccc; margin-right: 20px; background: #ccc;">
                                    </a>
                                    <a class="social-icon" href="https://www.google.com" target="_blank">
                                        <img class="socialIcon image-block" src="assets/images/images.png" alt="Shopeefood" style="width:50px; height:auto; border:2px solid #ccc; margin-left: 20px;">
                                    </a>
                                </div>
                            <?php else: ?>

                                <a href="login.php" class="bi bi-cart-plus-fill btn btn-success me-1">Login untuk melakukan pembelian</a>
                            <?php endif ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const produkModal = document.getElementById('produkModal');
        produkModal.addEventListener('show.bs.modal', function(event) {
            const card = event.relatedTarget;
            const id = card.getAttribute('data-id');
            const name = card.getAttribute('data-name');
            const description = card.getAttribute('data-description');
            const photo = card.getAttribute('data-photo');
            const stock = card.getAttribute('data-stock');
            const price = card.getAttribute('data-price');
            const category = card.getAttribute('data-category');

            // Update the modal content
            document.getElementById('modal-product-id').value = id;
            document.getElementById('modal-product-name').textContent = name;
            document.getElementById('modal-product-description').textContent = description;
            document.getElementById('modal-product-photo').src = photo;
            document.getElementById('modal-product-stock').textContent = `Stok Tersedia: ${stock}`;
            document.getElementById('modal-product-price').textContent = `Rp. ${price}`;
            document.getElementById('modal-product-category').textContent = category;
        });
    </script>

</body>

</html>

<?php
ob_end_flush(); // End output buffering and send output
?>