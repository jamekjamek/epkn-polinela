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
          <a href=" <?= site_url('ketuplak/dashboard') ?>"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
        </div>
        <div class="nav-item <?= ($this->uri->segment(2) === 'pkl' ? 'active' : '') ?>">
          <a href=" <?= site_url('ketuplak/pkl') ?>"><i class="ik ik-bar-chart-2"></i><span>Data PKL</span></a>
        </div>
      </nav>
    </div>
  </div>
</div>
<!-- END SIDEBAR -->