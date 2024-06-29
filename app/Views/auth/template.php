    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - SB Admin</title>
        <link href="<?= base_url() ?>/css/stylesLogin.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        

        <style>
            .bg-image {
                /* Untuk manggil yang ada di public image cuma / ini dah ke public trus pilih file berikutnya  */
                background-image: url(/img/GambarLogin.jpg);
                background-repeat: no-repeat;
                background-size: 100% 100%;
            }
        </style>
    </head>

    <body class="bg-image">
        <!-- <img src="https://images8.alphacoders.com/117/1174099.jpg" alt="" class="Background-image"> -->
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <!-- Start Body atau Content -->
                <?= $this->renderSection('content') ?>
                <!-- End Body atau Content -->
            </div>
            <!-- <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div> -->
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url() ?>/js/scripts.js"></script>
    </body>

    </html>