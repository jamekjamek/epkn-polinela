<?php
$queryProfileCheck = "SELECT * FROM student WHERE email != '' AND address != '' AND birth_date != '' AND no_hp != '' AND npm = '" . $this->session->userdata('user') . "'";
$resultQueryProfileCheck = $this->db->query($queryProfileCheck)->row();

$guidebook = $this->db->query("SELECT * FROM guidebook WHERE status = 1")->row();
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
      <strong>Halo <?= $showName['fullname'] ?>!</strong> Selamat datang di aplikasi E-PKL.
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
        <?php if ($resultQueryProfileCheck) : ?>
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
              <div class="row pt-20 pb-30">
                <div class="col-auto text-right update-meta pr-0">
                  <i class="b-primary update-icon ring"></i>
                </div>
                <div class="col pl-5">
                  <a href="#!">
                    <h6>Periode Pendaftaran</h6>
                  </a>
                  <div class="col-6 table-responsive mt-3">
                    <table class="table">
                      <tr>
                        <td>Pendaftaran Grup PKL</td>
                        <td>:
                          <?php if ($registration != null) : ?>
                            <?= date('d-m-Y', strtotime(@$registration->start_time)) ?> s.d <?= date('d-m-Y', strtotime(@$registration->finish_time)) ?>
                          <?php
                          else :
                            echo 'Pendaftaran belum di buka';
                          endif ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Kuota Anggota Grup</td>
                        <td>:
                          <?php if ($registration != null) : ?>
                            minimal <?= @$registration->quantity ?> orang
                          <?php
                          else :
                            echo 'Pendaftaran belum di buka';
                          endif ?>
                        </td>
                      </tr>
                      <tr>
                        <td>Pendaftaran Lokasi Baru PKL</td>
                        <td>:
                          <?php if ($location != null) : ?>
                            <?= date('d-m-Y', strtotime(@$location->start_time)) ?> s.d <?= date('d-m-Y', strtotime(@$location->finish_time)) ?>
                          <?php else :
                            echo 'Pendaftaran belum di buka';
                          endif ?>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-auto text-right update-meta pr-0">
                  <i class="b-danger update-icon ring"></i>
                </div>
                <div class="col pl-5">
                  <a href="#!">
                    <h6>Rincian Anggota Grup PKL & Status</h6>
                  </a>
                  <?php if ($check != null) : ?>
                    <div class="col-12 table-responsive mt-3">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Anggota</th>
                            <th>Perusahaan</th>
                            <th>Waktu PKL</th>
                            <th>Verifikasi Prodi</th>
                            <th>Verifikasi Anggota</th>
                            <th>File</th>
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
                              <td><?= $registration->company_name; ?></td>
                              <td>
                                <span class="badge badge-pill badge-primary mb-1">
                                  <?= date('d-m-Y', strtotime($registration->start_time_pkl)) ?>
                                </span>
                                s.d <span class="badge badge-pill badge-success mb-1">
                                  <?= date('d-m-Y', strtotime($registration->finish_time_pkl)) ?>
                                </span>
                              </td>
                              <td>
                                <?php if ($registration->group_status == 'belum_terverifikasi') {
                                  echo '<span class="badge badge-pill badge-secondary mb-1">Pendaftaran Belum Diverfikasi</span>';
                                } else if ($registration->group_status == 'diverifikasi') {
                                  echo '<span class="badge badge-pill badge-info mb-1">Pendaftaran Diverfikasi</span>';
                                } else if ($registration->group_status == 'dalam_proses_penerimaan') {
                                  echo '<span class="badge badge-pill badge-info mb-1">Proses Konfirmasi Perusahaan/span>';
                                } else if ($registration->group_status == 'diterima') {
                                  echo '<span class="badge badge-pill badge-success mb-1">Pendaftaran Diterima</span>';
                                } else {
                                  echo '<span class="badge badge-pill badge-danger mb-1">Pendaftaran Ditolak</span>';
                                }
                                ?>
                              </td>
                              <td>
                                <?php if ($registration->verify_member == 'Diterima') {
                                  echo '<span class="badge badge-pill badge-success mb-1">Diterima</span>';
                                } else if ($registration->verify_member == 'Ditolak') {
                                  echo '<span class="badge badge-pill badge-danger mb-1">Ditolak</span>';
                                } else if ($registration->verify_member == 'Pending') {
                                  echo '<span class="badge badge-pill badge-secondary mb-1">Pending</span>';
                                } else {
                                }
                                ?>
                              </td>
                              <td>
                                <a href="<?= site_url('assets/upload/' . $registration->file) ?>" target="_blank"><?= $registration->file ?></a>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  <?php else :
                    echo '<small class="text-mute">Anda belum melakukan pendaftaran / belum terdaftar sebagai anggota grup</small>';
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
          </button>
        </div>';
        endif ?>
      </div>
    </div>
  </div>
</div>