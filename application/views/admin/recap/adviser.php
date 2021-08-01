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
            <h3 class="text-uppercase"><?= $title; ?></h3>
          </div>
          <div class="card-body">
            <div class="col-12 table-responsive mt-3">
              <div class="row mb-4">
                <div class="col-3">
                  <label for="name">Tahun Akademik</label>
                  <select class="form-control" data-selected="<?= $academicyear; ?>" name="getacademicyear" id="getacademicyear" data-menu="recap/advisers" data-role="<?= $this->session->userdata('user') ?>">
                    <option value="">-- Pilih Tahun Akademik --</option>
                  </select>
                </div>
                <div class="col-3">
                  <a href="<?= base_url('pdf/dosenpembimbing/' . $this->uri->segment(5)); ?>" class="btn btn-success" style="margin-top: 30px;"><i class="ik ik-pdf"></i>EXPORT</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table id="simpletable" class="table table-hover" style="padding: 20px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Periode PKN</th>
                    <th>Mahasiswa</th>
                    <th>Dosen Pembimbing</th>
                    <th>Lokasi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($lecturers as $lecturer) :
                  ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $lecturer->academic_year; ?></td>
                      <td>
                        <strong><?= $lecturer->npm; ?></strong>
                        <br>
                        <?= $lecturer->fullname; ?> <br>
                        <?= $lecturer->prodi_name; ?>
                      </td>
                      <td>
                        <strong><?= $lecturer->nip; ?></strong>
                        <br>
                        <?= $lecturer->lecture_name; ?>
                      </td>
                      <td><?= $lecturer->company_name; ?></td>
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