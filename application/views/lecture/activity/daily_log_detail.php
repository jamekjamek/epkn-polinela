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
          <div class="card-header">
            <h3 class="text-uppercase"><?= $title; ?></h3>
          </div>
          <div class="card-body">
            <div class="dt-responsive">
              <a href="<?= site_url('dosen/activity/daily_log') ?>" class="btn btn-outline-success mx-2"><i class="ik ik-arrow-left"></i> <span> Kembali</span></a>
              <br><br>
              <table id="simpletable" class="table table-hover " style="padding: 20px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Mahasiswa</th>
                    <th>Tanggal</th>
                    <th>Alat dan Bahan</th>
                    <th>Deskripsi</th>
                    <th>Komentar</th>
                    <th>Validasi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($dailyLog as $row) :
                  ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td>
                        <strong> <?= $row->npm ?></strong>
                        <br>
                        <?= $row->fullname ?>
                      </td>
                      <td><?= $row->implementation_date ?></td>
                      <td><?= $row->tool; ?></td>
                      <td><?= $row->description; ?></td>
                      <td><?= $row->comment; ?></td>
                      <td>
                        <?php if ($row->validation == 0) {
                          echo '<span class="badge badge-pill badge-secondary mb-1">Belum Diverikasi</span>';
                        } else {
                          echo '<span class="badge badge-pill badge-success mb-1">Diverifikasi Pembimbing Lapang</span>';
                        } ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>