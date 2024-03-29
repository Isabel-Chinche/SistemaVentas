
<!-- Main content -->
<div class="main-content" id="panel">
<!-- Topnav -->
<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
    <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <!-- Navbar links -->
        <ul class="navbar-nav align-items-center  ml-md-auto ">
        <li class="nav-item d-xl-none">
            <!-- Sidenav toggler -->
            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
                <i class="sidenav-toggler-line"></i>
            </div>
            </div>
        </li>
        <li class="nav-item d-sm-none">
            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
            <i class="ni ni-zoom-split-in"></i>
            </a>
        </li>

        <li class="nav-item dropdown">
            
            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
            <i class="ni ni-bell-55" ></i> 
            </a>
            <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
            <!-- Dropdown header -->
            <div class="px-3 py-3">
                <h6 class="text-sm text-muted m-0">Tienes <strong class="text-primary">0</strong> Notificaciones.</h6>
            </div>
            <!-- View all -->
            <a class="dropdown-item text-center text-primary font-weight-bold py-3">Ver todos</a>
            </div>
        </li>


        </ul>
        <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
        <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                <?php if(file_exists("./assets/img/user/".$this->session->userdata("picture"))): ?>
                    <img src="<?php echo base_url(); ?>assets/img/user/<?php echo $this->session->userdata("picture"); ?>">
                <?php else: ?>
                    <img src="<?php echo base_url(); ?>assets/img/user/img.png">
                <?php endif ?>   
                </span>
                <div class="media-body  ml-2  d-none d-lg-block">
                <span class="mb-0 text-sm  font-weight-bold"><?php echo $this->session->userdata("name"); ?></span>
                </div>
            </div>
            </a>
            <div class="dropdown-menu  dropdown-menu-right ">
            <div class="dropdown-header noti-title">
                <h6 class="text-overflow m-0">Bienvenido!</h6>
            </div>
            <a href="<?php echo base_url(); ?>perfil" class="dropdown-item">
                <i class="ni ni-single-02"></i>
                <span>Mi perfil</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?php echo base_url(); ?>cerrarsesion" class="dropdown-item">
                <i class="ni ni-user-run"></i>
                <span>Cerrar Sesión</span>
            </a>
            </div>
        </li>
        </ul>
    </div>
    </div>
</nav>