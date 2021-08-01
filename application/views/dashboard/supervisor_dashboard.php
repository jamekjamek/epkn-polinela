<?php
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
      Halo <strong><?= $showName['pic'] ?>!</strong> Selamat datang di aplikasi E-PKN.
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
            <div class="row">
              <div class="col-auto text-right update-meta pr-0">
                <i class="b-danger update-icon ring"></i>
              </div>
              <div class="col pl-5">
                <a href="#!">
                  <h6>Mahasiswa Bimbingan PKN</h6>
                </a>
                <?php if ($students != null) : ?>
                  <div class="col-12 table-responsive mt-3">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Mahasiswa</th>
                          <th>Dosen Pembimbing</th>
                          <th>Periode PKN</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        foreach ($students as $student) :
                        ?>
                          <tr>
                            <td><?= $i++; ?></td>
                            <td>
                              <strong> <?= $student->npm ?></strong>
                              <br>
                              <?= $student->fullname ?> -
                              <?= $student->status ?>
                            </td>
                            <td><?= $student->lecture_name; ?></td>
                            <td><?= $student->academic_year; ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                <?php else :
                  echo '<small class="text-mute">Mahasiswa masih dalam tahap verifikasi pembekalan</small>';
                endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>