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
                  <select class="form-control" data-selected="<?= $academicyear; ?>" name="getacademicyear" id="getacademicyear" data-menu="recap/supervisor" data-role="<?= $this->session->userdata('user') ?>">
                    <option value="">-- Pilih Tahun Akademik --</option>
                  </select>
                </div>
                <div class="col-3">
                  <a href="<?= site_url('pdf/pembimbinglapang/' . $this->uri->segment(5)) ?>" class="btn btn-danger" style="margin-top: 30px;"><i class="ik ik-pdf"></i> Export PDF</a>
                  <a href="<?= site_url('admin/excel/pembimbinglapang/' . $this->uri->segment(5)) ?>" class="btn btn-success" style="margin-top: 30px;"><i class="ik ik-pdf"></i> Export Excel</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table id="simpletable" class="table table-hover" style="padding: 20px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Periode PKL</th>
                    <th>Mahasiswa</th>
                    <th>Lokasi</th>
                    <th>Pembimbing Lapang</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($supervisors as $supervisor) :
                  ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $supervisor->academic_year; ?></td>
                      <td>
                        <strong><?= $supervisor->npm; ?></strong>
                        <br>
                        <?= $supervisor->fullname; ?> <br>
                        <?= $supervisor->prodi_name; ?>
                      </td>
                      <td><?= $supervisor->company_name; ?></td>
                      <td>
                        <?= $supervisor->pic; ?> <br>
                        <?= $supervisor->norek; ?> <br>
                        <?= $supervisor->bank_name; ?>
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