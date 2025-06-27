
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand px-4 py-3 m-0" href="<?= base_url('dashboard'); ?>">
        <span class="ms-1 text-sm text-dark">
            Loan Management
        </span>
      </a>
    </div>
    <hr class="horizontal dark mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?= ($current_page == 'admin-dashboard' || $current_page == 'user-dashboard')? 'active bg-gradient-dark text-white' : 'text-dark' ?>" href="<?= base_url('dashboard'); ?>">
            <i class="material-symbols-rounded opacity-5">dashboard</i>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <?php if($this->session->userdata('user_type') === 'admin'){ ?>
          <li class="nav-item">
            <a class="nav-link  <?= ($current_page == 'users')? 'active bg-gradient-dark text-white' : 'text-dark' ?>" href="<?= base_url('admin/users') ?>">
              <i class="material-symbols-rounded opacity-5">table_view</i>
              <span class="nav-link-text ms-1">Manage Users</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link  <?= ($current_page == 'loan-request')? 'active bg-gradient-dark text-white' : 'text-dark' ?>" href="<?= base_url('admin/loan-request') ?>">
              <i class="material-symbols-rounded opacity-5">table_view</i>
              <span class="nav-link-text ms-1">Loan Request</span>
            </a>
          </li>
        <?php } else{ ?>
          <li class="nav-item">
            <a class="nav-link  <?= ($current_page == 'loan-request')? 'active bg-gradient-dark text-white' : 'text-dark' ?>" href="<?= base_url('user/loan-request') ?>">
              <i class="material-symbols-rounded opacity-5">table_view</i>
              <span class="nav-link-text ms-1">Apply Loan</span>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link  <?= ($current_page == 'request-list')? 'active bg-gradient-dark text-white' : 'text-dark' ?>" href="<?= base_url('user/request-list') ?>">
              <i class="material-symbols-rounded opacity-5">table_view</i>
              <span class="nav-link-text ms-1">Loan Requests</span>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn btn-outline-dark mt-4 w-100" href="<?= base_url('Dashboard/logout'); ?>">
            Logout
        </a>
      </div>
    </div>
  </aside>

  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-3 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;"><?= ucfirst($this->session->userdata('user_type')); ?></a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><?= $page_title; ?></li>
          </ol>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav d-flex align-items-center  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>