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

  <?php
  $query = "SELECT registration.status FROM registration JOIN student ON student.id = registration.student_id WHERE registration.status = 'Ketua' AND student.npm = '" . $this->session->userdata('user') . "'";
  $result = $this->db->query($query)->row_array();

  $queryProfileCheck = "SELECT * FROM student WHERE email != '' AND address != '' AND birth_date != '' AND no_hp != '' AND npm = '" . $this->session->userdata('user') . "'";
  $resultQueryProfileCheck = $this->db->query($queryProfileCheck)->row();
  ?>

  <div class="sidebar-content">
    <div class="nav-container">
      <nav id="main-menu-navigation" class="navigation-main">
        <div class="nav-lavel">Menu</div>
        <div class="nav-item <?= ($this->uri->segment(2) === 'dashboard' ? 'active' : '') ?>">
          <a href=" <?= site_url('mahasiswa/dashboard') ?>"><i class="ik ik-home"></i><span>Dashboard</span></a>
        </div>
        <?php if ($resultQueryProfileCheck) : ?>
          <?php if ($result != null) : ?>
            <div class="nav-item <?= ($this->uri->segment(2) === 'document' ? 'active' : '') ?>">
              <a href=" <?= site_url('mahasiswa/document') ?>"><i class="ik ik-file-text"></i><span>Berkas PKN</span></a>
            </div>
          <?php endif ?>
          <div class="nav-item <?= ($this->uri->segment(2) === 'program' ? 'active' : '') ?>">
            <a href=" <?= site_url('mahasiswa/program') ?>"><i class="ik ik-check-circle"></i><span>Program</span></a>
          </div>
          <div class="nav-item <?= ($this->uri->segment(3) === 'log' ? 'active' : '') ?>">
            <a href=" <?= site_url('mahasiswa/daily/log') ?>"><i class="ik ik-activity"></i><span>Jurnal Harian</span></a>
          </div>
          <div class="nav-item <?= ($this->uri->segment(3) === 'check_point' ? 'active' : '') ?>">
            <a href=" <?= site_url('mahasiswa/daily/check_point') ?>"><i class="ik ik-paperclip"></i><span>Absensi</span></a>
          </div>
          <div class="nav-item <?= ($this->uri->segment(2) === 'data_pkn' ? 'active' : '') ?>">
            <a href=" <?= site_url('mahasiswa/data_pkn') ?>"><i class="ik ik-airplay"></i><span>Rekap PKN</span></a>
          </div>
          <div class="nav-item <?= ($this->uri->segment(2) === 'quesioner' ? 'active' : '') ?>">
            <?php if (@$result != null) { ?>
              <a href=" <?= site_url('mahasiswa/quesioner') ?>"><i class="fa fa-clipboard-check"></i><span>Kuesioner</span></a>
            <?php } else { ?>
              <a onclick="return allertError('menunggu nilai')"><i class="ik ik-cast"></i><span>Quesioner</span></a>
            <?php } ?>
          </div>
        <?php endif ?>
      </nav>
    </div>
  </div>
</div>
<!-- END SIDEBAR -->