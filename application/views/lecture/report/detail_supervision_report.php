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
                <div>
                  <h3 class="text-uppercase"><?= $title; ?></h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row" style="padding: 20px;">
            <div class="col-md-12">
              <div class="dt-responsive">
                <table class="table table-borderless">
                  <tr>
                    <td>GroupID</td>
                    <td>: <?= $detail->group_id; ?></td>
                  </tr>
                  <tr>
                    <td>Waktu Supervisi</td>
                    <td>: <?= $detail->time; ?></td>
                  </tr>
                  <tr>
                    <td>Lokasi PKL</td>
                    <td>: <?= $detail->company_name; ?></td>
                  </tr>
                  <tr>
                    <td>Jumlah Mahasiswa</td>
                    <td>: <?= $detail->studentcount; ?></td>
                  </tr>
                  <tr>
                    <td>Keadaan Umum</td>
                    <td>: <?= $detail->general_situation ?></td>
                  </tr>
                  <tr>
                    <td>Kemajuan Pelaksanaan PKL</td>
                    <td>: <?= $detail->progress ?></td>
                  </tr>
                  <tr>
                    <td>Hasil Supervisi (Permasalahan)</td>
                    <td>: <?= $detail->result_problem ?>
                    </td>
                  </tr>
                  <tr>
                    <td>Hasil Supervisi (Pemecahan Masalah)</td>
                    <td>: <?= $detail->result_solve ?></td>
                  </tr>
                  <tr>
                    <td>Saran</td>
                    <td>: <?= $detail->suggestion ?></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <a href="<?= site_url('dosen/report_supervision') ?>" class="btn btn-outline-success mx-2"><i class="ik ik-arrow-left"></i> <span> Kembali</span></a>
            <a href="<?= site_url('pdf/laporansupervisipkn/' . encodeEncrypt($detail->id)) ?>" class="btn btn-outline-warning" target="_blank"><i class="ik ik-download-cloud"></i><span>Export</span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>