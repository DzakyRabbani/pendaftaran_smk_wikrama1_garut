<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"  style="background:#0000ff;"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
          </ul>
        </form>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <i><a>YAYASAN PRAWITAMA</a></i>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <i><a>YP</a></i>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">SMK WIKRAMA 1 GARUT</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-pen"></i><span>Input</span></a>
                <ul class="dropdown-menu">

                <?php if($_SESSION['hak'] == 'Admin'):?>

                  <li><a class="nav-link" href="<?= base_url('Property') ?>">Data Calon Murid</a></li>
                  <li><a class="nav-link" href="<?= base_url('Room') ?>">Data Tempat Tinggal</a></li>
                  <li><a class="nav-link" href="<?= base_url('Navigate_button') ?>">Data Bimbingan Peserta</a></li>
                  <li><a class="nav-link" href="<?= base_url('Versi') ?>">Data Nilai Raport</a></li>
                  <li><a class="nav-link" href="<?= base_url('User') ?>">Table User</a></li>
      
                  <?php elseif($_SESSION['hak'] == 'Operator'):?>
      

                  <li><a class="nav-link" href="<?= base_url('Property') ?>">Data Calon Murid</a></li>
                  <li><a class="nav-link" href="<?= base_url('Room') ?>">Data Tempat Tinggal</a></li>
                  <li><a class="nav-link" href="<?= base_url('Navigate_button') ?>">Data Bimbingan Peserta</a></li>
                  <li><a class="nav-link" href="<?= base_url('Versi') ?>">Data Nilai Raport</a></li>
      
             <?php endif?>
                </ul>
              </li>
            </ul>
            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="<?= base_url('Auth/logout') ?>" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i> Logout
              </a>
            </div>
        </aside>
      </div>
    </div>
  </div>