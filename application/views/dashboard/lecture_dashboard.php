<?php
$guidebook = $this->db->query("SELECT * FROM guidebook WHERE status = 1")->row();
?>
<div class="main-content">
  <div class="container-fluid">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Halo <strong> <?= $showName->lecture_name ?>!</strong> Selamat datang di aplikasi E-PKL Politeknik Negeri Lampung
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="ik ik-x"></i>
      </button>
    </div>

    <div class="row clearfix">
      <?php $this->load->view('dashboard/counting_lecture') ?>
    </div>

    <div class="card latest-update-card">
      <div class="card-header">
        <h3>Informasi</h3>
        <div class="card-header-right">
          <ul class="list-unstyled card-option">
            <li><i class="ik ik-chevron-left action-toggle"></i></li>
            <li><i class="ik ik-minus minimize-card"></i></li>
            <li><i class="ik ik-x close-card"></i></li>
          </ul>
        </div>
      </div>
      <div class="card-block">
        <div class="scroll-widget">
          <div class="latest-update-box">
            <div class="row pt-20 pb-30">
              <div class="col-auto text-right update-meta pr-0">
                <i class="b-success update-icon ring"></i>
              </div>
              <div class="col pl-5">
                <a href="#!">
                  <h6>Buku Panduan PKL</h6>
                </a>
                <a href="<?= site_url('assets/uploads/guidebook/' . $guidebook->file) ?>">
                  <button class="btn btn-success"><i class="ik ik-download-cloud"></i><span></span>Download Buku Panduan PKL</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>