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
                <h3 class="text-uppercase"><?= $title; ?> <strong> <?= @$row->prodi_name; ?></strong></h3>
              </div>
              <a href="<?= site_url('pdf/nilaiakhirpkn?prodi=' . $prodi) ?>" class="btn btn-success mt-3"><i class="ik ik-download-cloud"></i>Export</a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="simpletable" class="table table-hover" style="padding: 20px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Mahasiswa</th>
                    <th>Dosen Pembimbing</th>
                    <th>Lokasi</th>
                    <th>Supervisi</th>
                    <th>Bimbingan</th>
                    <th>Ujian</th>
                    <th>Pembimbing Lapangan</th>
                    <th>Nilai Akhir</th>
                    <th>Status Kelulusan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($scores as $data_score) : ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td>
                        <strong><?= $data_score->npm ?></strong> <br>
                        <?= $data_score->fullname ?>
                      </td>
                      <td><?= $data_score->lecture_name ?></td>
                      <td><?= $data_score->company_name ?></td>
                      <td><?= $data_score->supervision_value ?></td>
                      <td> <?= $data_score->lecture_value ?></td>
                      <td> <?= $data_score->final_score_value ?></td>
                      <td> <?= $data_score->supervisor_value ?></td>
                      <td> <?= $data_score->result_final_score . ' ' . $data_score->HM ?></td>
                      <td> <?= $data_score->student_status ?></td>
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