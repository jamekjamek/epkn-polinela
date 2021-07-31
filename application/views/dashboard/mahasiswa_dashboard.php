<?php
$queryProfileCheck = "SELECT * FROM student WHERE email != '' AND address != '' AND birth_date != '' AND no_hp != '' AND npm = '" . $this->session->userdata('user') . "'";
$resultQueryProfileCheck = $this->db->query($queryProfileCheck)->row();

$guidebook = $this->db->query("SELECT * FROM guidebook WHERE status = 1")->row();

$query = "SELECT * FROM student WHERE status = 'active' AND student.npm = '" . $this->session->userdata('user') . "'";
$result = $this->db->query($query)->row_array();
?>
<div class="main-content">
  <div class="container-fluid">
    <div class="page-header">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <i class="ik ik-home bg-blue"></i>
            <div class="d-inline">
              <h5><?= $title ?></h5>
              <span><?= $desc ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Halo <?= $showName['fullname'] ?>!</strong> Selamat datang di aplikasi E-PKN.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="ik ik-x"></i>
      </button>
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
        <?php if ($resultQueryProfileCheck && $result) : ?>
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
                    <button class="btn btn-success"><i class="ik ik-download-cloud"></i><span></span>Download Buku Panduan PKN</button></a>
                </div>
              </div>
              <div class="row">
                <div class="col-auto text-right update-meta pr-0">
                  <i class="b-danger update-icon ring"></i>
                </div>
                <div class="col pl-5">
                  <a href="#!">
                    <h6>Rincian Anggota Grup PKN & Status</h6>
                  </a>
                  <?php if ($check != null) : ?>
                    <div class="col-12 table-responsive mt-3">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Anggota</th>
                            <th>Dosen Pembimbing</th>
                            <th>Desa</th>
                            <th>Waktu Pelaksanaan</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $i = 1;
                          $this->load->model('Mahasiswa/Mahasiswa_registration_model', 'Registration');
                          $registrations = $this->Registration->getAll($check->group_id)->result();
                          foreach ($registrations as $registration) :
                          ?>
                            <tr>
                              <td><?= $i++; ?></td>
                              <td>
                                <strong> <?= $registration->npm ?></strong>
                                <br>
                                <?= $registration->fullname ?> -
                                <?= $registration->status ?>
                              </td>
                              <td>
                                <?= $registration->nip ?> <br>
                                <?= $registration->lecture_name ?>
                              </td>
                              <td>
                                <?= $registration->company_name; ?> <br>
                                <strong><?= $registration->pic; ?></strong>
                              </td>
                              <td>
                                <span class="badge badge-pill badge-primary mb-1">
                                  <?= date('d-m-Y', strtotime($registration->start_date)) ?>
                                </span>
                                s.d <span class="badge badge-pill badge-success mb-1">
                                  <?= date('d-m-Y', strtotime($registration->finish_date)) ?>
                                </span>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  <?php else :
                    echo '<small class="text-mute">Anda belum melakukan belum terdaftar sebagai anggota grup manapun</small>';
                  endif; ?>
                </div>
              </div>
            </div>
          </div>
        <?php
        else :
          echo '<div class="alert alert-info alert-dismissible fade show mt-5" role="alert">
          Untuk dapat mengakses semua menu, silahkan lengkapi biodata anda di menu profil yang dapat di akses di link berikut <strong> <a href="' . site_url('mahasiswa/profile') . '">' . site_url('mahasiswa/profile') . '</a></strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="ik ik-x"></i>
          </button> dan pastikan anda hadir pada saat pembekalan PKN dan telah <strong> di verifikasi oleh admin</strong>
        </div>';
        endif ?>
      </div>
    </div>
  </div>
</div>