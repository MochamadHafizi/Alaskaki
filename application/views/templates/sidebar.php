<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar shadow fixed-top">
               <a class="navbar-brand ml-5 mr-5 font-weight-bold" href="<?php echo base_url('dashboard/index') ?> " style="font-family: ">
    Alaskaki
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link text-warning" href="<?php echo base_url('dashboard/index') ?>">Beranda <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-warning" href="<?php echo base_url('dashboard/index') ?>">Produk</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kategori
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo base_url('kategori/sepatu_olahraga') ?>">Sepatu Olahraga</a>
          <a class="dropdown-item" href="<?php echo base_url('kategori/sepatu_vulcanized') ?>">Sepatu Vulcanized</a>
          <a class="dropdown-item" href="<?php echo base_url('kategori/sepatu_slipon') ?>">Sepatu Slip-On</a>
        </div>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Brand
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?= base_url('brand/compass') ?>">Sepatu Compass</a>
          <a class="dropdown-item" href="#">Ventela</a>
          <a class="dropdown-item" href="#">Geoff Max</a>
          <a class="dropdown-item" href="#">Warior</a>
          <a class="dropdown-item" href="#">Nah Project</a>
          <a class="dropdown-item" href="#">Forever Young Crew</a>
          <a class="dropdown-item" href="#">DBL</a>

        </div>
      </li> -->
    </ul>
  </div>
                  

                        <div class="navbar">

                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                <i class="fas fa-shopping-cart fa-lg">
                                <?php $keranjang = ''.$this->cart->total_items(). '' ?>
                                </i>
                                <?php echo anchor('dashboard/detail_keranjang', $keranjang)  ?>
                                </li>
                            </ul>
                        </div>


                       

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <ul class="nav navbar-nav navbar-right">
                            <?php if ($this->session->userdata('username')) { ?>
                            <li class="mr-3 text-warning"><div>Selamat Datang <?php echo $this->session->userdata('username') ?></div></li>
                            <li><?php echo anchor('auth/logout','<div class="btn btn-danger btn-sm">Logout</div>') ?></li>
                            <?php }else{ ?>
                            <li><?php echo anchor('auth/logout','<div class="btn btn-primary btn-sm">Login</div>') ?></li>
                            <?php } ?>    
                        </ul>
                        
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <ul class="nav navbar-nav navbar-right">
                         <li><?php echo anchor('pesanan_saya','<div class="btn btn-primary btn-sm"><i class="fab fa-shopify">Pesanan Saya</i></div>') ?></li>
                        </ul>
                    </ul>

                </nav>
                <br><br><br><b><br>
                <!-- End of Topbar -->