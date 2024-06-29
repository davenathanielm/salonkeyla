<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Salon Keyla Yong</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>/images/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/bootstrap.min.css">
    <!-- Typography CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/typography.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/responsive.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>
    <!-- loader END -->
    <!-- Wrapper Start -->
    <div class="wrapper">
        <!-- Sidebar  -->
        <div class="iq-sidebar">
            <!-- Masukin sidebar -->
            <?= $this->include('layout/sidebar') ?>
        </div>
        <!-- TOP Nav Bar -->
        <div class="iq-top-navbar">
            <!--Masukin TopBar  -->
            <?= $this->include('layout/topbar') ?>
        </div>
        <!-- TOP Nav Bar END -->
        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            <!--karena template harus nya di dalam dashboard   -->
            <?= $this->renderSection('content') ?>
        </div>
    </div>
    <!-- Wrapper END -->
    <!-- Footer -->
    <footer class="iq-footer">

    </footer>
    <!-- Footer END -->
    <!-- color-customizer -->
    <div class="iq-colorbox color-fix">
        <div class="buy-button"> <a class="color-full" href="#"><i class="fa fa-spinner fa-spin"></i></a> </div>
        <div id="right-sidebar-scrollbar" class="iq-colorbox-inner">
            <div class="clearfix color-picker">
                <h3 class="iq-font-black">Awesome Color</h3>
                <p>This color combo available inside whole template. You can change on your wish, Even you can create your own with limitless possibilities! </p>
                <ul class="iq-colorselect clearfix">
                    <li class="color-1 iq-colormark" data-style="color-1"></li>
                    <li class="color-2" data-style="iq-color-2"></li>
                    <li class="color-3" data-style="iq-color-3"></li>
                    <li class="color-4" data-style="iq-color-4"></li>
                    <li class="color-5" data-style="iq-color-5"></li>
                    <li class="color-6" data-style="iq-color-6"></li>
                    <li class="color-7" data-style="iq-color-7"></li>
                    <li class="color-8" data-style="iq-color-8"></li>
                    <li class="color-9" data-style="iq-color-9"></li>
                    <li class="color-10" data-style="iq-color-10"></li>
                    <li class="color-11" data-style="iq-color-11"></li>
                    <li class="color-12" data-style="iq-color-12"></li>
                    <li class="color-13" data-style="iq-color-13"></li>
                    <li class="color-14" data-style="iq-color-14"></li>
                    <li class="color-15" data-style="iq-color-15"></li>
                    <li class="color-16" data-style="iq-color-16"></li>
                    <li class="color-17" data-style="iq-color-17"></li>
                    <li class="color-18" data-style="iq-color-18"></li>
                    <li class="color-19" data-style="iq-color-19"></li>
                    <li class="color-20" data-style="iq-color-20"></li>
                </ul>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?= base_url() ?>/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <!--  -->
    <!-- color-customizer END -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url() ?>/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/js/popper.min.js"></script>
    <script src="<?= base_url() ?>/js/bootstrap.min.js"></script>
    <!-- Appear JavaScript -->
    <script src="<?= base_url() ?>/js/jquery.appear.js"></script>
    <!-- Countdown JavaScript -->
    <script src="<?= base_url() ?>/js/countdown.min.js"></script>
    <!-- Counterup JavaScript -->
    <script src="<?= base_url() ?>/js/waypoints.min.js"></script>
    <script src="<?= base_url() ?>/js/jquery.counterup.min.js"></script>
    <!-- Wow JavaScript -->
    <script src="<?= base_url() ?>/js/wow.min.js"></script>
    <!-- Apexcharts JavaScript -->
    <script src="<?= base_url() ?>/js/apexcharts.js"></script>
    <!-- Slick JavaScript -->
    <script src="<?= base_url() ?>/js/slick.min.js"></script>
    <!-- Select2 JavaScript -->
    <script src="<?= base_url() ?>/js/select2.min.js"></script>
    <!-- Owl Carousel JavaScript -->
    <script src="<?= base_url() ?>/js/owl.carousel.min.js"></script>
    <!-- Magnific Popup JavaScript -->
    <script src="<?= base_url() ?>/js/jquery.magnific-popup.min.js"></script>
    <!-- Smooth Scrollbar JavaScript -->
    <script src="<?= base_url() ?>/js/smooth-scrollbar.js"></script>
    <!-- lottie JavaScript -->
    <script src="<?= base_url() ?>/js/lottie.js"></script>
    <!-- am core JavaScript -->
    <script src="<?= base_url() ?>/js/core.js"></script>
    <!-- am charts JavaScript -->
    <script src="<?= base_url() ?>/js/charts.js"></script>
    <!-- am animated JavaScript -->
    <script src="<?= base_url() ?>/js/animated.js"></script>
    <!-- am kelly JavaScript -->
    <script src="<?= base_url() ?>/js/kelly.js"></script>
    <!-- am maps JavaScript -->
    <script src="<?= base_url() ?>/js/maps.js"></script>
    <!-- am worldLow JavaScript -->
    <script src="<?= base_url() ?>/js/worldLow.js"></script>
    <!-- Raphael-min JavaScript -->
    <script src="<?= base_url() ?>/js/raphael-min.js"></script>
    <!-- Morris JavaScript -->
    <script src="<?= base_url() ?>/js/morris.js"></script>
    <!-- Morris min JavaScript -->
    <script src="<?= base_url() ?>/js/morris.min.js"></script>
    <!-- Flatpicker Js -->
    <script src="<?= base_url() ?>/js/flatpickr.js"></script>
    <!-- Style Customizer -->
    <script src="<?= base_url() ?>/js/style-customizer.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="<?= base_url() ?>/js/chart-custom.js"></script>
    <!-- Custom JavaScript -->
    <script src="<?= base_url() ?>/js/custom.js"></script>

    <script>
        function previewImage() {
            const sampul = document.querySelector('#sampul');
            const imgPreview = document.querySelector('.img-preview');
            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(sampul.files[0]);
            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
</body>

</html>