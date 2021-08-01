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
            <div class="d-flex flex-grow-1 min-width-zero card-content">
              <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <div>
                  <h3 class="text-uppercase"><?= $title; ?></h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row" style="padding: 20px;">
            <div class="col-md-6">
              <table class="table table-borderless">
                <tr>
                  <td>Group ID</td>
                  <td>: <?= $planning->group_id; ?></td>
                </tr>
              </table>
              <a href="<?= site_url('supervisor/planning') ?>" class="btn btn-outline-success mx-2"><i class="ik ik-arrow-left"></i> <span> Kembali</span></a>
            </div>
          </div>
          <div class="card-body">
            <div class="dt-responsive">
              <form name="myform" action='<?= site_url('supervisor/planning/verification/' . $this->uri->segment(4)); ?>' method="POST">
                <table id="simpletable" class="table table-hover" style="padding: 20px;">
                  <thead>
                    <tr class="text-center">
                      <th>No</th>
                      <th>Program</th>
                      <th>Sub Kegiatan</th>
                      <th>Jumlah Jam</th>
                      <th>Persetujuan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($plannings as $row) : ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $row->learning_achievement; ?></td>
                        <td><?= $row->learning_achievement_sub; ?></td>
                        <td><?= $row->time_qty; ?></td>
                        <td>
                          <?php if ($row->approval == 0) {
                            echo '<span class="badge badge-pill badge-secondary mb-1">Belum Diverikasi Dosen Pembimbing</span>';
                          } else if ($row->approval == 2) {
                            echo '<span class="badge badge-pill badge-info mb-1">Diverifikasi Dosen Pembimbing</span>';
                          } else if ($row->approval == 1) {
                            echo '<span class="badge badge-pill badge-success mb-1">Diverifikasi Pembimbing Lapang</span>';
                          } else {
                            echo '<span class="badge badge-pill badge-danger mb-1">Ditolak</span>';
                          } ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>