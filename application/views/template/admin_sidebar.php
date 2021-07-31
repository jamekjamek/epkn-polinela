<!-- BEGIN SIDEBAR -->
<div class="app-sidebar colored">
  <div class="sidebar-header">
    <a class="header-brand" href="<?= site_url() ?>">
      <span class="text">PKN POLINELA</span>
    </a>
    <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
    <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
  </div>

  <div class="sidebar-content">
    <div class="nav-container">
      <nav id="main-menu-navigation" class="navigation-main">
        <div class="nav-lavel">Menu</div>
        <?php $uri = $this->uri->segment(2); ?>
        <div class="nav-item <?= ($uri  === 'dashboard' ? 'active' : '') ?>">
          <a href="<?= base_url('admin/dashboard') ?>"><i class="ik ik-home"></i><span>Dashboard</span></a>
        </div>
        <div class="nav-item has-sub <?= ($this->uri->segment(3)  === 'academic_year' || $this->uri->segment(4)  === 'academic_year' || $this->uri->segment(2)  === 'guidebook' || $this->uri->segment(3)  === 'guidebook' || $this->uri->segment(2)  === 'letter' || $this->uri->segment(3) === 'letter' ? 'active open' : '') ?>">
          <a href="javascript:void(0)"><i class="ik ik-settings"></i><span>Konfigurasi</span></a>
          <div class="submenu-content">
            <a href="<?= base_url('admin/config/academic_year') ?>" class="menu-item <?= ($this->uri->segment(3)  === 'academic_year' || $this->uri->segment(4) === 'academic_year' ? 'active' : '') ?>">Tahun Akademik</a>
            <a href="<?= base_url('admin/guidebook') ?>" class="menu-item <?= ($this->uri->segment(2)  === 'guidebook' || $this->uri->segment(2) === 'guidebook' ? 'active' : '') ?>">Buku Panduan</a>
            <a href="<?= base_url('admin/letter') ?>" class="menu-item <?= ($this->uri->segment(2)  === 'letter' || $this->uri->segment(3) === 'letter' ? 'active' : '') ?>">Surat</a>
          </div>
        </div>
        <div class="nav-item has-sub <?= ($this->uri->segment(3)  === 'major' || $this->uri->segment(3) === 'prodi' || $this->uri->segment(3) === 'student' || $this->uri->segment(3) === 'lecture' || $this->uri->segment(3) === 'village' || $this->uri->segment(3) === 'head-of-program' || $this->uri->segment(3) === 'head-of-program-study' || $this->uri->segment(3) === 'users' || $this->uri->segment(3)  === 'planning_attachment' || $this->uri->segment(4) === 'planning_attachment' ? 'active open' : '') ?>">
          <a href="javascript:void(0)"><i class="ik ik-server"></i><span>Master Data</span></a>
          <div class="submenu-content">
            <a href="<?= base_url('admin/master/major') ?>" class="menu-item <?= ($this->uri->segment(3)  === 'major' ? 'active' : '') ?>">Jurusan</a>
            <a href="<?= base_url('admin/master/prodi') ?>" class="menu-item <?= ($this->uri->segment(3)  === 'prodi' ? 'active' : '') ?>">Program Studi</a>
            <a href="<?= base_url('admin/master/student') ?>" class="menu-item <?= ($this->uri->segment(3)  === 'student' ? 'active' : '') ?>">Mahasiswa</a>
            <a href="<?= base_url('admin/master/lecture') ?>" class="menu-item <?= ($this->uri->segment(3)  === 'lecture' ? 'active' : '') ?>">Dosen</a>
            <a href="<?= base_url('admin/master/head-of-program') ?>" class="menu-item <?= ($this->uri->segment(3)  === 'head-of-program' ? 'active' : '') ?>">Ketua Jurusan</a>
            <a href="<?= base_url('admin/master/head-of-program-study') ?>" class="menu-item <?= ($this->uri->segment(3)  === 'head-of-program-study' ? 'active' : '') ?>">Ketua Program Studi</a>
            <a href="<?= base_url('admin/master/village') ?>" class="menu-item <?= ($this->uri->segment(3)  === 'village' ? 'active' : '') ?>">Desa</a>
            <a href="<?= base_url('admin/master/users') ?>" class="menu-item <?= ($this->uri->segment(3)  === 'users' ? 'active' : '') ?>">Data User</a>
          </div>
        </div>
        <div class="nav-item <?= ($uri  === 'registrations' ? 'active' : '') ?>">
          <a href="<?= base_url('admin/registrations') ?>"><i class="ik ik-cast"></i><span>Pendaftaran PKN</span></a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(3) === 'pkn' ? 'active' : '') ?>">
          <a href="<?= base_url('admin/master/pkn') ?>"><i class="ik ik-activity"></i><span>Rekap Mahasiswa PKN</span></a>
        </div>
        <div class="nav-item <?= ($uri  === 'verification' ? 'active' : '') ?>">
          <a href="<?= base_url('admin/verification') ?>"><i class="ik ik-clipboard"></i><span>Verifikasi Berkas</span></a>
        </div>
        <div class="nav-item has-sub <?= ($this->uri->segment(3)  === 'advisers' || $this->uri->segment(3) === 'daily_log' || $this->uri->segment(3) === 'attendance' || $this->uri->segment(3) === 'supervision_report' || $this->uri->segment(3) === 'pkl' || $this->uri->segment(3) === 'scoring' || $this->uri->segment(3) === 'supervisor' ? 'active open' : '') ?>">
          <a href="javascript:void(0)"><i class="ik ik-server"></i><span>Laporan PKN</span></a>
          <div class="submenu-content">
            <a href="<?= base_url('admin/recap/advisers') ?>" class="menu-item <?= ($this->uri->segment(3)  === 'advisers' ? 'active' : '') ?>">Dosen Pembimbing</a>
            <a href="<?= base_url('admin/recap/supervisor') ?>" class="menu-item <?= ($this->uri->segment(3)  === 'supervisor' ? 'active' : '') ?>">Pembimbing Lapang</a>
            <a href="<?= base_url('admin/recap/daily_log') ?>" class="menu-item <?= ($this->uri->segment(3)  === 'daily_log' ? 'active' : '') ?>">Jurnal Harian</a>
            <a href="<?= base_url('admin/recap/attendance') ?>" class="menu-item <?= ($this->uri->segment(3)  === 'attendance' ? 'active' : '') ?>">Kehadiran</a>
            <a href="<?= base_url('admin/recap/supervision_report') ?>" class="menu-item <?= ($this->uri->segment(3)  === 'supervision_report' ? 'active' : '') ?>">Laporan Supervisi</a>
            <a href="<?= base_url('admin/recap/pkn') ?>" class="menu-item <?= ($this->uri->segment(3)  === 'pkn' ? 'active' : '') ?>">Status PKN</a>
            <a href="<?= base_url('admin/recap/scoring') ?>" class="menu-item <?= ($this->uri->segment(3)  === 'scoring' ? 'active' : '') ?>">Nilai PKN</a>
          </div>
        </div>
      </nav>
    </div>
  </div>
</div>