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
    <?php if ($this->session->flashdata('success')) : ?>
      <div class="flashdata" data-flashdata=" <?= $this->session->flashdata('success') ?>" data-type="success"></div>
    <?php elseif ($this->session->flashdata('error')) : ?>
      <div class="flashdata" data-flashdata=" <?= $this->session->flashdata('error') ?>" data-type="error"></div>
    <?php endif; ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-block">
            <h3 class="text-uppercase">Informasi</h3>
          </div>
          <div class="card-body">
            <ul>
              <li>Untuk absensi di lakukan pada hari pelaksanaan PKN</li>
              <li>Tanggal absensi menyesuikan pada saat membuat kehadiran, apabila pada tanggal tertentu tidak melakukan absensi maka di anggap tidak hadir/tidak ada keterangan</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-block">
            <div class="d-flex flex-grow-1 min-width-zero card-content">
              <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <h3 class="text-uppercase"><?= $title; ?></h3>
                <?php if ($btnCheck != null) {
                  $dateNow = date('Y-m-d');
                  $dateCurrent = date('Y-m-d', strtotime($btnCheck['created_at']));
                }
                if ($btnCheck != null && $dateCurrent == $dateNow) {
                } else { ?>
                  <?php if ($isCheck != null && $isCheck->group_status == 'diterima') : ?>
                    <div class="btn-group">
                      <a href="<?= site_url('mahasiswa/daily/check_point/add') ?>" class="btn btn-primary"><i class="ik ik-plus-square"></i>Tambah Data</a>
                      <a href="<?= site_url('pdf/kehadiran/' . $isCheck->id) ?>" target="_blank" class="btn btn-success"><i class="ik ik-download-cloud"></i>Export</a>
                    </div>
                  <?php endif ?>
                <?php } ?>

              </div>
            </div>
            <div class="card-body">
              <div class="dt-responsive">
                <table id="scr-vtr-dynamic" class="table table-hover nowrap">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal</th>
                      <th>Jam Masuk</th>
                      <th>Jam Keluar</th>
                      <th>Kehadiran</th>
                      <th>Keterangan</th>
                      <th>Validasi Supervisor</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($checkPoints as $cp) : ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td><?= date('d-M-Y', strtotime($cp->created_at)) ?></td>
                        <td><?= $cp->time_in ?></td>
                        <td><?= $cp->time_out ?></td>
                        <td><?= $cp->attendance ?></td>
                        <td><?= $cp->note ?></td>
                        <td>
                          <?= ($cp->validation == 0 ? '<span class="badge badge-pill badge-warning mb-1">Belum Diverikasi</span>' : '<span class="badge badge-pill badge-success mb-1">Sudah Diverifikasi</span>') ?>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>