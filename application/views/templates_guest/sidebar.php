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
        <a class="nav-link text-warning" href="<?php echo base_url('guest') ?>">Beranda <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Kategori
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?php echo base_url('kategori_guest/sepatu_olahraga') ?>">Sepatu Olahraga</a>
          <a class="dropdown-item" href="<?php echo base_url('kategori_guest/sepatu_vulcanized') ?>">Sepatu Vulcanized</a>
          <a class="dropdown-item" href="<?php echo base_url('kategori_guest/sepatu_slipon') ?>">Sepatu Slip-On</a>
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
                  


                       

                        <div class="topbar-divider d-none d-sm-block"></div>
                        <ul class="nav navbar-nav navbar-right">
                            <?php if ($this->session->userdata('username')) { ?>
                        
                            
                            <li><?php echo anchor('auth/login','<div class="btn btn-primary btn-sm">Login</div>') ?></li>
                            <?php } ?>    
                        </ul>
                        
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <ul class="nav navbar-nav navbar-right">
                         
                        </ul>
                    </ul>

                </nav>
                <br><br><br><b><br>
                <!-- End of Topbar -->