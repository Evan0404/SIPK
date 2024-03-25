<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
    <div class="sidenav-header">
      <i
        class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true"
        id="iconSidenav"
      ></i>
      <a
        class="navbar-brand m-0"
        href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html "
        target="_blank"
      >
        <img
          src="assets/img/logo.png"
          class="navbar-brand-img h-100"
          alt="main_logo"
        />
        <span class="ms-1 font-weight-bold">
            SIPK HMJ-Akuntansi
        </span>
      </a>
    </div>
    <hr class="horizontal dark mt-0" />
    <div class="collapse navbar-collapse w-auto h-75" style="width: 100%;" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['hal'])){if($_GET['hal']=='dashboard'){echo"active";}}?>" href="index.php?hal=dashboard">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
            >
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['hal'])){if($_GET['hal']=='kas'){echo"active";}}?>" href="index.php?hal=kas">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
            >
              <!-- <i
                class="ni ni-calendar-grid-58 "
              ></i> -->
              <i class="bi bi-cash-coin text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Kas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['hal'])){if($_GET['hal']=='uang-masuk'){echo"active";}}?>" href="index.php?hal=uang-masuk">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
            >
              <!-- <i
                class="ni ni-calendar-grid-58 "
              ></i> -->
              <i class="bi bi-wallet2 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Uang Masuk</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['hal'])){if($_GET['hal']=='uang-keluar'){echo"active";}}?>" href="index.php?hal=uang-keluar">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
            >
              <!-- <i
                class="ni ni-credit-card text-success text-sm opacity-10"
              ></i> -->
              <i class="bi bi-cart4 text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Uang Keluar</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['hal'])){if($_GET['hal']=='kategori'){echo"active";}}?>" href="index.php?hal=kategori">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
            >
              <!-- <i class="ni ni-app text-info text-sm opacity-10"></i> -->
              <i class="bi bi-list-ul text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Kategori</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['hal'])){if($_GET['hal']=='rtl'){echo"active";}}?>" href="index.php?hal=rtl">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
            >
              <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">RTL</span>
          </a>
        </li> -->
        <li class="nav-item mt-3">
          <h6
            class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6"
          >
            Laporan
          </h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['hal'])){if($_GET['hal']=='laporan-laba-rugi'){echo"active";}}?>" href="index.php?hal=laporan-laba-rugi">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
            >
              <i class="bi bi-graph-up-arrow text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Laporan Laba Rugi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['hal'])){if($_GET['hal']=='laporan-neraca'){echo"active";}}?>" href="index.php?hal=laporan-neraca">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
            >
              <i class="bi bi-bar-chart text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Laporan Neraca</span>
          </a>
        </li>      
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['hal'])){if($_GET['hal']=='laporan-perubahan-modal'){echo"active";}}?>" href="index.php?hal=laporan-perubahan-modal">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
            >
              <i class="bi bi-cash text-secondary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Perubahan Modal</span>
          </a>
        </li>   
        <li class="nav-item mt-3">
          <h6
            class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6"
          >
            Profil & Keanggotaan
          </h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['hal'])){if($_GET['hal']=='anggota'){echo"active";}}?>" href="index.php?hal=anggota">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
            >
              <i class="bi bi-people text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Anggota</span>
          </a>
        </li>   
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['hal'])){if($_GET['hal']=='user'){echo"active";}}?>" href="index.php?hal=user">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
            >
              <i class="bi bi-person-add text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">User</span>
          </a>
        </li>   
        <li class="nav-item mt-3">
          <h6
            class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6"
          >
            Aktivitas
          </h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(isset($_GET['hal'])){if($_GET['hal']=='log'){echo"active";}}?>" href="index.php?hal=log">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center"
            >
              <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Log Aktivitas</span>
          </a>
        </li>   
      </ul>
    </div>
</aside>