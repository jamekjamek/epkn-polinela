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
              <a href="<?= site_url('pdf/nilaiakhirpkn?prodi=' . $prodi . '&periode=' . $this->input->get('periode')) ?>" class="btn btn-success mt-3"><i class="ik ik-download-cloud"></i>Export</a>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <form action="" method="GET">
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="prodi">Pilih Tahun Akademik</label>
                        <select class="get-periode-pkl form-control <?= form_error('prodi') ? 'is-invalid' : ''; ?>" name="periode" id="periode" style="width: 100%" required>
                          <option></option>
                          <?php foreach ($allPeriode as $periode) : ?>
                            <option value="<?= $periode->id; ?>"> <?= $periode->name ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="btn-group">
                        <button type="submit" class="btn btn-primary" style="margin-top: 30px;"><i class="ik ik-plus-square"></i>Cari</button>
                        <?php if ($this->input->get('periode')) : ?>
                          <a href="<?= base_url($role . '/scoring'); ?>" class="btn btn-danger" style="margin-top: 30px;">Reset</a>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <?php if ($this->input->get('periode')) : ?>
              <div class="table-responsive">
                <table id="simpletable" class="table table-hover" style="padding: 20px;">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Nama Mahasiswa</th>
                      <th class="text-center">NPM</th>
                      <th class="text-center">Supervisi</th>
                      <th class="text-center">Bimbingan</th>
                      <th class="text-center">Ujian</th>
                      <th class="text-center">Pembimbing Lapangan</th>
                      <th class="text-center">Nilai Akhir</th>
                      <th class="text-center">Huruf Mutu</th>
                      <th class="text-center">Status Kelulusan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1;
                    foreach ($scores as $data_score) : ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $data_score->fullname ?></td>
                        <td class="text-center"><?= $data_score->npm ?></td>
                        <td class="text-center"><?= $data_score->supervision_value ?></td>
                        <td class="text-center"> <?= $data_score->lecture_value ?></td>
                        <td class="text-center"> <?= $data_score->final_score_value ?></td>
                        <td class="text-center"> <?= $data_score->supervisor_value ?></td>
                        <td class="text-center"> <?= number_format($data_score->result_final_score, 2) ?></td>
                        <td class="text-center"><?= $data_score->HM ?></td>
                        <td class="text-center"> <?= $data_score->student_status ?></td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>