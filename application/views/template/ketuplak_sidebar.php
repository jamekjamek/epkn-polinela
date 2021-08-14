<!-- BEGIN SIDEBAR -->
<div class="app-sidebar colored">
  <div class="sidebar-header">
    <a class="header-brand" href="<?= site_url() ?>">
      <a class="header-brand" href="<?= site_url() ?>">
        <span class="text">PKN POLINELA</span>
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
          <a href=" <?= site_url('ketuplak/dashboard') ?>"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(2) === 'pkn' ? 'active' : '') ?>">
          <a href=" <?= site_url('ketuplak/pkn') ?>"><i class="ik ik-activity"></i><span>Rekap PKN</span></a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(3) === 'advisers' ? 'active' : '') ?>">
          <a href="<?= base_url('ketuplak/recap/advisers') ?>"><i class="fa fa-users-cog"></i><span>Dosen Pembimbing</span></a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(3) === 'supervisor' ? 'active' : '') ?>">
          <a href="<?= base_url('ketuplak/recap/supervisor') ?>"><i class="fa fa-users"></i><span>Pembimbing Lapang</span></a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(3) === 'daily_log' ? 'active' : '') ?>">
          <a href="<?= base_url('ketuplak/recap/daily_log') ?>"><i class="fa fa-file"></i><span>Jurnal Harian</span></a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(3) === 'attendance' ? 'active' : '') ?>">
          <a href="<?= base_url('ketuplak/recap/attendance') ?>"><i class="fa fa-clock"></i>Kehadiran</a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(3) === 'supervision_report' ? 'active' : '') ?>">
          <a href="<?= base_url('ketuplak/recap/supervision_report') ?>"><i class=" fa fa-clipboard"></i>Laporan Supervisi</a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(3) === 'status_pkn' ? 'active' : '') ?>">
          <a href="<?= base_url('ketuplak/recap/status_pkn') ?>"><i class="fa fa-receipt"></i><span>Status PKN</span></a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(3) === 'scoring' ? 'active' : '') ?>">
          <a href="<?= base_url('ketuplak/recap/scoring') ?>"><i class="fa fa-graduation-cap"></i>Nilai PKN</a>
        </div>
      </nav>
    </div>
  </div>
</div>
<!-- END SIDEBAR -->