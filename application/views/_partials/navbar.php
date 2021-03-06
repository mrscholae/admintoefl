<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<!-- Topbar Search -->
<?php if($menu == "Toko" || $menu == "Barang" || $menu == "Menunggu Pengambilan") :?>
<form
    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <?php if($menu == "Toko") :?>
            <input type="text" id="searchNavbar" class="form-control bg-light border-0 small" placeholder="Cari toko ...." aria-label="Search" aria-describedby="basic-addon2">
        <?php elseif($menu == "Barang") :?>
            <input type="text" id="searchNavbar" class="form-control bg-light border-0 small" placeholder="Cari barang ...." aria-label="Search" aria-describedby="basic-addon2">
        <?php elseif($menu == "Menunggu Pengambilan") :?>
            <input type="text" id="searchNavbar" class="form-control bg-light border-0 small" placeholder="Cari toko ...." aria-label="Search" aria-describedby="basic-addon2">
        <?php endif;?>
        
        <div class="input-group-append">
            <button class="btn btn-primary" type="button" id="btnSearchNavbar">
                <i class="fas fa-search fa-sm"></i>
            </button>
        </div>
    </div>
</form>
<?php endif;?>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">
    <!-- nav items plus for toko -->
    <?php if($menu) :?>
        <?php if($menu == "Tes"):?>
            <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" data-toggle="modal" href="#addTes" id="btnPlusTes" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-plus"></i>
                </a>
            </li>
        <?php endif;?>
    <?php endif;?>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('username')?></span>
            <img class="img-profile rounded-circle"
                src="<?= base_url()?>assets/img/undraw_profile.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?= base_url()?>auth/logout">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    </li>

</ul>

</nav>
<!-- End of Topbar -->