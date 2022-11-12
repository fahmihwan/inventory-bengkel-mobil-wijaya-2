<nav class="sb-sidenav accordion sb-sidenav-dark" style="background-color: #1a1c2f" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav ">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link " href="index.php?menu=dashboard">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>

            <!-- master -->

                <div class="sb-sidenav-menu-heading">Master</div>
                 <!-- master barang -->
                 <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Master Barang
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="index.php?menu=kategori">Kategori</a>
                        <a class="nav-link" href="index.php?menu=rak">Rak</a>
                    </nav>
                </div>
               
                <a class="nav-link collapsed  " href="#" data-bs-toggle="collapse" data-bs-target="#master-data" aria-expanded="false" aria-controls="master-data">
                    <div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                    Master Data
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="master-data" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="index.php?menu=montir">Montir</a>
                        <a class="nav-link" href="index.php?menu=supplier">Supplier</a>
                    </nav>
                </div>
              

                <a class="nav-link" href="index.php?menu=data-barang">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Data Barang
                </a>

                
            <!-- transaksi -->
            <?php if ($varSession['hak_akses'] == 'admin' || $varSession['hak_akses'] == 'super admin') : ?>
                <div class="sb-sidenav-menu-heading">Transaksi</div>
                <a class="nav-link" href="index.php?menu=barang-masuk">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Barang Masuk
                </a>
                <a class="nav-link" href="index.php?menu=barang-keluar">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Barang Keluar
                </a>
            <?php endif; ?>

            <?php if ($varSession['hak_akses'] == 'owner' || $varSession['hak_akses'] == 'super admin') : ?>
                <div class="sb-sidenav-menu-heading">Laporan</div>
                <a class="nav-link" href="index.php?laporan=barang-masuk">
                    <div class="sb-nav-link-icon">
                        <i class="fa-sharp fa-solid fa-bars-progress"></i>
                    </div>
                    Laporan Barang Masuk
                </a>
                <a class="nav-link" href="index.php?laporan=barang-keluar">
                    <div class="sb-nav-link-icon">
                        <i class="fa-sharp fa-solid fa-bars-progress"></i>
                    </div>
                    Laporan Barang Keluar
                </a>
                <a class="nav-link" href="index.php?laporan=stok">
                    <div class="sb-nav-link-icon">
                        <i class="fa-sharp fa-solid fa-bars-progress"></i>
                    </div>
                    Laporan Stok
                </a>
            <?php endif; ?>

            <br>
            <br>

        </div>
    </div>

</nav>