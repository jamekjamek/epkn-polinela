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
          <a href=" <?= site_url('dosen/dashboard') ?>"><i class="ik ik-home"></i><span>Dashboard</span></a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(2) === 'planning' ? 'active' : '') ?>">
          <a href=" <?= site_url('dosen/planning') ?>"><i class="ik ik-book"></i><span>Capaian Pembelajaran</span></a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(2) === 'report_supervision' ? 'active' : '') ?>">
          <a href=" <?= site_url('dosen/report_supervision') ?>"><i class="ik ik-clipboard"></i><span>Laporan Supervisi</span></a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(2) === 'report_reception' ? 'active' : '') ?>">
          <a href=" <?= site_url('dosen/report_reception') ?>"><i class="ik ik-share-2"></i><span>Kesediaan Penerimaan</span></a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(2) === 'data_pkl' || $this->uri->segment(3) === 'assessment' ? 'active' : '') ?>">
          <a href=" <?= site_url('dosen/data_pkl') ?>"><i class="ik ik-trending-up"></i><span>Penilaian</span></a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(3) === 'daily_log' ? 'active' : '') ?>">
          <a href=" <?= site_url('dosen/activity/daily_log') ?>"><i class="ik ik-file-text"></i><span>Jurnal Harian</span></a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(3) === 'attendance' ? 'active' : '') ?>">
          <a href=" <?= site_url('dosen/activity/attendance') ?>"><i class="ik ik-cast"></i><span>Kehadiran Mahasiswa</span></a>
        </div>
      </nav>
    </div>
  </div>
</div>
<!-- END SIDEBAR -->