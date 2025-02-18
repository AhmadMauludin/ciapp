<!DOCTYPE html>
<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="<?= base_url('assets/'); ?>"
    data-template="vertical-menu-template-free">

<link rel="stylesheet" href="<?= base_url('assets/css/app.css'); ?>">

<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= $title; ?></title>

    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img/favicon/favicon.ico'); ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/boxicons.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/core.css'); ?>" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/theme-default.css'); ?>" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url('assets/css/demo.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/vendor/libs/apex-charts/apex-charts.css'); ?>" />
    <script src="<?= base_url('assets/vendor/js/helpers.js'); ?>"></script>
    <script src="<?= base_url('assets/js/config.js'); ?>"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="#" class="app-brand-link">
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">CiappMart</span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>
                <?= view('layouts/menu') ?>
            </aside>

            <!-- Layout container -->
            <div class="layout-page">
                <nav
                    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <strong><?= $title; ?></strong>
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            Selamat Siang,&nbsp<b><?= session()->get('nama') ?></b>
                        </ul>
                    </div>
                </nav>

                <!-- Content -->

                <div class="container flex-grow-0 container-p-y">
                    <div class="row">
                        <div class="col-lg-12 mb-0 order-0">
                            <div class="card">
                                <div class="card-body">
                                    <p class="mb-0">
                                        <?= $this->renderSection('content'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Content -->

                <div class="content-wrapper">
                    <div class="container-xl flex-grow-1 container-p-y">
                        <footer class="content-footer footer bg-footer-theme">
                            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                                <div class="mb-0 mb-md-0">
                                    © 2025, made with ❤️ by
                                    <a href="#" target="_blank" class="footer-link fw-bolder">Maldin</a>
                                </div>
                                <div>
                                    <a
                                        href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                                        target="_blank" class="footer-link me-4">Support</a>
                                </div>
                            </div>
                        </footer>
                        <!-- / Footer -->

                        <div class="content-backdrop fade"></div>
                    </div>
                </div>
            </div>

            <div class="layout-overlay layout-menu-toggle"></div>
        </div>

        <!-- Core JS -->
        <script src="<?= base_url('assets/vendor/libs/jquery/jquery.js'); ?>"></script>
        <script src="<?= base_url('assets/vendor/libs/popper/popper.js'); ?>"></script>
        <script src="<?= base_url('assets/vendor/js/bootstrap.js'); ?>"></script>
        <script src="<?= base_url('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js'); ?>"></script>
        <script src="<?= base_url('assets/vendor/js/menu.js'); ?>"></script>
        <script src="<?= base_url('assets/vendor/libs/apex-charts/apexcharts.js'); ?>"></script>
        <script src="<?= base_url('assets/js/main.js'); ?>"></script>
        <script src="<?= base_url('assets/js/dashboards-analytics.js'); ?>"></script>
        <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>