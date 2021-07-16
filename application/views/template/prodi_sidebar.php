<!-- BEGIN SIDEBAR -->
<div class="app-sidebar colored">
  <div class="sidebar-header">
    <a class="header-brand" href="<?= site_url() ?>">
      <a class="header-brand" href="<?= site_url() ?>">
        <span class="text">PKL POLINELA</span>
      </a>
    </a>
    <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
    <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
  </div>

  <div class="sidebar-content">
    <div class="nav-container">
      <nav id="main-menu-navigation" class="navigation-main">
        <div class="nav-lavel">Menu</div>
        <div class="nav-item <?= ($this->uri->segment(2) === 'dashboard' ? 'active' : '') ?>">
          <a href=" <?= site_url('prodi/dashboard') ?>"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(2) === 'pkl_registrasi' ? 'active' : '') ?>">
          <a href=" <?= site_url('prodi/pkl_registrasi') ?>"><i class="ik ik-check-circle"></i><span>Registrasi Kel
              PKL </span>
            <!-- <span class="badge bg-danger">3</span> -->
          </a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(2) === 'pkl_group_activity' ? 'active' : '') ?>">
          <a href=" <?= site_url('prodi/pkl_group_activity') ?>"><i class="ik ik-file-text"></i><span>PKL Aktivitas Grup</span>
            <!-- <span class="badge bg-danger">3</span> -->
          </a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(2) === 'pkl_location' ? 'active' : '') ?>">
          <a href=" <?= site_url('prodi/pkl_location') ?>"><i class="ik ik-map"></i><span>Lokasi
              PKL</span></a>
        </div>
      </nav>
    </div>
  </div>
</div>
<!-- END SIDEBAR -->