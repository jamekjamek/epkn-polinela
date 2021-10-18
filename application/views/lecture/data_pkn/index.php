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
          <div class="card-header">
            <h3 class="text-uppercase"><?= $title; ?></h3>
          </div>
          <div class="card-body">
            <div class="col-12 table-responsive mt-3">
              <div class="row mb-4">
                <div class="col-3">
                  <label for="name">Tahun Akademik</label>
                  <select class="form-control" data-selected="<?= $academicyear; ?>" name="academicyear" id="academicyear" data-menu="data_pkn">
                    <option value="">-- Pilih Tahun Akademik --</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="dt-responsive">
              <table id="simpletable" class="table table-hover" style="padding: 20px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Mahasiswa</th>
                    <th>NPM</th>
                    <th>Status</th>
                    <th>Lokasi PKN</th>
                    <th>Nilai Akhir</th>
                    <th>Huruf Mutu</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($dataPkl as $row) :
                  ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td> <?= $row->fullname ?></td>
                      <td><?= $row->npm ?></td>
                      <td><?= $row->status ?></td>
                      <td><?= $row->company_name; ?></td>
                      <td>
                        <?php if ($row->score) {
                          echo number_format($row->score, 2);
                        } else {
                          echo '<small class="text-muted">Nilai belum diinput</small>';
                        } ?>
                      </td>
                      <td>
                        <?php if ($row->HM) {
                          echo $row->HM;
                        } else {
                          echo '<small class="text-muted">Nilai belum diinput</small>';
                        } ?>
                      </td>
                      <td>
                        <?php
                        $this->load->model('Lecture/Lecture_report_model', 'Report');
                        $supervision = $this->Report->reportCheckByGroup($row->group_id);
                        if (@$supervision->registration_group_id) :
                        ?>
                          <a href="<?= base_url('dosen/data_pkn/assessment/' . encodeEncrypt($row->id)) ?>" class="btn btn-success"><i class="ik ik-check-square" title="Penilaian PKN"></i><span>Penilaian</span></a>
                        <?php else : ?>
                          <button type="button" class="btn btn-success assesment"><i class="ik ik-check-square" title="Penilaian PKN"></i><span>Penilaian</span></button>
                        <?php endif ?>
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