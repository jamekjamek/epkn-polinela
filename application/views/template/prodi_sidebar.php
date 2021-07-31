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
        <div class="nav-item <?= ($this->uri->segment(2) === 'registrations' ? 'active' : '') ?>">
          <a href="<?= base_url('prodi/registrations') ?>"><i class="fa fa-users-cog"></i><span>Kelompok PKN</span></a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(2) === 'daily_log' ? 'active' : '') ?>">
          <a href="<?= base_url('prodi/daily_log') ?>"><i class="fa fa-file"></i><span>Jurnal Harian</span></a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(2) === 'attendance' ? 'active' : '') ?>">
          <a href="<?= base_url('prodi/attendance') ?>"><i class="fa fa-clock"></i>Kehadiran</a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(2) === 'supervision_report' ? 'active' : '') ?>">
          <a href="<?= base_url('prodi/supervision_report') ?>"><i class=" fa fa-clipboard"></i>Laporan Supervisi</a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(2) === 'scoring' ? 'active' : '') ?>">
          <a href="<?= base_url('prodi/scoring') ?>"><i class="fa fa-graduation-cap"></i>Nilai PKN</a>
        </div>

      </nav>
    </div>
  </div>
</div>
<!-- END SIDEBAR -->