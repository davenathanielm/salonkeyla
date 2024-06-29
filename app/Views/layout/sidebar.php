<div class="iq-sidebar-logo d-flex justify-content-between">
    <a href="index.html" class="header-logo">
        <img src="images/logo.png" class="img-fluid rounded-normal" alt="">
        <div class="logo-title">
            <span class="text-danger">Salon<span class="text-primary ml-1">Keyla</span></span>
        </div>
    </a>
    <div class="iq-menu-bt-sidebar">
        <div class="iq-menu-bt align-self-center">
            <div class="wrapper-menu">
                <div class="main-circle"><i class="ri-arrow-left-s-line"></i></div>
                <div class="hover-circle"><i class="ri-arrow-right-s-line"></i></div>
            </div>
        </div>
    </div>
</div>
<div id="sidebar-scrollbar">
    <nav class="iq-sidebar-menu">
        <ul id="iq-sidebar-toggle" class="iq-menu">
            <li class="active active-menu">
                <!-- span yang bikin dia bisa ke dalam -->
                <a href="/home" class="iq-waves-effect"><i class="las la-house-damage iq-arrow-left"></i><span>Home</span></a>
            </li>
            <li>
                <a href="calendar.html" class="iq-waves-effect"><i class="las la-calendar iq-arrow-left"></i><span>Calendar</span></a>
            </li>

            <!-- Sidebar Pengguna Atau User -->
            <?php if (session()->role == "admin" || session()->role == "owner") : ?>
                <li>
                    <a href="#userinfo" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect">
                            <!-- penting ada : atau titik dua -->

                        </span><i class="las la-user-tie iq-arrow-left"></i><span>User</span><i class="ri-arrow-right-s-line iq-arrow-right"></i>
                    </a>
                    <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="/Users/create"><i class="las la-plus-circle"></i>Tambah User</a></li>
                        <li><a href="<?= base_url('users') ?>"><i class="las la-th-list"></i>Tampil User </a></li>
                    </ul>
                </li>
            <?php endif; ?>
            <!-- Sidebar Pengguna Atau User selesai -->

            <!-- Sidebar Pelanggan -->
            <?php if (session()->role == "karyawan" || session()->role == "owner") : ?>
                <li>
                    <a href="#pelangganinfo" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="las la-user-tie iq-arrow-left"></i><span>Pelanggan</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                    <ul id="pelangganinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                        <li><a href="/Pelanggan/create"><i class="las la-plus-circle"></i>Tambah Pelanggan</a></li>
                        <li><a href="<?= base_url('pelanggan') ?>"><i class="las la-th-list"></i>Tampil Pelanggan </a></li>
                    </ul>
                </li>
            <?php endif; ?>
            <!-- Sidebar Pelanggan selesai -->

            <!-- SideBar Layanan -->
            <li>
                <a href="#layanan" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="las la-user-tie iq-arrow-left"></i><span>Layanan</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="layanan" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li><a href="/Layanan/create"><i class="las la-plus-circle"></i>Tambah Layanan</a></li>
                    <li><a href="<?= base_url('layanan') ?>"><i class="las la-th-list"></i>Tampil Layanan</a></li>
                </ul>
            </li>
            <!-- SideBar Layanan Selesai -->

            <!-- Stok -->
            <li>
                <a href="#stok" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="las la-file-alt iq-arrow-left"></i><span>Stok</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="stok" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li><a href="/Stok/create"><i class="las la-plus-circle"></i>Tambah Stok</a></li>
                    <li><a href="<?= base_url('stok') ?>"><i class="las la-th-list"></i>Tampil Stok</a></li>
                </ul>
            </li>
            <!-- Stok Selesai -->

            <!--SideBar Transaksi -->
            <li>
                <a href="#ui-elements" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="lab la-elementor iq-arrow-left"></i><span>Transaction</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                <ul id="ui-elements" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                    <li class="elements">
                        <a href="#sub-menu" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-play-circle-line"></i><span>Penjualan</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="sub-menu" class="iq-submenu collapse" data-parent="#ui-elements">
                            <li><a href="<?= base_url('jual') ?>"><i class="las la-sign-in-alt"></i>Tambah Transaksi</a></li>
                            <li><a href="<?= base_url('jual/laporan') ?>"><i class="las la-sign-in-alt"></i>Laporan</a></li>
                        </ul>
                    </li>
                    <li class="form">
                        <a href="#forms" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="lab la-wpforms"></i><span>Pembelian</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="forms" class="iq-submenu collapse" data-parent="#ui-elements">
                            <li><a href="<?= base_url('beli') ?>"><i class="las la-sign-in-alt"></i>Tambah Transaksi</a></li>
                            <li><a href="<?= base_url('beli/laporan') ?>"><i class="las la-sign-in-alt"></i>Laporan</a></li>
                        </ul>
                    </li>
                    <ul id="icons" class="iq-submenu collapse" data-parent="#ui-elements"></ul>
            </li>
            <!-- SideBar Transaksi Selesai -->

        </ul>






        <!-- <a href="#menu-level" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-record-circle-line iq-arrow-left"></i><span>Menu Level</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
        <ul id="menu-level" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
            <li><a href="#"><i class="ri-record-circle-line"></i>Menu 1</a></li>
            <li>
                <a href="#"><i class="ri-record-circle-line"></i>Menu 2</a>
                <ul>
                    <li class="menu-level">
                        <a href="#sub-menus" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="ri-play-circle-line"></i><span>Sub-menu</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="sub-menus" class="iq-submenu iq-submenu-data collapse">
                            <li><a href="#"><i class="ri-record-circle-line"></i>Sub-menu 1</a></li>
                            <li><a href="#"><i class="ri-record-circle-line"></i>Sub-menu 2</a></li>
                            <li><a href="#"><i class="ri-record-circle-line"></i>Sub-menu 3</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#"><i class="ri-record-circle-line"></i>Menu 3</a></li>
            <li><a href="#"><i class="ri-record-circle-line"></i>Menu 4</a></li>
        </ul> -->
    </nav>
    <!-- <div id="sidebar-bottom" class="p-3 position-relative">
        <div class="iq-card bg-primary rounded">
            <div class="iq-card-body">
                <div class="sidebarbottom-content">
                    <div class="image"><img src="images/page-img/side-bkg.png" alt=""></div>
                    <h5 class="mb-3 text-white">Upgrade to PRO</h5>
                    <p class="mb-0 text-light">Become a pro user & enjoy more.</p>
                    <button type="submit" class="btn btn-white w-100  mt-4 text-primary viwe-more">View More</button>
                </div>
            </div>
        </div>
    </div> -->
</div>