<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="index.php">
                        <img src="<?php echo base_url() ?>vendor/images/LOGOnew.png" width="150px" heigth="50px" alt="Logo">
                        </a> <!-- Logo -->
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="bar-icon"></span>
                            <span class="bar-icon"></span>
                            <span class="bar-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto" >
                            <li class="nav-item">
                                    <a data-scroll-nav="0" ><i class="fas fa-shopping-cart"> Keranjang : &nbsp;
                                        <?php $keranjang = $this->cart->total_items()  ?>
                                        <?php echo anchor('Landing/detail_keranjang', $keranjang)  ?>
                                </i></a>
                                </li> 
                                <li class="nav-item">
                                    <a data-scroll-nav="0" href="<?php echo base_url('Landing'); ?>">Beranda</a>
                                </li>

                                <!-- <li class="nav-item">
                                    <a data-scroll-nav="0" href="<?php echo base_url('Landing_controller/Login/logout'); ?>">Logout</a>
                                </li> -->

                                <!-- <li class="nav-item">
                                    <div class="dropdown" >
                                        <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Login</a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="<?php echo base_url('Landing_controller/Login'); ?>">Login</a>
                                                <a class="dropdown-item" href="<?php echo base_url('Landing_controller/Login/logout'); ?>">Logout</a>
                                            </div>
                                    </div>
                                </li> -->
                                        
                                <!-- <li class="nav-item">
                                    <a data-scroll-nav="0" href="<?php echo base_url('Landing_controller/Login'); ?>">Login</a>
                                </li> -->
                            </ul> <!-- navbar nav -->
                        </div>
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->