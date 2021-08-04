<div class="main-content">
  <div class="container-fluid">
    <div class="page-header">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <i class="ik ik-inbox bg-blue"></i>
            <div class="d-inline">
              <h5><?= $title; ?></h5>
              <span><?= $desc; ?></span>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <nav class="breadcrumb-container" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?= base_url(); ?>">Dashboard</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-block">
            <div class="d-flex flex-grow-1 min-width-zero card-content">
              <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <h3 class="text-uppercase"><?= $title; ?> <strong> <?= $row->fullname ?></strong></h3>
              </div>
              <a href="<?= site_url('prodi/attendance') ?>" class="btn btn-danger"><i class="ik ik-arrow-left"></i> KEMBALI</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="simpletable" class="table table-hover" style="padding: 20px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kehadiran</th>
                    <th>Waktu Kehadiran</th>
                    <th>Keterangan</th>
                    <th>Verifikasi Pembimbing Lapang</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($details as $student) :
                  ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= date('d-M-Y H:m:s', strtotime($student->created_at)); ?></td>
                      <td><?= $student->attendance; ?></td>
                      <td>
                          <?php if($student->time_in) {
                            echo $student->time_in . ' s.d ' . $student->time_out;
                          } else { 
                          
                          } ?>
                      </td>
                      <td><?= $student->note; ?></td>
                      <td>
                          <?= ($student->validation == 0 ? '<span class="badge badge-pill badge-warning mb-1">Belum Diverikasi</span>' : '<span class="badge badge-pill badge-success mb-1">Sudah Diverifikasi</span>') ?>
                      </td>
                    </tr>
                  <?php $i++;
                  endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>